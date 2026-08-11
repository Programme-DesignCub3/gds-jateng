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
import IconBackgroound from "@/Components/IconBackgroound.vue";
import RegistrasiLogo from "@/Components/RegistrasiLogo.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";

type TRegistrationType = "sekolah" | "pribadi";

const selectedRegistration = ref<TRegistrationType>("sekolah");
</script>

<template>
  <div class="relative" :style="{
      backgroundImage: `url('/assets/images/gds-2026/long-bg.png')`,
      backgroundRepeat: 'no-repeat',
      backgroundPosition: 'center',
      backgroundSize: '100% 100%',
    }">
    <AppLayout>
      <MainHeaderHome/>
      <!-- <IconBackgroound /> -->

      <div class="container p-12 w-full max-w-lg">
        <div class="px-12 pb-6">
          <RegistrasiLogo />
        </div>
        <RegisterNew />
      </div>
    </AppLayout>
  </div>  
</template>
