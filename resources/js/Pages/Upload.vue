<script setup lang="ts">
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import UploadVideo from "@/Components/UploadVideo.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";
import IconPrimary from "@/Components/gds-2026/include/IconPrimary.vue";
</script>

<template>
    <div class="relative" :style="{
      backgroundImage: `url('/assets/images/gds-2026/home-long.png')`,
      backgroundRepeat: 'no-repeat',
      backgroundPosition: 'center',
      backgroundSize: 'cover',
    }">
        <AppLayout>
            <Head title="Submission page" />
            <MainHeaderHome class="...">
                <img 
                    src="/assets/images/gds-2026/logo-submission.png" 
                    alt="Header Pengumuman" 
                    class="w-[20rem] sm:w-[20rem] md:w-[32rem] lg:w-[36rem] xl:w-[40rem] 2xl:w-[48rem] h-auto object-contain"
                    draggable="false"
                />
            </MainHeaderHome>

            <div class="relative w-full overflow-hidden">
                <IconPrimary />

                <div class="container relative z-0 mx-auto px-4 py-12 flex flex-col items-center justify-center">
                    <h1 class="font-black uppercase tracking-tighter text-sticker text-3xl md:text-4xl lg:text-5xl select-none text-center mb-8">
                        Submission
                    </h1>

                    <UploadVideo />
                </div>
            </div>

        </AppLayout>
    </div>
</template>