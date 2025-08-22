<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import { Head, Link } from "@inertiajs/vue3";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import IconBackgroound from "@/Components/IconBackgroound.vue";
import IconContent from "@/Components/IconContent.vue";
import MainHeaderHome from "@/Components/MainHeaderHome.vue";

defineProps<{
  canLogin?: boolean;
  canRegister?: boolean;
  laravelVersion: string;
  phpVersion: string;
}>();
</script>

<template>
  <div class="relative">
    <!-- HALAMAN UTAMA -->
    <AppLayout>
      <Head title="Homepage" />

      <!-- MainHeader -->
      <MainHeader
            bgImage="/assets/images/new/home.png"
            class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%] xl:hidden block"
        /> 

        <MainHeaderHome
            bgImage="/assets/images/new/home.png"
            class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%] xl:block hidden"
        /> 

      <IconBackgroound />

      <!-- Konten -->
      <div class="container relative z-10 w-2/3 pb-28 text-center pt-16">
        <div class="flex flex-col gap-6 text-xl">
          <p>Siap-siap, genks!! <strong> Good Day Schoolicious Good Challenge 2025 </strong> balik lagi buat kamu anak SMA yang penuh gaya, semangat, dan ide gokil! Dari dance ala K-pop, chant supporter super rame, sampai kolaborasa vokal kekinian, semua bisa kamu ikutin bareng tim kamu. Upload videonya, kumpulin poin, dan meriahkan perjalanan seru bareng Good Day dari sekolah kamu sampai ke Big Bang Event di Jogja! Jangan lupa, ada hadiah keren, guest star kece, dan momen tak terlupakan! Yuk, rayakan masa SMA kamu yang penuh warna, karena #HidupBanyakRasa!
          </p>
        </div>

        <div class="flex justify-center gap-x-4">
          <!-- <PrimaryButton as-child class="mt-20">
            <Link
              :href="$page.props.auth.user ? route('competition.index') : route('register')"
            >
              {{ $page.props.auth.user ? "Submission" : "Join Now" }}
            </Link>
          </PrimaryButton> -->
          <div as-child class="mt-20">
            <Link 
              :href="route('competition.index')" 
              class="bg-primary px-6 py-2 rounded-full text-white transform hover:bg-primary/60 ease-in-out"
            >
              More Info
            </Link>
          </div>
        </div>
      </div>

      
    </AppLayout>
  </div>
</template>




<style></style>
