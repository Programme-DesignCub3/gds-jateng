<template>
    <AppLayout>
        <MainHeader />
        <div
            class="container mb-8 flex flex-col items-center justify-center gap-y-8"
        >
            <CompetitionCard v-for="i in 4" :key="i" />
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import MainHeader from "@/Components/MainHeader.vue";
import CompetitionCard from "@/Components/CompetitionCard.vue";
</script>

<style scoped></style>
