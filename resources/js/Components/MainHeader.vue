<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { cn } from "@/lib/utils";

withDefaults(
    defineProps<{
        showJatengText?: boolean;
        bgImage?: string | null;
    }>(),
    {
        showJatengText: false,
        bgImage: null,
    },
);
</script>

<template>
    <div
        :class="
            cn(
                `${bgImage ? bgImage : 'bg-black'} relative -z-10 h-72 md:h-96`,
                $attrs.class as string,
            )
        "
        :style="{ 'background-image': `url(${bgImage})` }"
    ></div>

    <div
        class="container relative -z-1 -mb-4 -mt-40 size-64 rounded-full bg-white xs:size-80 sm:-mb-8 sm:-mt-52 sm:size-96 lg:-mt-60 lg:size-[30rem]"
    >
        <div
            class="absolute left-1/2 top-1/2 flex w-full -translate-x-1/2 -translate-y-1/2 flex-col justify-center gap-y-4 p-6 text-center sm:p-12 md:p-16"
        >
            <ApplicationLogo />
            <div class="mx-auto w-3/4">
                <img draggable="false" src="/assets/images/GDS.svg" alt="" />
            </div>

            <p v-if="showJatengText" class="mt-4 text-xl font-bold">
                Jawa Tengah
            </p>
        </div>
    </div>
</template>

<style scoped></style>
