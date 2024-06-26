<template>
    <FilePond
        name="test"
        ref="pond"
        label-idle="Drop files here..."
        :instant-upload="false"
        :allow-multiple="false"
        credits="false"
        max-file-size="1MB"
        v-model:file="file"
        :files="files"
        @addfile="handleFileAdd"
        @init="handleFilePondInit"
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

// Create component
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize,
);

// Define file and files
const file = defineModel<null | File>({ required: true });
const files = ref<File[]>([]);

// Handle file add event
const handleFileAdd = (error: any, filepond: any) => {
    if (error) {
        console.error("Oh no, something went wrong!", error);
        return;
    }
    file.value = filepond.file;
};

// Handle FilePond init event
const handleFilePondInit = () => {};
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
