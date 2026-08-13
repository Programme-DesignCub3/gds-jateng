<script setup lang="ts">
import AnnouncementHeader from "@/Components/AnnouncementHeader.vue";
import AnnouncementSection from "@/Components/AnnouncementSection.vue";
import AnnouncementTitle from "@/Components/gds-2026/announcement/CompetitionTitle.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";
import IconSecondary from "@/Components/gds-2026/include/IconSecondary.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import type { TFinalistList } from "@/lib/types";
import { Head } from "@inertiajs/vue3";
import { AlertCircle } from "lucide-vue-next";
import { ref } from "vue";

const currentRegion = ref<string | null>(null);

defineProps<{
  finalistSemarang: TFinalistList[];
  finalistYogyakarta: TFinalistList[];
}>();
</script>

<template>
    <div class="relative bg-[url('/assets/images/gds-2026/home-long.png')] bg-no-repeat bg-center bg-cover lg:bg-[length:100%_120%]">

    <Head title="Pengumuman" />
    <AppLayout>

      <MainHeaderHome class="...">
        <img 
          src="/assets/images/gds-2026/logo-finalist.png" 
          alt="Header Pengumuman" 
          class="w-[20rem] sm:w-[20rem] md:w-[32rem] lg:w-[36rem] xl:w-[40rem] 2xl:w-[48rem] h-auto object-contain"
          draggable="false"
        />
      </MainHeaderHome>

      <div class="relative w-full overflow-hidden">
        <IconSecondary />

        <div
          class="container relative z-1 mx-auto flex flex-col justify-center gap-y-10"
          :class="{
            'items-center': !currentRegion,
          }"
        >
          <div class="pt-6 md:space-y-20 space-y-12 pb-20 w-full">
            <AnnouncementTitle
              title="Winner"
              subtitle="Kolaborasa"
              class="w-full h-auto z-0"
            />
            <AnnouncementTitle
              title="Winner"
              subtitle="Modern Dance Competition"
              class="w-full h-auto z-0"
            />
            <AnnouncementTitle
              title="Winner"
              subtitle="Chant Supporter Competition"
              class="w-full h-auto z-0"
            />
            <AnnouncementTitle
              title="Winner"
              subtitle="Vlog Competition"
              class="w-full h-auto z-0"
            />
          </div>

        </div>
      </div>

    </AppLayout>
  </div>
</template>

<style scoped></style>