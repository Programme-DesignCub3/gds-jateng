<template>
    <AppLayout>
        <Head title="Detail Kompetensi" />
        <CompetitionDetailHeader>Kolaborasa</CompetitionDetailHeader>

        <div
            class="container my-8 mb-8 mt-12 flex w-4/5 flex-col items-center justify-center gap-y-8"
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

        <div class="space-y-8">
            <CompetitionContentCard v-for="i in 4" :key="i" />
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import CompetitionContentCard from "./Partials/CompetitionContentCard.vue";
import CompetitionDetailHeader from "@/Components/CompetitionDetailHeader.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<style scoped></style>
