<script setup lang="ts">
defineProps<{
  show: boolean;
  embed: string;
  school: string;
  region: string;
  date: string;
}>();

const emit = defineEmits(['close']);
</script>

<template>
  <transition name="popup-fade">
  <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 px-10 md:-ml-0 -ml-8 will-change-transform">
    <div class="relative">
      <!-- Bayangan -->
      <div class="absolute lg:top-6 top-4 lg:left-10 left-8 sm:w-[40rem] w-[20rem] h-full bg-[#1d4588] rounded-[2.5rem] z-0 border-white border-[6px]"></div>

      <div class="relative bg-white rounded-[2.5rem] border-[6px] border-[#1d4588] shadow-2xl max-w-2xl sm:w-[40rem] w-[20rem] mx-4 pt-16 pb-8 px-0 flex flex-col items-center z-10 ">
        <!-- Logo -->
        <div class="absolute lg:-top-36 -top-24 left-1/2 -translate-x-1/2 flex flex-col items-center z-20">
          <img src="/assets/images/logo.png" class="lg:h-[6rem] h-[4rem]" />
          <img src="/assets/images/GDS.png" class="lg:h-[6rem] h-[4rem]" />
        </div>

        <!-- Close -->
        <button @click="$emit('close')" class="absolute lg:-top-7 -top-4 lg:right-[-1.5rem] right-[-1rem] bg-[#1d4588] rounded-full lg:w-14 lg:h-14 w-10 h-10 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="lg:w-8 lg:h-8 w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <!-- Embed -->
        <div class="relative w-full flex flex-col items-center -mt-14 p-6">
          <div
              class="w-full max-h-[40vh] overflow-y-auto mb-6 rounded-[2rem] bg-[#1d4588]"
            >
              <div
                v-html="embed"
                class="w-full h-full object-cover rounded-[2rem] flex items-center justify-center"
              ></div>
            </div>
        </div>

        <!-- Info -->
        <div class="flex w-full justify-between items-end px-8">
          <div>
            <div class="font-bold text-lg text-[#1d4588]">{{ school }}</div>
            <div class="text-sm text-[#1d4588] italic opacity-80">{{ region }}</div>
            <div class="text-sm text-gray-500 md:hidden block pt-4">{{ date }}</div>
          </div>
          <div class="text-sm text-gray-500 md:block hidden">{{ date }}</div>
        </div>
      </div>
    </div>
  </div>
  </transition>
</template>

<style scoped>
.popup-fade-enter-active,
.popup-fade-leave-active {
  transition: all 0.4s ease;
}
.popup-fade-enter-from,
.popup-fade-leave-to {
  opacity: 0;
  transform: scale(0.6);
}
.popup-fade-enter-to,
.popup-fade-leave-from {
  opacity: 1;
  transform: scale(1);
}
</style>
