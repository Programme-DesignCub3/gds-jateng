<template>
    <div
        class="flex h-full items-center justify-between mx-12 gap-x-4 gap-y-4 md:rounded-full rounded-xl px-6 py-6 border-2 border-primary max-md:size-auto max-md:h-full max-md:flex-col md:max-h-80 md:max-w-3xl"
    >
        <img
            v-if="imageUrl"
            :src="imageUrl"
            alt=""
            class="w-full shrink overflow-hidden md:rounded-full rounded-lg object-cover object-center max-md:aspect-video md:max-w-40 md:basis-36"
        />

        <div
            class="flex w-full flex-col items-start justify-center max-md:gap-x-4 md:max-w-lg"
        >
            <h2 class="mb-3 text-xl font-bold md:mb-1 md:text-2xl">
                {{ title }}
            </h2>
            <div class="flex h-full" v-if="shortDesc">
                <p class="text-sm md:text-base">
                    {{ shortDesc }}
                </p>
            </div>
        </div>
        <div
            as-child
            v-if="route"
            class="shrink-0 rounded-lg max-md:w-full md:rounded-full"
            size="icon"
        >
            <Link :href="`/kompetisi/${route}`">
                <Arrow class="h-8 w-8"></Arrow>
            </Link>
        </div>
    </div>
</template>

<script setup lang="ts">
import Arrow from "@/Components/arrow.vue";
import { ArrowRight } from "lucide-vue-next";
import { Button } from "@/Components/ui/button";
import { Link } from "@inertiajs/vue3";

defineProps<{
    title: string;
    shortDesc?: string;
    imageUrl?: string;
    route?: string;
}>();
</script>

<style scoped></style>
