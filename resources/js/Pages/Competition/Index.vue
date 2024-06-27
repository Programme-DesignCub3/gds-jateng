<template>
    <AppLayout>
        <MainHeader
            bgImage="/assets/images/home.svg"
            class="bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
        />
        <div
            class="container mb-8 flex flex-col items-center justify-center gap-y-8"
        >
            <CompetitionCard
                v-for="competition in competitionList"
                :title="competition.title"
                :imageUrl="`/assets/images/competition/overall/${competition.route}.jpg`"
                :shortDesc="competition.shortDesc"
                :route="competition.route"
                :key="competition.title"
            />
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import CompetitionCard from "@/Components/CompetitionCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps<{
    competitionList: {
        title: string;
        shortDesc: string;
        route: string;
    }[];
}>();
</script>

<style scoped></style>
