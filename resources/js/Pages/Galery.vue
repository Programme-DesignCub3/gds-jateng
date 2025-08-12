<script setup lang="ts">
declare global {
  interface Window {
    instgrm: {
      Embeds: {
        process: () => void;
      };
    };
  }
}

import GaleryHeader from "@/Components/GaleryHeader.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, watch, onMounted, onBeforeUnmount, defineProps, nextTick, computed } from "vue";
import GaleryPopup from "@/Components/GaleryPopup.vue";
import IconBackgroundDetail from "@/Components/IconBackgroundDetail.vue";
import MainHeader from "@/Components/MainHeader.vue";
import GaleryTitle from "@/Components/GaleryTitle.vue";

interface Galery {
  id: number;
  embed_link: string;
  nama_sekolah: string;
  wilayah: string;
  provinsi: string;
  tanggal: string;
  thumbnail: string;
  lokasi: string;
}

const props = defineProps<{ galeries: Galery[] }>();

const popup = ref(false);
const selected = ref({
  image: "",
  school: "",
  region: "",
  date: "",
  embed: ""
});

// 🔹 Group galeri berdasarkan lokasi
const groupedGaleries = computed<Record<string, Galery[]>>(() => {
  const groups: Record<string, Galery[]> = {};
  props.galeries.forEach(item => {
    const key = item.lokasi ?? `${item.wilayah}, ${item.provinsi}`;
    if (!groups[key]) {
      groups[key] = [];
    }
    groups[key].push(item);
  });
  return groups;
});

function getLogoByLocation(lokasi: string) {
  const mapping: Record<string, string> = {
    yogyakarta: "/assets/images/new/galery/yogyakarta.png",
    semarang: "/assets/images/new/galery/semarang.png"
  };
  return mapping[lokasi] || "/assets/images/new/galery/default.png";
}

function closePopup() {
  popup.value = false;
}

function openPopupByLocation(lokasi: string, index: number) {
  const galery = (groupedGaleries.value[lokasi] ?? [])[index];
  selected.value = {
    image: galery.thumbnail,
    school: galery.nama_sekolah,
    region: `${galery.wilayah}, ${galery.provinsi}`,
    date: formatTanggalIndo(galery.tanggal),
    embed: galery.embed_link
  };

  nextTick(() => {
    popup.value = true;

    // Instagram embed
    if (galery.embed_link.includes("instagram.com")) {
      if (!window.instgrm) {
        const script = document.createElement("script");
        script.setAttribute("src", "//www.instagram.com/embed.js");
        script.setAttribute("async", "true");
        script.onload = () => {
          window.instgrm.Embeds.process();
        };
        document.body.appendChild(script);
      } else {
        nextTick(() => {
          window.instgrm.Embeds.process();
        });
      }
    }

    // TikTok embed
    if (galery.embed_link.includes("tiktok.com")) {
      const script = document.createElement("script");
      script.setAttribute("src", "https://www.tiktok.com/embed.js");
      script.setAttribute("async", "true");
      document.body.appendChild(script);
    }
  });
}

function formatTanggalIndo(tanggal: string) {
  const bulanIndo = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
  ];
  const [year, month, day] = tanggal.split("-");
  return `${parseInt(day)} ${bulanIndo[parseInt(month) - 1]} ${year}`;
}

watch(popup, (val: boolean) => {
  if (typeof window !== "undefined") {
    document.body.style.overflow = val ? "hidden" : "";
  }
});

const galeryContainer = ref<HTMLElement | null>(null);
const isFixed = ref(false);
const mobileIcon = ref<HTMLElement | null>(null);

onMounted(() => {
  let observer: IntersectionObserver | null = null;
  if (galeryContainer.value) {
    observer = new IntersectionObserver(
      ([entry]) => {
        isFixed.value = entry.isIntersecting;
      },
      { threshold: 0, rootMargin: "0px 0px -90% 0px" }
    );
    observer.observe(galeryContainer.value);
  }

  const tag = document.createElement("script");
  tag.src = "https://www.youtube.com/iframe_api";
  const firstScriptTag = document.getElementsByTagName("script")[0];
  firstScriptTag?.parentNode?.insertBefore(tag, firstScriptTag);

  onBeforeUnmount(() => {
    if (observer && galeryContainer.value) {
      observer.unobserve(galeryContainer.value);
    }
  });
});
</script>


<template>
  <Head title="Galery" />
  <AppLayout></AppLayout>
  <MainHeader
    bgImage="/assets/images/new/home.png"
    class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
  /> 
  <IconBackgroundDetail />

  <div
    class="relative xl:pb-[20rem] pb-[8rem] md:px-12 px-6 md:bg-cover object-cover bg-no-repeat bg-[length:100%_100%]"
    ref="galeryContainer"
  >
    <!-- Loop tiap lokasi -->
    <div v-for="(items, lokasi) in groupedGaleries" :key="lokasi" class="mb-16">
  <GaleryTitle :logo="getLogoByLocation(lokasi)" class="w-full h-auto py-12" />

  <div class="relative z-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8 items-stretch w-3/4 mx-auto">
    <div v-for="(galery, i) in items" :key="galery.id" class="relative group">
      <div
        class="relative bg-white rounded-[2rem] overflow-hidden z-1 border-4 border-primary cursor-pointer transition-transform duration-300 hover:scale-105 h-full flex flex-col"
        @click.stop="openPopupByLocation(lokasi, i)"
      >
        <div class="relative w-full xl:h-64 h-52">
          <img
            :src="galery.thumbnail"
            class="w-full xl:h-64 h-52 p-6 object-cover rounded-[3.5rem]"
            alt="Video Preview"
          />
          <div class="absolute inset-0 flex items-center justify-center">
            <button class="bg-primary rounded-full p-6 flex items-center justify-center">
              <img src="/assets/images/play_button.png" alt="Play Button" class="lg:w-8 w-4 lg:h-8 h-4" />
            </button>
          </div>
        </div>
        <div class="px-6 pb-6 flex items-center justify-between -mt-2">
          <div>
            <div class="font-bold xl:text-2xl lg:text-xl text-base text-primary">
              {{ galery.nama_sekolah }}
            </div>
            <div class="xl:text-lg text-sm text-primary italic">
              {{ galery.wilayah }}, {{ galery.provinsi }}
            </div>
            <div class="flex items-center mt-1 pt-3">
              <span class="text-xs text-gray-400">
                {{ formatTanggalIndo(galery.tanggal) }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  </div>

  <!-- Popup -->
  <GaleryPopup
    :show="popup"
    :embed="selected.embed"
    :school="selected.school"
    :region="selected.region"
    :date="selected.date"
    @close="closePopup"
  />
</template>

<style scoped></style>
