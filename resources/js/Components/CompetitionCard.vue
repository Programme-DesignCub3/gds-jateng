<template>
    <div
        class="flex h-full items-center justify-between gap-x-10 gap-y-4 rounded-2xl border-2 border-primary p-4 max-sm:size-auto max-sm:h-full max-sm:flex-col sm:max-h-80 sm:max-w-3xl sm:pr-16"
    >
        <img
            :src="imageUrl"
            alt=""
            class="w-full shrink overflow-hidden rounded-lg object-cover object-center max-sm:aspect-video sm:size-32 sm:max-w-32"
        />

        <div
            class="flex w-full flex-col items-start justify-center max-sm:gap-x-4 sm:max-w-xs"
        >
            <h2 class="mb-3 text-xl font-bold">{{ title }}</h2>
            <div class="flex h-full">
                <p class="text-sm">
                    {{ shortDesc }}
                </p>
            </div>
        </div>
        <Button as-child class="shrink-0 rounded-full" size="icon">
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
    shortDesc: string;
    imageUrl: string;
    route: string;
}>();
</script>

<style scoped></style>
