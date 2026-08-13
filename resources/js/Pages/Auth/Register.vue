<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import MainHeader from "@/Components/MainHeader.vue";

import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/Components/ui/card";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/Components/ui/tabs";
import RegisterPersonal from "./Partials/RegisterPersonal.vue";
import RegisterSchool from "./Partials/RegisterSchool.vue";
import RegisterNew from "./Partials/RegisterNew.vue";
import { ref } from "vue";
import RegistrasiLogo from "@/Components/RegistrasiLogo.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";
import IconPrimary from "@/Components/gds-2026/include/IconPrimary.vue";

type TRegistrationType = "sekolah" | "pribadi";

const selectedRegistration = ref<TRegistrationType>("sekolah");
</script>

<template>
  <div 
    class="relative bg-[url('/assets/images/gds-2026/home-long.png')] bg-no-repeat bg-center bg-cover lg:bg-[length:100%_100%]"
  >
    <AppLayout>

      <MainHeaderHome />

      <div class="relative w-full overflow-hidden">
        <IconPrimary />

        <div class="container relative z-0 p-12 w-full max-w-lg mx-auto">
          <div class="px-12 pb-6">
            <RegistrasiLogo />
          </div>
          <RegisterNew />
        </div>
      </div>

    </AppLayout>
  </div>  
</template>

<style scoped></style>