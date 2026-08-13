<script setup lang="ts">
import { Head, Link } from "@inertiajs/vue3";

import AppLayout from "@/Layouts/AppLayout.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";
import ContentHome from "@/Components/gds-2026/home/ContentHome.vue";

defineProps<{
  canLogin?: boolean;
  canRegister?: boolean;
  laravelVersion: string;
  phpVersion: string;
}>();
</script>

<template>
  <div 
    class="relative bg-[url('/assets/images/gds-2026/home.png')] bg-no-repeat bg-center bg-cover lg:bg-[length:100%_100%]"
  >
    <AppLayout>
      <Head title="Homepage" />
      <MainHeaderHome
        class="relative z-0 bg-transparent bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
      /> 
      <ContentHome />
    </AppLayout>
  </div>
</template>

<style scoped></style>