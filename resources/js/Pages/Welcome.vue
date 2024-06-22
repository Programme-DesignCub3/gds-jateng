<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import MainHeader from "@/Components/MainHeader.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import {
  Dialog,
  DialogTrigger,
  DialogContent,
  DialogHeader,
  DialogTitle,
  DialogDescription,
} from "@/Components/ui/dialog";

import { Button } from "@/Components/ui/button";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const form = useForm({
  files: null,
});

function submit() {
  form.post("/store-files");
}
defineProps<{
  canLogin?: boolean;
  canRegister?: boolean;
  laravelVersion: string;
  phpVersion: string;
}>();
</script>

<template>
  <Head title="Homepage" />
  <AppLayout>
    <MainHeader />

    <div class="flex"></div>
  </AppLayout>
</template>

<style></style>
