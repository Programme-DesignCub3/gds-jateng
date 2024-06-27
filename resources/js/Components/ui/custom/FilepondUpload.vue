<template>
    <FilePond
        name="test"
        ref="pond"
        label-idle="Drop files here..."
        :instant-upload="false"
        :allow-multiple="false"
        credits="false"
        max-file-size="1MB"
        @addfile="handleFilePondFileAdd"
        @init="handleFilePondInit"
        @removefile="handleFilePondRemoveFile"
    />
</template>

<script setup lang="ts">
// Import Vue FilePond
import vueFilePond from "vue-filepond";

// Import FilePond plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
import { ref } from "vue";
import type { FilePondErrorDescription } from "filepond";
import type { FilePondFile } from "filepond";

// Create component
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize,
);

// Define file and files
const inputFile = defineModel<null | File>({ required: true });

// Handle file add event
const handleFilePondFileAdd = (
    error: FilePondErrorDescription | null,
    file: FilePondFile,
) => {
    if (error) {
        console.error("Oh no, something went wrong!", error);
        return;
    }
    inputFile.value = file.file as File;
};

// Remove the server id on file remove
const handleFilePondRemoveFile = (
    error: FilePondErrorDescription | null,
    file: FilePondFile,
) => {
    inputFile.value = null;
};

// Handle FilePond init event
const handleFilePondInit = () => {};
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
