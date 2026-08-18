<script setup lang="ts">
import { InstagramIcon } from "lucide-vue-next";
import Hadiah from "@/Components/gds-2026/include/hadiah.vue";

withDefaults(
    defineProps<{
        position?: "left" | "right";
        type?: string;
        name?: string;
        shortDesc?: string;
        imageUrl?: string;
        pengalaman?: string[];
        akunIg?: string;
    }>(),
    {
        position: "left",
    },
);
</script>

<template>
    <div class="grid min-h-10 items-center justify-center gap-8 sm:grid-cols-2 px-4 md:px-12 max-w-7xl mx-auto py-8">
        <div class="flex items-center justify-center max-sm:order-1">
            <Hadiah />
        </div>

        <div class="flex flex-col justify-center text-center items-center px-2 max-sm:order-2">
            <div class="flex flex-col justify-center gap-y-3 text-base max-w-lg w-full">
                <h2
                    class="text-2xl font-black uppercase tracking-tighter text-sticker md:text-3xl lg:text-4xl"
                    v-if="name"
                >
                    {{ name }}
                </h2>
                <p class="font-bold md:text-xl lg:text-2xl" v-if="type">
                    {{ type }}
                </p>
                <div
                    v-if="shortDesc"
                    class="font-raleway text-xs sm:text-sm md:text-base leading-relaxed w-full mx-auto"
                    v-html="shortDesc"
                ></div>

                <ul v-if="pengalaman" class="text-center">
                    <li v-for="(item, index) in pengalaman" :key="index">
                        {{ item }}
                    </li>
                </ul>
                <div
                    v-if="akunIg"
                    class="flex items-center justify-center gap-2"
                >
                    <InstagramIcon class="size-6" />
                    <p>{{ akunIg }}</p>
                </div>
            </div>
        </div>
    </div>
</template>