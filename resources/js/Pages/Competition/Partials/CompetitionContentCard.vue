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
    <div class="grid min-h-10 grid-cols-2">
        <div
            class="container flex flex-col justify-center px-4 text-center max-md:py-8 md:px-20 xl:px-40"
            :class="{ 'order-1': position === 'right' }"
        >
            <div
                class="flex h-full flex-col justify-around gap-y-4 text-sm md:max-h-[50%] md:max-w-[80%] md:text-base lg:max-w-[50%]"
                :class="{
                    'md:ml-auto': position === 'left',
                    'md:mr-auto': position === 'right',
                }"
            >
                <h2
                    class="text-xl font-bold text-[#1F4387] md:text-2xl lg:text-4xl"
                    v-if="name"
                >
                    {{ name }}
                </h2>
                <p class="font-bold md:text-xl lg:text-2xl" v-if="type">
                    {{ type }}
                </p>
                <p
                    v-if="shortDesc"
                    class="font-raleway text-xs font-bold md:text-sm lg:text-base"
                >
                    {{ shortDesc }}
                </p>

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
                <div v-if="akunIg" class="flex justify-center gap-2">
                    <span class="inline-block">
                        <InstagramIcon class="size-6" />
                    </span>
                    <p>{{ akunIg }}</p>
                </div>
            </div>
        </div>

        <div
            class="competition-detail-pattern flex items-center justify-start bg-[length:25%] max-md:p-4 lg:bg-[length:5%] xl:bg-[length:20%]"
            :class="{ 'justify-end': position === 'right' }"
        >
            <div
                class="relative mx-4 flex aspect-square shrink overflow-hidden rounded-full md:mx-10 md:my-20 md:w-1/2"
            >
                <img
                    :src="imageUrl"
                    alt=""
                    class="w-full object-cover object-center"
                />

                <span
                    class="absolute left-0 top-0 size-full w-full bg-competition-juri-overlay bg-contain bg-center bg-no-repeat"
                />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
