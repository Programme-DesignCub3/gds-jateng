<template>
    <div class="relative" :style="{
      backgroundImage: `url('/assets/images/gds-2026/long-bg.png')`,
      backgroundRepeat: 'no-repeat',
      backgroundPosition: 'center',
      backgroundSize: 'cover',
    }">
        <Head title="Kompetisi" />
        <AppLayout>
            <MainHeaderHome
                class="relative z-0 bg-transparent bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
            />

            <div class="w-full flex items-center justify-center pt-8">
                <h1 class="font-black uppercase tracking-tighter text-sticker text-4xl md:text-5xl lg:text-6xl">Kompetisi</h1>
            </div>

            <div class="w-full md:pb-20 pb-12 flex flex-col items-center justify-center gap-y-8 pt-20 md:px-12 px-0">
                <CompetitionCard
                    v-for="competition in kolaborasaCompetition"
                    :key="competition.title"
                    class="w-full z-0"
                    :title="competition.title"
                    :imageUrl="competition.image"
                    :imageUrl2="competition.image2"
                    :shortDesc="competition.shortDesc"
                    :route="competition.route"
                />

                <CompetitionCard
                    v-for="competition in goodCreationCompetition"
                    :key="competition.title"
                    class="w-full z-0"
                    :title="competition.title"
                    :imageUrl="competition.image"
                    :imageUrl2="competition.image2"
                    :shortDesc="competition.shortDesc"
                    :route="competition.route"
                />
            </div>
        </AppLayout>
    </div>
</template>

<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import CompetitionCard from "@/Components/CompetitionCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import IconBackgroound from "@/Components/IconBackgroound.vue";
import IconContent from "@/Components/IconContent.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";

const props = defineProps<{
    competitionList: {
        title: string;
        shortDesc: string;
        route: string;
        image: string;
        image2?: string;
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
