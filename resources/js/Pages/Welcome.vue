<template>
    <Head title="Homepage" />
    <MainHeader
        showJatengText
        bgImage="/assets/images/home.svg"
        class="bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
    />

    <div class="container max-w-3xl pb-28 text-center">
        <div class="mb-4">
            <p>
                Good Day Good Challenge menjadi sebuah wadah kreatifitas untuk
                siswa - siswi SMA yang turut memeriahkan DBL Competition
            </p>
            <p>
                Dengan membawa Rasa Sportifitas dari berbagai rangkai Kegiatan
                Kopi Good Day Schoolicious.
            </p>
        </div>
        <div>
            <p>
                Akan ada kompetisi kolaborsa untuk kamu yang mempunyai hobby
                Cover Lagu.
            </p>
            <p>
                Dan juga ada Kompetisi Cheerleader, Mascot Design dan Chant
                Supporter untuk ajang kolaborasi sekolahmu
            </p>
        </div>

        <PrimaryButton as-child class="mt-20">
            <Link :href="route('register')">Join Now</Link>
        </PrimaryButton>
    </div>
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
