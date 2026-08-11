<script setup lang="ts"></script>

<template>
  <a
    class="floating-wa fixed bottom-2 right-2 transition-all duration-300 ease-in-out hover:bottom-6 hover:scale-110 md:bottom-4 md:right-4 z-10 block rounded-full"
    href="http://wa.me/6287836924005"
    target="_blank"
    rel="noopener noreferrer"
  >
    <img
      class="pointer-events-none size-16 md:size-32 rounded-full"
      src="/assets/images/cs.png"
      alt="Customer Service WhatsApp"
    />
  </a>
</template>

<style scoped>
.floating-wa {
  animation: floatBounce 3s ease-in-out infinite;
}

@keyframes floatBounce {
  0% {
    transform: translateY(0px);
    filter: drop-shadow(0 0 4px rgba(229, 36, 42, 0.9));
  }
  
  50% {
    transform: translateY(-14px);
    filter: drop-shadow(0 0 22px rgba(229, 36, 42, 0.6));
  }
  
  100% {
    transform: translateY(0px);
    filter: drop-shadow(0 0 4px rgba(229, 36, 42, 0.9));
  }
}
</style>