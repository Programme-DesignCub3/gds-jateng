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

type TRegistrationType = "sekolah" | "pribadi";

const selectedRegistration = ref<TRegistrationType>("sekolah");
</script>

<template>
  <AppLayout>
    <MainHeader
            showJatengText
            bgImage="/assets/images/new/home.png"
            class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
        /> 
    <IconBackgroound />

    <div class="container p-12 w-full max-w-lg">
      <div class="px-12 pb-6">
        <RegistrasiLogo />
      </div>
      <RegisterNew />
    </div>
  </AppLayout>
</template>
