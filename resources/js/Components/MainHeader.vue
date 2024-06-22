<template>
  <div class="h-80 bg-black md:h-[35rem]"></div>
  <div
    class="container relative -mt-40 size-80 rounded-full bg-white shadow-md sm:-mt-52 sm:size-96 lg:-mt-60 lg:size-[30rem]"
  >
    <div
      class="absolute left-1/2 top-1/2 flex w-full -translate-x-1/2 -translate-y-1/2 flex-col justify-center gap-y-4 p-6 text-center"
    >
      <ApplicationLogo />
      <ApplicationLogo />
      <p class="mt-4 text-lg font-bold uppercase">Jawa tengah</p>
    </div>
  </div>
</template>

<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<style scoped></style>
