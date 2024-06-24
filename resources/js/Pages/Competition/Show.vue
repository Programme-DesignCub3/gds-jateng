<template>
    <AppLayout>
        <Head title="Detail Kompetensi" />
        <CompetitionDetailHeader
            >Cheerleading Competition</CompetitionDetailHeader
        >

        <div
            class="container my-8 mb-8 mt-14 flex flex-col items-center justify-center gap-y-8 md:mt-12 md:w-4/5"
        >
            <div class="text-center font-raleway">
                <p v-for="i in 2" :key="i">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Provident distinctio atque ducimus nobis quidem unde?
                    Voluptatum, eius praesentium soluta aliquam dolor, quae
                    perferendis maxime veritatis vero a quasi mollitia
                    aspernatur.
                </p>
            </div>
        </div>

        <div class="my-20">
            <CompetitionContentCard
                :position="i % 2 === 0 ? 'right' : 'left'"
                v-for="i in 4"
                :key="i"
            />
        </div>

        <div class="container mb-20 flex w-fit flex-col gap-4">
            <PrimaryButton>Download rules</PrimaryButton>
            <PrimaryButton as-child>
                <Link :href="route('test-upload.create')">Submit</Link>
            </PrimaryButton>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import CompetitionContentCard from "./Partials/CompetitionContentCard.vue";
import CompetitionDetailHeader from "@/Components/CompetitionDetailHeader.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

<style scoped></style>
