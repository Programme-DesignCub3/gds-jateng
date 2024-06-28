<script setup lang="ts"></script>
<template>
    <div
        class="relative -z-10 flex h-80 items-center justify-center overflow-x-clip bg-[length:15%] md:h-[30rem] md:bg-[length:15%] lg:h-[35rem] lg:bg-[length:5%] xl:h-[45rem] xl:bg-[length:8%]"
    >
        <!-- util illustration -->
        <div
            class="absolute -top-14 left-1/2 size-full -translate-x-1/2 bg-announcement-illust-etc bg-[length:100%_100%] bg-center bg-repeat-x md:-top-28 lg:-top-20 xl:size-[90%]"
        />

        <!-- boy illustration  -->
        <div
            class="xs:size-50 absolute -right-16 bottom-1 size-44 bg-boy bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:-bottom-4 md:-right-24 md:size-72 lg:-bottom-28 lg:-right-44 lg:size-80 xl:size-[36rem]"
        />

        <!-- girl illustration -->
        <div
            class="xs:size-50 absolute -left-16 bottom-5 size-44 bg-girl bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:-left-24 md:bottom-12 md:size-72 lg:-left-56 lg:bottom-0 lg:size-40 xl:size-[36rem]"
        />

        <!-- rip paper -->
        <div
            class="relative flex h-full min-w-fit flex-col items-center justify-center bg-orange-paper-rip bg-[length:100%_100%] bg-center bg-no-repeat py-2"
        >
            <p
                class="inline-block w-1/2 text-center text-xl font-bold uppercase tracking-widest text-white sm:text-xl md:text-3xl xl:text-5xl"
            >
                UPLOAD SUBMISSION
            </p>
        </div>
    </div>
</template>

<style scoped></style>
