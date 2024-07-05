<script setup lang="ts">
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import SubmissionHeader from "@/Components/SubmissionHeader.vue";
import UploadVideo from "@/Components/UploadVideo.vue";
import UploadImages from "@/Components/UploadImages.vue";
</script>

<template>
    <AppLayout>
        <Head title="Submission page" />
        <SubmissionHeader />

        <UploadImages
            v-if="$page.props.auth.user.competition === 'mascot-design'"
        />
        <UploadVideo v-else />
    </AppLayout>
</template>
