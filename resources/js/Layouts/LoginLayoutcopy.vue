<script setup lang="ts">
defineProps<{
    bgImage?: string;
}>();
</script>

<template>
    <div
        class="relative mt-auto flex h-screen w-full grid-cols-2 flex-col bg-login bg-[length:110%] bg-[50%_65vh] bg-no-repeat pt-24 md:bg-[60%_50vh] xl:grid xl:bg-[length:50%] xl:bg-[-10%_5vh]"
    >
        <div
            class="relative hidden items-start justify-start overflow-y-hidden lg:flex"
        >
            <h1
                class="absolute left-0 top-[20%] bg-white px-20 py-2 text-lg shadow-lg after:absolute after:right-0 after:top-1/2 after:inline-block after:size-8 after:-translate-y-1/2 after:translate-x-1/2 after:rotate-45 after:bg-white"
            >
                Login
            </h1>
        </div>

        <div class="flex flex-col items-center justify-center lg:py-12">
            <slot />
        </div>
    </div>
</template>