<script setup lang="ts"></script>

<template>
    <div>
        <div
            class="competition-detail-pattern relative -z-10 flex h-80 items-center justify-center overflow-x-clip bg-[length:15%] md:h-[30rem] md:bg-[length:15%] lg:h-[35rem] lg:bg-[length:5%] xl:h-[45rem] xl:bg-[length:8%]"
        >
            <!-- util illustration -->
            <div
                class="lg:-top-30 absolute -top-24 left-1/2 size-full -translate-x-1/2 bg-announcement-illust-etc bg-[length:100%_100%] bg-center bg-repeat-x md:-top-28 xl:size-[90%]"
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
                class="relative flex h-full min-w-fit flex-col items-center justify-center bg-[length:90%] bg-center bg-no-repeat py-2 sm:bg-[length:100%]"
            >
                <p
                    class="sm:text-1xl mb-32 inline-block text-center text-xl font-bold uppercase tracking-widest text-white max-md:px-20 md:w-[47%] md:text-4xl xl:text-5xl"
                >
                    Congratulation to the finalist!
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
