<template>
    <div
        class="flex h-full items-center justify-between mx-12 gap-x-2 gap-y-4 md:rounded-[3rem] rounded-xl px-6 py-6 border-4 border-white max-md:size-auto max-md:h-full max-md:flex-col md:max-h-80 md:max-w-3xl"
    >
        <div class="w-full md:w-1/3 flex items-center justify-center">
            <img
                v-if="imageUrl"
                :src="imageUrl"
                alt=""
                class="w-full shrink object-contain object-center max-md:aspect-video md:max-w-40 md:basis-36 md:object-cover"
            />
        </div>
       

        <div
            class="flex w-full md:w-2/3 flex-col items-start justify-center max-md:gap-x-4 md:max-w-lg"
        >
            <h2 class="mb-3 text-xl font-bold md:mb-1 md:text-2xl">
                {{ title }}
            </h2>
            <div class="flex h-full" v-if="shortDesc">
                <p class="text-sm md:text-base" v-html="shortDesc"></p>
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
