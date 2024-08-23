<script setup lang="ts">
import AnnouncementCard from "@/Components/AnnouncementCard.vue";
import type { TFinalist, TFinalistList } from "@/lib/types";

defineProps<{
  title?: string;
  finalistList: TFinalist[];
}>();
</script>

<template>
  <div class="flex w-full flex-col items-center justify-center gap-y-2 md:gap-y-6">
    <h2
      class="relative inline-block h-full w-10/12 flex-col items-center justify-center overflow-visible bg-orange-paper-rip bg-[length:100%_100%] bg-center bg-no-repeat py-6 text-center text-base font-bold uppercase text-[#1F4387] md:w-fit md:px-4 md:py-12 md:text-lg lg:text-2xl"
    >
      {{ title }}
    </h2>
    <div
      class="grid w-full grid-cols-3 gap-x-2 gap-y-4 text-center md:gap-x-4 md:gap-y-8"
    >
      <AnnouncementCard
        v-for="(finalist, index) in finalistList"
        :key="index"
        :name="finalist.name"
        :schoolName="finalist.school_name"
        :thumbnail="finalist.thumbnail"
      >
      </AnnouncementCard>
    </div>
  </div>
</template>

<style scoped></style>
