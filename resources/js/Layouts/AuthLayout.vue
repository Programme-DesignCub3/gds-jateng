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

        <div class="container flex h-dvh items-center justify-center py-12">
            <div
                class="mx-auto grid w-full max-w-md items-center justify-center gap-6"
            >
                <Link :href="route('home')">
                    <ApplicationLogo
                        class="w-full fill-current text-gray-500 lg:w-60"
                    />
                </Link>
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";

defineProps<{
    bgImage?: string;
}>();
</script>
