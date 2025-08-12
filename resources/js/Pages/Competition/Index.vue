<template>
    <Head title="Kompetisi" />
    <AppLayout>
        <MainHeader
            bgImage="/assets/images/new/home.png"
            class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
        /> 
        
        <IconBackgroound />

        <div class="w-full mb-8 flex flex-col items-center justify-center gap-y-8 pt-20">
            <CompetitionCard
                v-for="competition in kolaborasaCompetition"
                :key="competition.title"
                class="w-full"
                :title="competition.title"
                :imageUrl="competition.image"
                :shortDesc="competition.shortDesc"
                :route="competition.route"
            />

            <CompetitionCard
                v-for="competition in goodCreationCompetition"
                :key="competition.title"
                class="w-full"
                :title="competition.title"
                :imageUrl="competition.image"
                :shortDesc="competition.shortDesc"
                :route="competition.route"
            />
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import CompetitionCard from "@/Components/CompetitionCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import IconBackgroound from "@/Components/IconBackgroound.vue";

const props = defineProps<{
    competitionList: {
        title: string;
        shortDesc: string;
        route: string;
        image: string;
    }[];
}>();

const kolaborasaCompetition = props.competitionList.filter(
    (competition) => competition.route === "kolaborasa"
);

const goodCreationCompetition = props.competitionList.filter(
    (competition) => competition.route !== "kolaborasa"
);
</script>

<style scoped></style>
