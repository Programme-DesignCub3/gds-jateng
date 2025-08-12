<script setup lang="ts">
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import SubmissionHeader from "@/Components/SubmissionHeader.vue";
import UploadVideo from "@/Components/UploadVideo.vue";
import UploadImages from "@/Components/UploadImages.vue";
import IconBackgroound from "@/Components/IconBackgroound.vue";
</script>

<template>
    <div class="relative">
        <AppLayout>
            <Head title="Submission page" />
            <SubmissionHeader
            bgImage="/assets/images/new/home.png"
            class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
            />
            <IconBackgroound />
            
            <UploadImages
                v-if="$page.props.auth.user.competition === 'mascot-design'"
            />
            <UploadVideo v-else />
        </AppLayout>
    </div>
</template>
