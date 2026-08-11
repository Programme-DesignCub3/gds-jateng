<template>
  <Head title="Welcome" />
  <AppLayout>
    <div class="container my-8">
      <form @submit.prevent="submit">
        <MultiFileUpload @uploaded-files-change="(files) => (form.files = files)" />
        <Progress v-if="form.progress" :value="form.progress.percentage" :max="100">
          {{ form.progress.percentage }}%
        </Progress>

        <Button class="ml-auto mt-4" type="submit">Submit</Button>
      </form>
    </div>
  </AppLayout>
</template>
<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import FileUpload from "@/Components/ui/custom/FileUpload.vue";
import axios from "axios";
import { Head, useForm, router as Inertia } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import MultiFileUpload from "@/Components/ui/custom/MultiFileUpload.vue";
import { Progress } from "@/Components/ui/progress";

const form = useForm({
  files: null,
});

// TODO: implement chunk upload
// async function chunkFileAndUpload(file: File) {
//     try {
//         if (file.size > 250 * 1024 * 1024) {
//             throw new Error("The file must be less than 100 MB");
//         }

//         const chunkSize = 1024 * 1024 * 4;
//         const chunks = Math.ceil(file.size / chunkSize);

//         for (let i = 0; i < chunks; i++) {
//             const start = i * chunkSize;
//             const end = Math.min(file.size, start + chunkSize);
//             const chunk = file.slice(start, end);

//             // const formData = new FormData();
//             form.files.append("file", chunk, file.name);
//             file.append("is_last_chunk", i === chunks - 1 ? "true" : "false");
//             await form.post(route("uploads.chunk"), formData);
//         }
//         Inertia.reload();
//     } catch (e: any) {
//         alert(e.message ?? "Failed!");
//     }
// }

// function handleFileUpload(event: Event) {
//     event.preventDefault();

//     const target = event.target as HTMLInputElement;
//     const files = target.files;
//     if (!files) {
//         return;
//     }

//     const file = files[0];

//     chunkFileAndUpload(file);
// }

function submit() {
  form.post("/test-upload");
}
</script>
<style></style>
