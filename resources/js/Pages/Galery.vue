<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import GaleryTitle from "@/Components/GaleryTitle.vue";
import IconBackgroundDetail from "@/Components/IconBackgroundDetail.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import type { TFinalistList } from "@/lib/types";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const currentRegion = ref<string | null>(null);

defineProps<{
  finalistSemarang: TFinalistList[];
  finalistYogyakarta: TFinalistList[];
}>();
</script>

<template>
  <Head title="Pengumuman" />
  <AppLayout>
    <MainHeader
        bgImage="/assets/images/new/home.png"
        class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
      /> 
    <IconBackgroundDetail />

    <div
      class="container flex flex-col justify-center gap-y-10 py-8 md:gap-y-20"
      :class="{
        'items-center': !currentRegion,
      }"
    >
      <div class="py-20 2xl:space-y-[12rem] xl:space-y-[6rem] space-y-[6rem]">
        <GaleryTitle
          logo="/assets/images/new/galery/yogyakarta.png"
          class="w-full h-auto"
        />
        <GaleryTitle
          logo="/assets/images/new/galery/semarang.png"
          class="w-full h-auto"
        />
      </div>
    </div>
  </AppLayout>
</template>

<style scoped></style>
