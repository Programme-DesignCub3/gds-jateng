<template>
  <div class="flex flex-col items-center gap-4">
    <!-- Logo utama -->
    <img :src="logo" alt="Logo" class="max-w-full h-auto" draggable="false" />

    <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8 pt-8 z-0 px-20 2xl:w-full xl:w-3/4 lg:w-4/5 md:w-full sm:w-full w-full">
      <img
        v-for="n in 6"
        :key="n"
        src="/assets/images/new/frame-square.png"
        alt="Frame"
        class="w-full h-auto object-contain"
        draggable="false"
      />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    logo: {
      type: String,
      required: true
    }
  }
};
</script>