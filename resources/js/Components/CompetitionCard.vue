<template>
    <div
        class="flex h-full items-center justify-between gap-x-4 gap-y-4 rounded-2xl border-2 border-primary p-4 max-md:size-auto max-md:h-full max-md:flex-col md:max-h-80 md:max-w-3xl md:pr-16"
    >
        <img
            v-if="imageUrl"
            :src="imageUrl"
            alt=""
            class="w-full shrink overflow-hidden rounded-lg object-cover object-center max-md:aspect-video md:max-w-40 md:basis-36"
        />

        <div
            class="flex w-full flex-col items-start justify-center max-md:gap-x-4 md:max-w-sm"
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
        <Button
            as-child
            v-if="route"
            class="shrink-0 rounded-lg max-md:w-full md:rounded-full"
            size="icon"
        >
            <Link :href="`/kompetisi/${route}`">
                <ArrowRight class="h-8 w-8" />
            </Link>
        </Button>
    </div>
</template>

<script setup lang="ts">
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
