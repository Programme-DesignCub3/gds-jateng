<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import { Head, Link } from "@inertiajs/vue3";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import IconBackgroound from "@/Components/IconBackgroound.vue";
import IconContent from "@/Components/IconContent.vue";
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
  <div class="relative" :style="{
      backgroundImage: `url('/assets/images/gds-2026/short-bg.png')`,
      backgroundRepeat: 'no-repeat',
      backgroundPosition: 'center',
      backgroundSize: '100% 100%',
    }">
    <!-- HALAMAN UTAMA -->
    <AppLayout>
      <Head title="Homepage" />

      <!-- MainHeader -->
      <!-- <MainHeader
            bgImage="/assets/images/new/home.png"
            class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%] xl:hidden block"
        />  -->

        

      <!-- <IconBackgroound /> -->
      <MainHeaderHome
            class="relative z-0 bg-transparent bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
        /> 
      <!-- Konten -->
      <ContentHome />

      
    </AppLayout>
  </div>
</template>




<style></style>
