<template>
    <Head title="Welcome" />
    <AppLayout>
        <div class="container my-8">
            <form @submit.prevent="submit">
                <FileUpload
                    @uploaded-files-change="(files) => (form.files = files)"
                />
                <progress
                    v-if="form.progress"
                    :value="form.progress.percentage"
                    max="100"
                >
                    {{ form.progress.percentage }}%
                </progress>
                <Button class="ml-auto mt-4" type="submit">Submit</Button>
            </form>
        </div>
    </AppLayout>
</template>
<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import FileUpload from "@/Components/ui/custom/FileUpload.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";

const form = useForm({
    files: null,
});

function submit() {
    form.post("/test-upload");
}
</script>
<style></style>
