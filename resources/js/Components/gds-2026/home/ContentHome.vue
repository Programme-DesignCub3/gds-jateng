<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import IconPrimary from "../include/IconPrimary.vue";
</script>

<template>
  <div class="relative w-full overflow-hidden">    
    <IconPrimary/>
    <div class="container relative z-10 md:w-2/3 lg:w-2/4 w-full pb-28 text-center pt-16 mx-auto px-12">
      <div class="flex flex-col gap-6 lg:text-xl md:text-lg text-sm">
        <h1 class="text-sticker text-2xl font-bold select-none">Good Day Schoolicious Good Challenge 2026</h1>
        <p>
          Sekolah bukan cuma tempat belajar, tapi juga tempat lahirnya ide-ide besar, persahabatan, dan mimpi yang siap diwujudkan. Good Day percaya setiap anak muda punya cara unik untuk bersinar. Karena itu, <strong>Good Day Schoolicious Good Challenge 2026</strong> hadir sebagai wadah bagi siswa-siswi SMA di seluruh Indonesia untuk menunjukkan kreativitas, berkolaborasi, dan berani mengambil setiap tantangan.
          <br class="select-none">
          <br class="select-none">
          Lebih dari sekadar kompetisi, ini adalah kesempatan untuk menciptakan pengalaman seru, mengembangkan potensi, dan membuktikan bahwa generasi sekarang mampu menghadirkan karya yang inspiratif. Ajak squad terbaikmu, keluarkan ide paling out of the box, dan tunjukkan bahwa sekolahmu siap menjadi yang paling bersinar.
          <br class="select-none">
          <br class="select-none">
          <strong>Karena setiap challenge adalah kesempatan untuk menjadi versi terbaik dari dirimu.</strong>
          <br class="select-none">
          <br class="select-none">
          <strong>Karena hidup perlu banyak rasa, dan setiap rasa punya cerita</strong>
        </p>
      </div>
      
      <div class="flex justify-center gap-x-4">
        <div class="mt-16">
          <Link 
            :href="route('competition.index')" 
            class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-full text-white font-bold text-sm transform transition-all duration-200 hover:scale-105 inline-block shadow-md "
          >
            MORE INFO
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>