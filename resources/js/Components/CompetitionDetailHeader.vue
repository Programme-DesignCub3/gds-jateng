<script setup lang="ts"></script>
<template>
    <div
        class="competition-detail-pattern relative -z-10 flex h-72 items-center justify-center overflow-clip bg-[length:15%] md:h-96 md:bg-[length:15%] lg:bg-[length:5%] xl:bg-[length:10%]"
    >
        <!-- blob 1 -->
        <div
            class="bg-competition-blob-1 xl:-left-18 absolute -left-[11%] -top-[22%] size-44 bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:-left-20 md:size-72 lg:size-80 xl:-top-1/3"
        />

        <!-- boy illustration  -->
        <div
            class="bg-competition-boy absolute -bottom-10 -left-6 size-44 bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:size-72 lg:size-80 xl:-bottom-1/4 xl:-left-12"
        />

        <!-- blob 2 -->
        <div
            class="bg-competition-blob-2 xs:size-50 absolute -bottom-[20%] -right-[10%] size-40 bg-[length:100%_100%] bg-center bg-no-repeat sm:size-64 md:-bottom-1/3 md:-right-20 md:size-72 lg:size-80"
        />

        <!-- girl illustration -->
        <div
            class="bg-competition-girl xs:size-50 absolute -top-4 right-0 size-44 bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:-top-8 md:size-72 lg:size-80"
        />
        <!-- rip paper -->
        <div
            v-if="$slots.default"
            class="bg-competition-paper-rip relative inline-block min-w-fit bg-[length:auto_100%] bg-center bg-no-repeat py-2"
        >
            <p
                class="mx-40 my-3 inline-block text-xl font-bold uppercase tracking-widest text-[#1F4387] md:mx-60 md:my-7 md:text-4xl"
            >
                <slot />
            </p>
        </div>
    </div>
</template>

<style scoped></style>
