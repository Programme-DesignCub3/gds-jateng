<template>
    <MainHeader
        bgImage="/assets/images/home.svg"
        class="bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
    />
    <div
        class="container mb-8 flex flex-col items-center justify-center gap-y-8"
    >
        <CompetitionCard v-for="i in 4" :key="i" />
    </div>
</template>

<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import CompetitionCard from "@/Components/CompetitionCard.vue";
</script>

<style scoped></style>
