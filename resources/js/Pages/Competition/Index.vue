<template>
    <div class="relative bg-[url('/assets/images/gds-2026/home-long.png')] bg-no-repeat bg-center bg-cover lg:bg-[length:100%_100%] overflow-hidden">
        <Head title="Kompetisi" />
        <AppLayout>
            <MainHeaderHome
                class="relative z-0 bg-transparent bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
            />

            <!-- Judul Halaman -->
            <div class="w-full flex items-center justify-center pt-8">
                <h1 class="font-black uppercase tracking-tighter text-sticker text-4xl md:text-5xl lg:text-6xl select-none">
                    Kompetisi
                </h1>
            </div>

            <!-- Area Pembungkus Kartu & Element Ikon Dekorasi -->
            <div class="relative w-full max-w-7xl mx-auto md:pb-20 pb-12 pt-16 md:px-12 px-0">
                
                <img
                    src="/assets/images/gds-2026/elements/arrow-blue.png"
                    alt="Arrow Blue"
                    class="absolute left-[2%] md:left-[5%] top-[5%] w-[6%] max-w-[65px] min-w-[30px] pointer-events-none select-none z-10"
                />

                <img
                    src="/assets/images/gds-2026/elements/lightning-yellow.png"
                    alt="Lightning Top"
                    class="absolute right-[4%] md:right-[8%] top-[2%] w-[4.5%] max-w-[50px] min-w-[22px] pointer-events-none select-none z-10"
                />

                <img
                    src="/assets/images/gds-2026/elements/lightning-red.png"
                    alt="Lightning Red"
                    class="absolute right-[5%] md:right-[9%] top-[34%] w-[5%] max-w-[55px] min-w-[25px] pointer-events-none select-none z-10"
                />

                <img
                    src="/assets/images/gds-2026/elements/lightning-yellow.png"
                    alt="Lightning Middle"
                    class="absolute left-[3%] md:left-[7%] top-[56%] w-[4.5%] max-w-[50px] min-w-[22px] pointer-events-none select-none z-10 -scale-x-100"
                />

                <img
                    src="/assets/images/gds-2026/elements/gamepad.png"
                    alt="Gamepad"
                    class="absolute left-[1%] md:left-[4%] bottom-[3%] w-[14%] max-w-[140px] min-w-[60px] pointer-events-none select-none z-10"
                />

                <img
                    src="/assets/images/gds-2026/elements/drum.png"
                    alt="Drum"
                    class="absolute right-[1%] md:right-[3%] bottom-[2%] w-[15%] max-w-[150px] min-w-[65px] pointer-events-none select-none z-10"
                />

                <!-- List Competition Card -->
                <div class="flex flex-col items-center justify-center gap-y-8 relative z-0">
                    <CompetitionCard
                        v-for="competition in kolaborasaCompetition"
                        :key="competition.title"
                        class="w-full"
                        :title="competition.title"
                        :imageUrl="competition.image"
                        :imageUrl2="competition.image2"
                        :shortDesc="competition.shortDesc"
                        :route="competition.route"
                    />

                    <CompetitionCard
                        v-for="competition in goodCreationCompetition"
                        :key="competition.title"
                        class="w-full"
                        :title="competition.title"
                        :imageUrl="competition.image"
                        :imageUrl2="competition.image2"
                        :shortDesc="competition.shortDesc"
                        :route="competition.route"
                    />
                </div>

            </div>
        </AppLayout>
    </div>
</template>

<script setup lang="ts">
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";
import CompetitionCard from "@/Components/CompetitionCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";

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