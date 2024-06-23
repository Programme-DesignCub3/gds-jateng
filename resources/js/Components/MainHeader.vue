<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

defineProps<{
    showJatengText?: boolean;
}>();
</script>

<template>
    <div class="relative -z-10 h-72 bg-black md:h-96"></div>

    <div
        class="container relative -z-1 -mb-8 -mt-40 size-80 rounded-full bg-white sm:-mt-52 sm:size-96 lg:-mt-60 lg:size-[30rem]"
    >
        <div
            class="absolute left-1/2 top-1/2 flex w-full -translate-x-1/2 -translate-y-1/2 flex-col justify-center gap-y-4 p-12 text-center md:p-16"
        >
            <ApplicationLogo />
            <div class="mx-auto w-3/4">
                <img draggable="false" src="assets/images/GDS.png" alt="" />
            </div>

            <p v-if="showJatengText" class="mt-4 text-lg font-bold uppercase">
                Jawa tengah
            </p>
        </div>
    </div>
</template>

<style scoped></style>
