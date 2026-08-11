<template>
  <div class="flex flex-col items-center gap-2">
    <h1 class="font-black uppercase tracking-tighter text-sticker text-4xl md:text-5xl lg:text-6xl select-none text-center">
      {{ title }}
    </h1>

    <p v-if="subtitle" class="font-black uppercase tracking-tighter text-sticker text-2xl md:text-3xl lg:text-4xl select-none text-center">
      {{ subtitle }}
    </p>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-8 pt-8 z-0 px-20 w-full">
      <div v-for="n in 3" :key="n" class="flex flex-col items-center gap-4">
        <div class="w-80 h-80 bg-gray-200 border-4 border-primary rounded-lg"></div>
        <p class="font-bold text-center">Nama Pemenang</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true
    },
    subtitle: {
      type: String,
      default: ""
    }
  }
};
</script>