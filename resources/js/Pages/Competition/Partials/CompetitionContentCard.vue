<script setup lang="ts">
import { InstagramIcon } from "lucide-vue-next";

withDefaults(
    defineProps<{
        position: "left" | "right";
        type: string;
        name: string;
        shortDesc?: string;
        imageUrl: string;
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
                    class="text-xl font-bold text-[#8b3b1e] md:text-2xl lg:text-4xl"
                    v-if="name"
                >
                    {{ name }}
                </h2>
                <p class="font-bold md:text-xl lg:text-2xl" v-if="type">
                    {{ type }}
                </p>
                <p
                    v-if="shortDesc"
                    class="font-raleway text-xs font-bold md:text-base lg:text-base w-3/4 mx-auto"
                    v-html="shortDesc"
                ></p>

                <ul
                    v-if="pengalaman"
                    :class="{
                        'text-start': position === 'right',
                        'text-end': position === 'left',
                    }"
                >
                    <li class="text-center" v-for="item in pengalaman">
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

        <div
            class="flex items-center justify-start max-sm:p-12"
            :class="{ 'justify-end': position === 'right' }"
        >
            <div
                class="relative mx-4 flex shrink overflow-hidden md:mx-10 md:my-20"
            >
                <img
                    :src="imageUrl"
                    alt=""
                    class="w-full h-auto object-cover object-center"
                />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
