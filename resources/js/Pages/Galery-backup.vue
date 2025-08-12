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
import { ref, watch, onMounted, onBeforeUnmount, defineProps, nextTick } from "vue";
import GaleryPopup from "@/Components/GaleryPopup.vue";

interface Galery {
  embed_link: string;
  nama_sekolah: string;
  wilayah: string;
  provinsi: string;
  tanggal: string;
  thumbnail: string;
}

const props = defineProps<{ galeries: Galery[] }>();
const popup = ref(false);
const selected = ref({
  image: '',
  school: '',
  region: '',
  date: '',
  embed: ''
});

function closePopup() {
  popup.value = false;
}

function openPopup(index: number) {
  const galery = props.galeries[index];
  selected.value = {
    image: galery.thumbnail,
    school: galery.nama_sekolah,
    region: `${galery.wilayah}, ${galery.provinsi}`,
    date: formatTanggalIndo(galery.tanggal),
    embed: galery.embed_link,
  };

  nextTick(() => {
    popup.value = true;

    // Instagram embed script
    if (galery.embed_link.includes('instagram.com')) {
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

    // TikTok embed script
    if (galery.embed_link.includes('tiktok.com')) {
      const script = document.createElement("script");
      script.setAttribute("src", "https://www.tiktok.com/embed.js");
      script.setAttribute("async", "true");
      document.body.appendChild(script);
    }
  });
}


function formatTanggalIndo(tanggal: string) {
  const bulanIndo = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
  ];
  const [year, month, day] = tanggal.split('-');
  return `${parseInt(day)} ${bulanIndo[parseInt(month) - 1]} ${year}`;
}

watch(popup, (val: boolean) => {
  if (typeof window !== 'undefined') {
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
  <AppLayout>
    <GaleryHeader 
      bgImage="/assets/images/home.svg" 
      class="bg-[#1f4387] relative h-80 bg-cover md:h-[30rem] lg:h-[35rem] xl:h-[40rem]" />
  </AppLayout>
  <div class="z-4">
      <div
          class="w-full h-auto 2xl:top-[40.5rem] xl:top-[42.5rem] lg:top-[36.5rem] md:top-[32.5rem] sm:top-[22rem] top-[22.5rem] absolute">
          <img
        src="/assets/images/pattern_galery.png"
        alt="Pattern Galery"
        class="w-full h-full object-cover"
          />
      </div>
      <div class="w-auto xl:h-32 lg:h-20 md:h-18 h-14 xl:left-52 lg:left-38 md:left-24 left-20 xl:top-[42rem] lg:top-[38rem] md:top-[34rem] top-[23rem] absolute z-9">
          <img src="/assets/images/basket_ball.png" alt="Basket Ball" class="w-full h-full object-cover" />
      </div>
  </div>

  <!-- Konten -->
  <div class="relative xl:pb-[20rem] pb-[8rem] md:px-12 pt-20 px-6 md:bg-cover object-cover bg-no-repeat bg-[length:100%_100%]" ref="galeryContainer"
      :style="{ backgroundImage: `url('/assets/images/background.png')` }"
    >
    <h1 class="xl:text-6xl lg:text-5xl text-4xl py-12 font-bold text-[#1d4588] text-center">
        Video Galery <span class="lg:font-extralight font-normal"> <br class="block sm:hidden"> Good Challenge</span>
      </h1>
    <div class="relative z-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8 items-stretch xl:gap-x-12 md:gap-x-6 xl:gap-y-24 md:gap-y-12 gap-y-6 w-[82%] mx-auto">
      <div v-for="(galery, i) in props.galeries" :key="i" class="relative group">
        <div class="absolute xl:top-4 top-2 xl:left-4 left-2 w-full h-full bg-[#1d4588] rounded-[2rem] z-0"></div>
        <div
          class="relative bg-white rounded-[2rem] overflow-hidden z-1 border-4 border-[#1d4588] cursor-pointer transition-transform duration-300 hover:translate-y-2 hover:translate-x-2 h-full flex flex-col"
          @click.stop="openPopup(i)">
          <div class="relative w-full xl:h-64 h-52">
            <div
              class="absolute inset-0 z-20 bg-none rounded-[2rem]"
            >
              <img
                :src="galery.thumbnail"
                class="w-full xl:h-64 h-52 p-6 object-cover rounded-[3.5rem]"
                alt="Video Preview"
              />
              <div class="absolute inset-0 flex items-center justify-center">
                <button class="bg-[#1d4588] rounded-full p-6 flex items-center justify-center">
                  <img src="/assets/images/play_button.png" alt="Play Button" class="lg:w-8 w-4 lg:h-8 h-4" />
                </button>
              </div>
            </div>
          </div>
          <div class="px-6 pb-6 flex items-center justify-between -mt-2">
            <div>
              <div class="font-bold xl:text-2xl lg:text-xl text-base text-[#1d4588]">{{ galery.nama_sekolah }}</div>
              <div class="xl:text-lg text-sm text-[#1d4588] italic">{{ galery.wilayah }}, {{ galery.provinsi }}</div>
              <div class="flex items-center mt-1 pt-3">
                <div class="flex flex-col space-y-1">
                  <span class="text-xs text-gray-400">{{ formatTanggalIndo(galery.tanggal) }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Background Shade -->
  <div class="w-full xl:h-[60rem] md:h-[40rem] bottom-0 absolute">
    <img src="/assets/images/shade_galery.png" alt="Basket Ball" class="w-full h-full object-cover -z-10" />
  </div>

  <div class="w-full h-auto bottom-0 absolute">
    <img src="/assets/images/bottom_galery.png" alt="Basket Ball" class="w-full h-full object-cover" />
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
