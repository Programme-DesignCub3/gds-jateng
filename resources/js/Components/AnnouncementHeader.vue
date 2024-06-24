<script setup lang="ts"></script>

<template>
    <div>
        <div
            class="competition-detail-pattern relative -z-10 flex h-80 items-center justify-center overflow-x-clip bg-[length:15%] md:h-[30rem] md:bg-[length:15%] lg:h-[35rem] lg:bg-[length:5%] xl:h-[45rem] xl:bg-[length:10%]"
        >
            <!-- util illustration -->
            <div
                class="bg-announcement-illust-etc absolute -top-[15%] left-1/2 size-full -translate-x-1/2 bg-[length:100%_100%] bg-center bg-repeat-x"
            />

            <!-- boy illustration  -->
            <div
                class="bg-boy xs:size-50 absolute -top-4 right-0 size-44 bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:-top-8 md:size-72 lg:size-80 xl:size-96"
            />

            <!-- girl illustration -->
            <div
                class="bg-girl absolute -bottom-10 -left-14 size-44 bg-[length:100%_100%] bg-center bg-no-repeat xs:size-52 sm:size-64 md:-left-20 md:size-72 lg:size-80 xl:-left-32 xl:bottom-0 xl:size-[25rem]"
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
        <!-- Oval -->
        <div class="relative -mt-20 overflow-x-clip">
            <div
                aria-hidden="true"
                class="absolute left-1/2 top-full -z-1 h-[50vw] w-[150%] -translate-x-1/2 -translate-y-[15%] rounded-[50%] bg-white"
            />
        </div>
    </div>
</template>

<style scoped></style>
