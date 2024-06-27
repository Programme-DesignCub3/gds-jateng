<template>
    <AppLayout>
        <Head title="Homepage" />
        <MainHeader
            showJatengText
            bgImage="/assets/images/home.svg"
            class="bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
        />

        <div class="container max-w-3xl pb-28 text-center">
            <div class="flex flex-col gap-6">
                <p>Siap untuk bikin gebrakan dan tunjukin kemampuanmu?</p>
                <p>
                    Ikuti berbagai kompetisi Good Challenge dari Good Day
                    Schoolicious sebagai wadah dari semua ide dan kreativitas mu
                    dengan rasa sportivitas yang tinggi!Untuk kamu yang suka
                    nyanyi untuk cover lagu, kamu bisa ikut Kolaborasa
                    Competition. Dan buat sekolahmu yang keren, kamu bisa ikuti
                    Cheerleader Competition, Mascot Design Competition dan
                    Supporter Chant Competition.
                </p>
                <p>
                    Good Challenge memiliki cerita di balik tantangan atau
                    kompetisi yang memberikan dampak atau pengalaman positif
                    yang bisa jadi experience dan memorable moment di masa muda
                    mu dengan rasa sportivitas yang tertuang di setiap karya
                    para finalis Good Day Schoolicious 2024
                </p>
                <p>Daripada kamu Gamon,. mending ikutan kompetisi Yuk !!</p>
            </div>

            <PrimaryButton as-child class="mt-20">
                <Link
                    :href="
                        $page.props.auth.user
                            ? route('competition.index')
                            : route('register')
                    "
                >
                    {{ $page.props.auth.user ? "Submission" : "Join Now" }}
                </Link>
            </PrimaryButton>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

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
