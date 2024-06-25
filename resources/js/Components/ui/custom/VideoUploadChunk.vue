<template>
    <div>
        <form @submit.prevent="submit">
            <label
                v-bind="getRootProps()"
                class="relative flex w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 py-6 hover:bg-gray-100"
            >
                <div class="text-center">
                    <div class="mx-auto max-w-min rounded-md border p-2">
                        <UploadCloudIcon :size="20" />
                    </div>
                    <!-- TODO: selesain woi jangan ngegame mulu -->
                    <p class="mt-2 text-sm text-gray-600">
                        Masih WIP, ALIAS BELUM WORK 100%
                    </p>
                    <p v-if="isDragActive">Drop the files here ...</p>
                    <p v-else class="mt-2 text-sm text-gray-600">
                        <span class="font-semibold">Drag files</span>
                    </p>
                    <p class="text-xs text-gray-500">
                        Click to upload files (files should be under 250MB)
                    </p>
                </div>
            </label>
            <div v-if="fileRejectReason" class="text-sm">
                <ul v-for="rejectReason in fileRejectReason">
                    <!-- {{
                        rejectReason
                    }} -->
                    <li v-for="error in rejectReason.errors">
                        <p>{{ error }}</p>
                    </li>
                </ul>
            </div>

            <Button class="ml-auto">Upload</Button>

            <!-- file detail -->
            <div v-if="state.uploading" class="space-y-2">
                <div
                    class="h-3 overflow-hidden rounded bg-gray-100 shadow-inner"
                >
                    <div
                        class="h-full bg-blue-500 transition-all duration-200"
                        v-bind:style="{
                            width: state.progress + '%',
                        }"
                    ></div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <button
                            class="text-sm text-indigo-500"
                            v-if="!state.uploader?.paused"
                            v-on:click="state.uploader?.pause()"
                        >
                            Pause
                        </button>
                        <button
                            class="text-sm text-indigo-500"
                            v-if="state.uploader?.paused"
                            v-on:click="state.uploader?.resume()"
                        >
                            Resume
                        </button>

                        <button
                            class="text-sm text-indigo-500"
                            v-on:click="cancel"
                        >
                            Cancel
                        </button>
                    </div>
                    <div class="text-sm">{{ state.formattedProgress }}%</div>
                </div>

                <div v-if="state.error" class="text-sm">
                    {{ state.error }}
                </div>
            </div>
        </form>

        <input
            v-bind="getInputProps()"
            id="dropzone-file"
            accept="video/*"
            type="file"
            class="hidden"
        />
    </div>
</template>

<script setup lang="ts">
import { UploadCloudIcon } from "lucide-vue-next";
import { reactive, ref, computed } from "vue";
import { useDropzone, type FileRejectReason } from "vue3-dropzone";
import { router, usePage } from "@inertiajs/vue3";
import { UpChunk, createUpload } from "@mux/upchunk";
import Button from "../button/Button.vue";

const props = withDefaults(defineProps<{ file?: File | null }>(), {
    file: null,
});

const page = usePage();

const fileRejectReason = ref<FileRejectReason[] | null>(null);

const initialState = {
    file: props.file,
    uploader: null,
    progress: 0,
    uploading: false,
    error: null,
};

const state: {
    file: null | File;
    uploader: null | UpChunk;
    progress: number;
    uploading: boolean;
    error: null | {
        detail: {
            message: string;
            chunkNumber: number;
            attempts: number;
        };
    };
    formattedProgress: number;
    reset: null | (() => void);
} = reactive({
    ...initialState,
    formattedProgress: computed(() => Math.round(state.progress)),
    reset: () => {
        Object.assign(state, initialState);
    },
});

const cancel = () => {
    state.uploader?.abort();
    if (state.reset) {
        state.reset();
    }
};

const submit = () => {
    if (state.file) {
        state.file = state.file;
    }

    if (!state.file) {
        return;
    }

    state.uploader = createUpload({
        endpoint: route("test-upload.advance"),
        headers: {
            "X-CSRF-TOKEN": page.props.csrf_token as string,
        },
        method: "POST",
        file: state.file,
        chunkSize: 10 * 1024, // 10mb
    });

    state.uploader.on("attempt", () => {
        state.error = null;
        state.uploading = true;
    });

    state.uploader.on("progress", (p) => {
        state.progress = p.detail;
    });

    state.uploader.on("success", () => {
        if (state.reset) {
            state.reset();

            router.reload({
                only: ["files"],
            });
        }
    });

    state.uploader.on("error", (error) => {
        state.error = error.detail.message;
    });
};

// const emit = defineEmits(["uploadedFilesChange"]);
const emit = defineEmits<{
    uploadedFilesChange: [file: File];
}>();

const onDrop = async (
    acceptedFiles: File[],
    rejectReasons: FileRejectReason[],
) => {
    state.file = acceptedFiles[0];

    if (rejectReasons.length) {
        fileRejectReason.value = rejectReasons;
        return;
    }

    fileRejectReason.value = null;

    if (state.file) {
        emit("uploadedFilesChange", state.file); // cloudinary upload
    }
};

const { getRootProps, getInputProps, isDragActive } = useDropzone({
    onDrop,
    maxFiles: 1,
    multiple: false,
    accept: "video/mp4",
    maxSize: 250 * 1024 * 1024,
});
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
