<script setup lang="ts">
defineProps<{
  bgImage?: string;
}>();
</script>

<template>
  <div
    class="relative mt-auto flex h-screen w-full grid-cols-2 flex-col bg-no-repeat pt-[8rem] md:bg-[60%_50vh] xl:grid xl:bg-[length:50%] xl:bg-[-10%_5vh]"
    :style="bgImage ? { backgroundImage: `url(${bgImage})`, backgroundSize: 'cover', backgroundPosition: 'left center' } : {}"
  >
    <div class="w-full relative flex justify-center items-center">
      <img
        src="/assets/images/new/icon-login.png"
        alt="Login Icon"
        class="w-full h-auto object-contain"
      />
    </div>

    <div class="flex flex-col items-center justify-center lg:py-12">
      <slot />
    </div>
  </div>
</template>
