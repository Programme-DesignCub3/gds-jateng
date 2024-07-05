<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { ArrowLeft } from "lucide-vue-next";
</script>

<template>
    <button
        type="button"
        class="group/back h-8 w-24 rounded-xl bg-white text-center font-sans font-semibold text-black outline outline-primary md:h-14 md:w-48 md:text-xl"
    >
        <Link
            :href="route('competition.index')"
            class="absolute left-0 top-0 z-1 flex h-full w-1/2 items-center justify-center rounded-xl border-4 border-white bg-primary p-2 duration-500 group-hover/back:w-full md:w-1/4"
        >
            <ArrowLeft class="text-white" />
        </Link>
        <p class="translate-x-2">Go Back</p>
    </button>
</template>

<style scoped></style>
