<template>
  <Head title="Homepage" />
  <AppLayout>
    <MainHeader :showJatengText="true" />

    <div class="container max-w-3xl pb-28 text-center">
      <div class="mb-4">
        <p>
          Good Day Good Challenge menjadi sebuah wadah kreatifitas untuk siswa - siswi SMA
          yang turut memeriahkan DBL Competition
        </p>
        <p>
          Dengan membawa Rasa Sportifitas dari berbagai rangkai Kegiatan Kopi Good Day
          Schoolicious.
        </p>
      </div>
      <div>
        <p>Akan ada kompetisi kolaborsa untuk kamu yang mempunyai hobby Cover Lagu.</p>
        <p>
          Dan juga ada Kompetisi Cheerleader, Mascot Design dan Chant Supporter untuk
          ajang kolaborasi sekolahmu
        </p>
      </div>

      <PrimaryButton as-child class="mt-20">
        <Link :href="route('register')">Join Now</Link>
      </PrimaryButton>
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import MainHeader from "@/Components/MainHeader.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

import { Button } from "@/Components/ui/button";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

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

<style></style>
