<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="bg-gray-100 dark:bg-gray-900">
        <div
            class="container flex min-h-screen flex-col items-center justify-center sm:justify-center"
        >
            <div>
                <Link href="/">
                    <ApplicationLogo class="w-60 fill-current text-gray-500" />
                </Link>
            </div>
            <div
                class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md dark:bg-gray-800 sm:max-w-md sm:rounded-lg"
            >
                <slot />
            </div>
        </div>
    </div>
</template>
