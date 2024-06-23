<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";

defineProps<{
    bgImage?: string;
}>();
</script>

<template>
    <div
        class="relative w-full lg:grid lg:min-h-[600px] lg:grid-cols-2 xl:min-h-[800px]"
    >
        <div class="hidden bg-muted lg:block">
            <img
                :src="bgImage"
                alt="Image"
                class="h-full w-full object-cover"
            />
        </div>

        <div class="flex flex-col items-center justify-center py-12">
            <slot />
        </div>
    </div>
</template>
