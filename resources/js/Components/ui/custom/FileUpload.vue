<template>
  <div>
    <label
      v-bind="getRootProps()"
      class="relative flex w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 py-6 hover:bg-gray-100"
    >
      <div class="text-center">
        <div class="mx-auto max-w-min rounded-md border p-2">
          <UploadCloudIcon :size="20" />
        </div>

        <!-- TODO: selesain woi jangan ngegame mulu -->
        <P class="mt-2 text-sm text-gray-600">Masih WIP, ALIAS BELUM WORK 100%</P>
        <p v-if="isDragActive">Drop the files here ...</p>
        <p v-else class="mt-2 text-sm text-gray-600">
          <span class="font-semibold">Drag files</span>
        </p>

        <p class="text-xs text-gray-500">
          Click to upload files (files should be under 250MB)
        </p>
      </div>
    </label>

    <input
      v-bind="getInputProps()"
      id="dropzone-file"
      accept="video/mp4"
      type="file"
      class="hidden"
    />
  </div>
</template>

<script setup lang="ts">
import { UploadCloudIcon } from "lucide-vue-next";
import { ref } from "vue";

import { useDropzone, type FileRejectReason } from "vue3-dropzone";

const filesToUpload = ref<File[] | null>(null);

const emit = defineEmits(["uploadedFilesChange"]);

const onDrop = async (
    acceptedFiles: File[],
    rejectReasons: FileRejectReason[],
) => {
    filesToUpload.value = acceptedFiles;
    console.log(typeof rejectReasons);

    emit("uploadedFilesChange", filesToUpload); // cloudinary upload
};

const { getRootProps, getInputProps, isDragActive } = useDropzone({ onDrop });
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
