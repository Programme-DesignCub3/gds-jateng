<script setup lang="ts">
import { InstagramIcon } from "lucide-vue-next";

withDefaults(
    defineProps<{
        position?: "left" | "right";
        type?: string;
        name?: string;
        shortDesc?: string;
        imageUrl: string;
        imageUrl2?: string | null;
        pengalaman?: string[];
        akunIg?: string;
    }>(),
    {
        position: "left",
        imageUrl2: null,
    },
);
</script>

<template>
    <div class="grid min-h-10 items-center justify-center gap-8 sm:grid-cols-2 px-4 md:px-12 max-w-7xl mx-auto py-8">
        <!-- Kolom Teks Juri -->
        <div
            class="flex flex-col justify-center text-center items-center px-2 max-sm:order-2"
            :class="{ 'sm:order-2': position === 'right' }"
        >
            <div class="flex flex-col justify-center gap-y-4 text-base max-w-lg w-full">
                <h2
                    class="text-2xl font-black uppercase tracking-tighter text-sticker md:text-3xl lg:text-4xl"
                    v-if="name"
                    v-html="name"
                ></h2>
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

        <div
            class="flex items-center justify-center w-full max-sm:order-1"
            :class="{ 'sm:order-1': position === 'right' }"
        >
            <div 
                v-if="!imageUrl2" 
                class="relative my-4 w-full max-w-[260px] sm:max-w-[300px] aspect-[3/4] transition-transform duration-300 hover:scale-105"
            >
                <img
                    :src="imageUrl"
                    alt="Foto Juri"
                    class="w-full h-full object-cover rounded-2xl border-4 border-red-600 shadow-lg"
                />
            </div>

            <div 
                v-else 
                class="relative my-4 flex items-center justify-center gap-3 sm:gap-6 w-full max-w-[560px] sm:max-w-[640px]"
            >
                <div class="relative w-1/2 max-w-[280px] aspect-[3/4] -rotate-6 transition-transform duration-300 hover:rotate-0 hover:z-0">
                    <img
                        :src="imageUrl"
                        alt="Foto Juri 1"
                        class="w-full h-full object-cover rounded-2xl border-4 border-red-600 shadow-md"
                    />
                </div>

                <div class="relative w-1/2 max-w-[280px] aspect-[3/4] rotate-6 transition-transform duration-300 hover:rotate-0 hover:z-0">
                    <img
                        :src="imageUrl2"
                        alt="Foto Juri 2"
                        class="w-full h-full object-cover rounded-2xl border-4 border-red-600 shadow-md"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>