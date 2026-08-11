<script setup lang="ts">
import { InstagramIcon } from "lucide-vue-next";

withDefaults(
    defineProps<{
        position?: "left" | "right";
        type?: string;
        name?: string;
        shortDesc?: string;
        imageUrl: string;
        imageUrl2?: string;
        pengalaman?: string[];
        akunIg?: string;
    }>(),
    {
        position: "left",
    },
);
</script>

<template>
    <div class="grid min-h-10 sm:grid-cols-2">
        <!-- Kolom Teks -->
        <div
            class="container flex flex-col justify-center px-4 text-center max-md:py-8 max-sm:order-1 md:px-20 xl:px-40"
            :class="{
                'sm:order-1 md:pl-10 xl:pl-20': position === 'right',
                'md:pr-10 xl:pr-20': position === 'left',
            }"
        >
            <div
                class="flex h-full flex-col justify-center gap-y-4 text-base lg:my-4 lg:max-w-[80%] lg:text-lg"
                :class="{
                    'lg:ml-auto': position === 'left',
                    'lg:mr-auto': position === 'right',
                }"
            >
                <h2
                    class="text-xl font-black uppercase tracking-tighter text-sticker md:text-2xl lg:text-4xl"
                    v-if="name"
                >
                    {{ name }}
                </h2>
                <p class="font-bold md:text-xl lg:text-2xl" v-if="type">
                    {{ type }}
                </p>
                <p
                    v-if="shortDesc"
                    class="font-raleway text-xs md:text-base lg:text-base w-full mx-auto"
                    v-html="shortDesc"
                ></p>

                <ul
                    v-if="pengalaman"
                    :class="{
                        'text-start': position === 'right',
                        'text-end': position === 'left',
                    }"
                >
                    <li class="text-center" v-for="(item, index) in pengalaman" :key="index">
                        {{ item }}
                    </li>
                </ul>
                <div
                    v-if="akunIg"
                    class="flex items-center justify-center gap-2"
                >
                    <span class="inline-block">
                        <InstagramIcon class="size-6" />
                    </span>
                    <p>{{ akunIg }}</p>
                </div>
            </div>
        </div>

        <!-- Kolom Foto -->
        <div
            class="flex items-center justify-center max-sm:p-8"
            :class="{ 
                'sm:justify-end': position === 'right',
                'sm:justify-start': position === 'left'
            }"
        >
            <div 
                v-if="!imageUrl2" 
                class="relative mx-4 my-6 w-full max-w-[280px] sm:max-w-[320px] aspect-[3/4] transition-transform duration-300 hover:scale-105"
            >
                <img
                    :src="imageUrl"
                    alt="Foto"
                    class="w-full h-full object-cover rounded-2xl border-4 border-red-600 shadow-lg"
                />
            </div>

            <div 
                v-else 
                class="relative mx-4 my-8 flex items-center justify-center gap-2 sm:gap-4 w-full max-w-[420px]"
            >
                <div class="relative w-1/2 aspect-[3/4] -rotate-6 transition-transform duration-300 hover:rotate-0 hover:z-10">
                    <img
                        :src="imageUrl"
                        alt="Foto 1"
                        class="w-full h-full object-cover rounded-2xl border-4 border-red-600 shadow-md"
                    />
                </div>

                <div class="relative w-1/2 aspect-[3/4] rotate-6 transition-transform duration-300 hover:rotate-0 hover:z-10">
                    <img
                        :src="imageUrl2"
                        alt="Foto 2"
                        class="w-full h-full object-cover rounded-2xl border-4 border-red-600 shadow-md"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>