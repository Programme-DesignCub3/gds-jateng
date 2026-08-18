<!-- resources/js/Components/gds-2026/include/Hadiah.vue -->
<template>
  <div class="relative w-full max-w-[320px] md:max-w-[400px] aspect-square flex items-center justify-center mx-auto">
    
    <!-- 1. Shadow (Di bawah, mengecil saat kotak melayang ke atas) -->
    <img
      src="/assets/images/gds-2026/include/shadow.png"
      alt="Shadow"
      class="absolute bottom-4 w-[75%] h-auto animate-shadow z-0"
    />

    <!-- 2. Kotak Hadiah (Naik-turun lembut) -->
    <img
      src="/assets/images/gds-2026/include/hadiah.png"
      alt="Hadiah Box"
      class="relative z-10 w-[85%] h-auto animate-float-box"
    />

    <!-- 3. Red Lightning (Melayang di kanan atas) -->
    <img
      src="/assets/images/gds-2026/include/red-lightning.png"
      alt="Red Lightning"
      class="absolute top-[5%] right-[25%] z-20 w-[15%] h-auto animate-float-red"
    />

    <!-- 4. Blue Arrow (Melayang di kanan agak bawah dari petir merah) -->
    <img
      src="/assets/images/gds-2026/include/blue-arrow.png"
      alt="Blue Arrow"
      class="absolute top-[18%] right-[8%] z-20 w-[18%] h-auto animate-float-blue"
    />

    <!-- 5. Yellow Lightning (Melayang di kiri bawah, gerak miring ke kiri-atas) -->
    <img
      src="/assets/images/gds-2026/include/yellow-lightning.png"
      alt="Yellow Lightning"
      class="absolute bottom-[20%] left-[5%] z-20 w-[15%] h-auto animate-float-yellow"
    />

  </div>
</template>

<style scoped>
/* Animasi Kotak Hadiah */
@keyframes floatBox {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-16px);
  }
}

/* Animasi Shadow (kebalikan dari kotak hadiah) */
@keyframes pulseShadow {
  0%, 100% {
    transform: scale(1);
    opacity: 0.8;
  }
  50% {
    transform: scale(0.75);
    opacity: 0.4;
  }
}

/* Animasi Petir Merah */
@keyframes floatRed {
  0%, 100% {
    transform: translateY(0) rotate(0deg);
  }
  50% {
    transform: translateY(-10px) rotate(5deg);
  }
}

/* Animasi Panah Biru */
@keyframes floatBlue {
  0%, 100% {
    transform: translateY(0) scale(1);
  }
  50% {
    transform: translateY(-12px) scale(1.05);
  }
}

/* Animasi Petir Kuning (Bergerak Miring/Serong) */
@keyframes floatYellow {
  0%, 100% {
    transform: translate(0, 0) rotate(0deg);
  }
  50% {
    transform: translate(-8px, -12px) rotate(-6deg);
  }
}

.animate-float-box {
  animation: floatBox 3s ease-in-out infinite;
}

.animate-shadow {
  animation: pulseShadow 3s ease-in-out infinite;
}

.animate-float-red {
  animation: floatRed 2.4s ease-in-out infinite 0.3s;
}

.animate-float-blue {
  animation: floatBlue 2.8s ease-in-out infinite 0.7s;
}

.animate-float-yellow {
  animation: floatYellow 2.6s ease-in-out infinite 0.5s;
}
</style>