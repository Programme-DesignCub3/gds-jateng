<script setup lang="ts">
import AnnouncementCard from "@/Components/AnnouncementCard.vue";

defineProps<{
    title?: string;
}>();
</script>

<template>
    <div class="flex w-full flex-col items-center justify-center gap-y-6">
        <h2
            class="bg-orange-paper-rip relative mx-10 inline-block h-full w-fit flex-col items-center justify-center bg-[length:100%_100%] bg-center bg-no-repeat px-4 py-8 text-center text-lg font-bold uppercase text-[#1F4387]"
        >
            {{ title }}
        </h2>
        <div class="grid w-full grid-cols-4 gap-x-4 gap-y-8 text-center">
            <AnnouncementCard v-for="i in 8" :key="i">
                lorem ipsum {{ i }}
            </AnnouncementCard>
        </div>
    </div>
</template>

<style scoped></style>
