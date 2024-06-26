<script setup lang="ts">
import AnnouncementHeader from "@/Components/AnnouncementHeader.vue";
import AnnouncementSection from "@/Components/AnnouncementSection.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>
<template>
  <Head title="Pengumuman" />
  <AppLayout>
    <AnnouncementHeader />

    <div class="container flex flex-col justify-center gap-y-10 md:gap-y-20">
      <AnnouncementSection
        v-for="competition in [
          'kolaborasa',
          'chant competition',
          'cheerleading competition',
          'mascot design',
        ]"
        :key="competition"
        :title="competition"
      />
    </div>
  </AppLayout>
</template>

<style scoped></style>
