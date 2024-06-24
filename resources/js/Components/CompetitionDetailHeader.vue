<script setup lang="ts"></script>
<template>
    <!-- base + dot pattern -->
    <div
        class="competition-detail-pattern relative -z-10 flex h-64 items-center justify-center overflow-x-clip bg-[length:15%] md:h-72 md:bg-[length:15%] lg:h-96 lg:bg-[length:5%] xl:h-[30rem] xl:bg-[length:10%]"
    >
        <!-- blob 1 -->
        <div
            class="bg-competition-blob-1 absolute -left-[15%] -top-[30%] size-44 bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:-left-20 md:size-72 lg:size-80 xl:-left-16 xl:-top-1/3 xl:size-96"
        />

        <!-- boy illustration  -->
        <div
            class="bg-competition-boy absolute -bottom-10 -left-6 size-44 bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:size-72 lg:size-80 xl:-bottom-1/4 xl:-left-12 xl:size-96"
        />

        <!-- blob 2 -->
        <div
            class="bg-competition-blob-2 xs:size-50 absolute -bottom-[20%] -right-[10%] size-40 bg-[length:100%_100%] bg-center bg-no-repeat sm:size-64 md:-bottom-1/3 md:-right-20 md:size-72 lg:size-80 xl:size-96"
        />

        <!-- girl illustration -->
        <div
            class="bg-competition-girl xs:size-50 absolute -top-4 right-0 size-44 bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:-top-8 md:size-72 lg:size-80 xl:size-96"
        />
        <!-- rip paper -->
        <div
            v-if="$slots.default"
            class="bg-competition-paper-rip relative flex h-full min-w-fit flex-col items-center justify-center bg-[length:90%] bg-center bg-no-repeat py-2 sm:bg-[length:100%]"
        >
            <p
                class="mx-8 my-2 inline-block text-center text-lg font-bold uppercase tracking-widest text-[#1F4387] sm:text-xl md:mx-12 md:text-2xl lg:mx-20 lg:my-7 xl:text-3xl"
            >
                <slot />
            </p>
        </div>
    </div>
</template>

<style scoped></style>
