<script setup lang="ts">
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import SubmissionHeader from "@/Components/SubmissionHeader.vue";
import UploadVideo from "@/Components/UploadVideo.vue";
import UploadImages from "@/Components/UploadImages.vue";
import IconBackgroound from "@/Components/IconBackgroound.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";
</script>

<template>
    <div class="relative" :style="{
      backgroundImage: `url('/assets/images/gds-2026/long-bg.png')`,
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
            <!-- <IconBackgroound /> -->
        
            <UploadVideo />
        </AppLayout>
    </div>
</template>
