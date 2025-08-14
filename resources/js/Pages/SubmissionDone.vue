<template>
    <Head title="Submission sudah terkirim" />

    <AppLayout fixed-nav>
        <div class="competition-detail-pattern relative h-screen">
            <div
                class="container absolute left-1/2 top-1/2 max-h-screen max-w-4xl -translate-x-1/2 -translate-y-[55%] overflow-x-clip"
            >
                <img
                    src="/assets/images/logo_home.png"
                    alt=""
                    draggable="false"
                    class="max-md:scale-125"
                />
                <!-- rip paper -->
                <div
                    class="relative top-20 flex h-full min-w-fit flex-col items-center justify-center bg-orange-paper-rip bg-[length:100%_100%] bg-center bg-no-repeat py-12 md:-mt-28"
                >
                    <h1
                        class="inline-block w-4/5 text-center font-bold uppercase tracking-widest text-white sm:text-lg md:text-2xl xl:text-4xl"
                    >
                        SUBMISSION SUDAH TERKIRIM
                    </h1>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<style scoped></style>
