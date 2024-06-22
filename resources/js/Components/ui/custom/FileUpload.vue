<template>
    <div>
        <div>
            <label
                v-bind="getRootProps()"
                class="relative flex w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 py-6 hover:bg-gray-100"
            >
                <div class="text-center">
                    <div class="mx-auto max-w-min rounded-md border p-2">
                        <UploadCloudIcon :size="20" />
                    </div>

                    <p class="mt-2 text-sm text-gray-600">
                        <span class="font-semibold">Drag files</span>
                    </p>
                    <p class="text-xs text-gray-500">
                        Click to upload files (files should be under 10 MB)
                    </p>
                </div>
            </label>

            <input
                v-bind="getInputProps()"
                id="dropzone-file"
                accept="image/png, image/jpeg, video/mp4"
                type="file"
                class="hidden"
            />
        </div>

        <div v-if="filesToUpload.length > 0">
            <ScrollArea class="h-40">
                <p class="my-2 mt-6 text-sm font-medium text-muted-foreground">
                    Files to upload
                </p>
                <div class="space-y-2 pr-3">
                    <div
                        v-for="fileUploadProgress in filesToUpload"
                        :key="fileUploadProgress.File.lastModified"
                        class="group flex justify-between gap-2 overflow-hidden rounded-lg border border-slate-100 pr-2 hover:pr-0"
                    >
                        <div class="flex flex-1 items-center p-2">
                            <div class="text-white">
                                <component
                                    :is="
                                        getFileIconAndColor(
                                            fileUploadProgress.File,
                                        ).icon
                                    "
                                    ::size="40"
                                    :class="
                                        getFileIconAndColor(
                                            fileUploadProgress.File,
                                        ).fillColor
                                    "
                                />
                            </div>

                            <div class="ml-2 w-full space-y-1">
                                <div class="flex justify-between text-sm">
                                    <p class="text-muted-foreground">
                                        {{
                                            fileUploadProgress.File.name.slice(
                                                0,
                                                25,
                                            )
                                        }}
                                    </p>
                                    <span class="text-xs"
                                        >{{
                                            fileUploadProgress.progress
                                        }}%</span
                                    >
                                </div>
                                <Progress
                                    :progress="fileUploadProgress.progress"
                                    :class="
                                        getFileIconAndColor(
                                            fileUploadProgress.File,
                                        ).color
                                    "
                                />
                            </div>
                        </div>
                        <button
                            @click="
                                () => {
                                    if (fileUploadProgress.source)
                                        fileUploadProgress.source.cancel(
                                            'Upload cancelled',
                                        );
                                    removeFile(fileUploadProgress.File);
                                }
                            "
                            class="hidden cursor-pointer items-center justify-center bg-red-500 px-2 text-white transition-all group-hover:flex"
                        >
                            <XCircleIcon :size="20" />
                        </button>
                    </div>
                </div>
            </ScrollArea>
        </div>

        <div>
            <div v-for="thumb in thumbnails" alt="">
                <p>{{ thumb.type }}</p>
                <img :src="thumb.url" alt="" />
            </div>
        </div>

        <!-- <div v-if="uploadedFiles.length > 0">
            <p class="my-2 mt-6 text-sm font-medium text-muted-foreground">Uploaded Files</p>
            <div class="space-y-2 pr-3">
                <div v-for="file in uploadedFiles" :key="file.lastModified"
                    class="group flex justify-between gap-2 overflow-hidden rounded-lg border border-slate-100 pr-2 transition-all hover:border-slate-300 hover:pr-0">
                    <div class="flex flex-1 items-center p-2">
                        <div class="text-white">
                            <component :is="getFileIconAndColor(file).icon" :size="40"
                                :class="getFileIconAndColor(file).fillColor" />
                        </div>
                        <div class="ml-2 w-full space-y-1">
                            <div class="flex justify-between text-sm">
                                <p class="text-muted-foreground">
                                    {{ file.name.slice(0, 25) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <button @click="removeFile(file)"
                        class="hidden items-center justify-center bg-red-500 px-2 text-white transition-all group-hover:flex">
                        <XCircleIcon :size="20" />
                    </button>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script setup lang="ts">
import { ref, watch } from "vue";
import axios, { type AxiosProgressEvent, type CancelTokenSource } from "axios";
import {
    AudioWaveformIcon,
    FileIcon,
    FileImageIcon,
    FolderArchiveIcon,
    UploadCloudIcon,
    VideoIcon,
    XCircleIcon,
} from "lucide-vue-next";
import { useDropzone } from "vue3-dropzone";
import { Progress } from "@/Components/ui/progress";
import { ScrollArea } from "@/Components/ui/scroll-area";

interface FileUploadProgress {
    progress: number;
    File: File;
    source: CancelTokenSource | null;
}

enum FileTypes {
    Image = "image",
    Pdf = "pdf",
    Audio = "audio",
    Video = "video",
    Other = "other",
}

const thumbnails = ref<{ type: FileReader; url: string }[]>([]);

const ImageColor = {
    bgColor: "bg-purple-600",
    fillColor: "fill-purple-600",
};

const PdfColor = {
    bgColor: "bg-blue-400",
    fillColor: "fill-blue-400",
};

const AudioColor = {
    bgColor: "bg-yellow-400",
    fillColor: "fill-yellow-400",
};

const VideoColor = {
    bgColor: "bg-green-400",
    fillColor: "fill-green-400",
};

const OtherColor = {
    bgColor: "bg-gray-400",
    fillColor: "fill-gray-400",
};

const uploadedFiles = ref<File[]>([]);
const filesToUpload = ref<FileUploadProgress[]>([]);

const emit = defineEmits(["uploadedFilesChange"]);
const reader = new FileReader();

reader.onload = (event) => {
    if (event.target?.DONE) {
        thumbnails.value = [
            ...thumbnails.value,
            { type: event.target, url: event.target.result as string },
        ];
    }
};

watch(uploadedFiles, async () => {
    uploadedFiles.value.map((file) => {
        reader.readAsDataURL(file);
    });
});

const getFileIconAndColor = (file: File) => {
    if (file.type.includes(FileTypes.Image)) {
        return {
            icon: FileImageIcon,
            color: ImageColor.bgColor,
            fillColor: ImageColor.fillColor,
        };
    }

    if (file.type.includes(FileTypes.Pdf)) {
        return {
            icon: FileIcon,
            color: PdfColor.bgColor,
            fillColor: PdfColor.fillColor,
        };
    }

    if (file.type.includes(FileTypes.Audio)) {
        return {
            icon: AudioWaveformIcon,
            color: AudioColor.bgColor,
            fillColor: AudioColor.fillColor,
        };
    }

    if (file.type.includes(FileTypes.Video)) {
        return {
            icon: VideoIcon,
            color: VideoColor.bgColor,
            fillColor: VideoColor.fillColor,
        };
    }

    return {
        icon: FolderArchiveIcon,
        color: OtherColor.bgColor,
        fillColor: OtherColor.fillColor,
    };
};

const onUploadProgress = (
    progressEvent: AxiosProgressEvent,
    file: File,
    cancelSource: CancelTokenSource,
) => {
    const progress = Math.round(
        (progressEvent.loaded / (progressEvent.total ?? 0)) * 100,
    );

    if (progress === 100) {
        uploadedFiles.value = [...uploadedFiles.value, file];

        filesToUpload.value = filesToUpload.value.filter(
            (item) => item.File !== file,
        );

        return;
    }

    filesToUpload.value = filesToUpload.value.map((item) => {
        if (item.File.name === file.name) {
            return {
                ...item,
                progress,
                source: cancelSource,
            };
        } else {
            return item;
        }
    });
};

const uploadImageToCloudinary = async (
    formData: FormData,
    onUploadProgress: (progressEvent: AxiosProgressEvent) => void,
    cancelSource: CancelTokenSource,
) => {
    return axios.post(
        "https://api.cloudinary.com/v1_1/${process.env.NEXT_PUBLIC_CLOUD_NAME}/image/upload",
        formData,
        {
            onUploadProgress,
            cancelToken: cancelSource.token,
        },
    );
};

const removeFile = (file: File) => {
    filesToUpload.value = filesToUpload.value.filter(
        (item) => item.File !== file,
    );

    uploadedFiles.value = uploadedFiles.value.filter((item) => item !== file);
};

const onDrop = async (acceptedFiles: File[]) => {
    filesToUpload.value = [
        ...filesToUpload.value,
        ...acceptedFiles.map((file) => {
            return {
                progress: 0,
                File: file,
                source: null,
            };
        }),
    ];

    uploadedFiles.value = [...uploadedFiles.value, ...acceptedFiles];

    emit("uploadedFilesChange", uploadedFiles); // cloudinary upload

    // const fileUploadBatch = acceptedFiles.map((file) => {
    //   const formData = new FormData();
    //   formData.append("file", file);
    //   formData.append(
    //     "upload_preset",
    //     process.env.NEXT_PUBLIC_UPLOAD_PRESET as string
    //   );

    //   const cancelSource = axios.CancelToken.source();
    //   return uploadImageToCloudinary(
    //     formData,
    //     (progressEvent) => onUploadProgress(progressEvent, file, cancelSource),
    //     cancelSource
    //   );
    // });

    // try {
    //   await Promise.all(fileUploadBatch);
    //   alert("All files uploaded successfully");
    // } catch (error) {
    //   console.error("Error uploading files: ", error);
    // }
};

const { getRootProps, getInputProps } = useDropzone({ onDrop });
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
