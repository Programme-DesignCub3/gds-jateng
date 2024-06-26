<script setup lang="ts">
import { Badge } from "@/Components/ui/badge";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import AppLayout from "@/Layouts/AppLayout.vue";
import FileUpload from "@/Components/ui/custom/FileUpload.vue";
import { ScrollArea } from "@/Components/ui/scroll-area";
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import { VideoOffIcon } from "lucide-vue-next";
import { watch, computed, reactive, ref } from "vue";
import VideoUpload from "@/Components/ui/custom/VideoUpload.vue";
import { createUpload, type UpChunk } from "@mux/upchunk";
import FilepondUpload from "@/Components/ui/custom/FilepondUpload.vue";

const page = usePage();
const form = useForm({
    judulVideo: "",
    linkIg: "",
    videoDescription: "",
});
const videoFile = ref<File | null>(null);
const videoPlayer = ref<HTMLVideoElement | null>(null);

const initialState = {
    file: null,
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

const previewVideo = (file: File | null) => {
    let reader = new FileReader();

    if (file && videoPlayer) {
        reader.readAsArrayBuffer(file);

        reader.onload = function (e) {
            // The file reader gives us an ArrayBuffer:
            let buffer = e.target?.result;

            if (buffer && buffer instanceof ArrayBuffer) {
                // We have to convert the buffer to a blob:
                let videoBlob = new Blob([new Uint8Array(buffer)], {
                    type: "video/mp4",
                });

                // The blob gives us a URL to the video file:
                let url = window.URL.createObjectURL(videoBlob);

                if (videoPlayer.value) {
                    videoPlayer.value.src = url;
                } else {
                    console.error("videoPlayer is null when trying to set src");
                }
            } else {
                console.error("Unexpected buffer type:", buffer);
            }
        };
        return;
    }

    if (videoPlayer) {
        if (videoPlayer.value) {
            videoPlayer.value.src = "";
        } else {
            console.error("videoPlayer is null when trying to set src");
        }
    }
};

watch(videoFile, (newValue) => {
    // console.log(newValue);

    state.file = newValue;
    previewVideo(newValue);
});

const submit = () => {
    if (state.file) {
        state.file = state.file;
    }

    if (!state.file) {
        return;
    }

    // ! not ideal but work
    state.uploader = createUpload({
        endpoint: route("test-upload.advance"),
        headers: {
            "X-CSRF-TOKEN": page.props.csrf_token as string,
            "video-title": form.judulVideo,
            "video-desc": form.videoDescription,
            "link-ig": form.linkIg,
        },

        method: "POST",
        file: state.file,
        chunkSize: 15 * 1024,
    });

    state.uploader.on("attempt", () => {
        state.error = null;
        state.uploading = true;
    });

    state.uploader.on("progress", (p) => {
        state.progress = p.detail;
    });

    state.uploader.on("success", (e) => {
        console.log("success event: ", e);

        if (state.reset) {
            // state.reset();
            // router.reload({
            //     only: ["files"],
            // });
        }
        form.post("/test-upload/basic");
    });

    state.uploader.on("error", (error) => {
        state.error = error.detail.message;
    });
};

// let removeRemoveEventListener = router.on("before", (event) => {
//     if (form.isDirty) {
//         const confirmation = confirm("Submission belum dikirim, pergi aja ?");
//         if (confirmation) {
//             removeRemoveEventListener();
//         }
//         return confirmation;
//     }
// });
</script>

<template>
    <AppLayout>
        <Head title="Upload test page" />

        <div class="grid w-full">
            <div class="flex flex-col">
                <main
                    class="grid flex-1 gap-4 overflow-auto p-4 lg:grid-cols-3"
                >
                    <!-- form -->
                    <ScrollArea
                        class="rounded-md border ring-2 max-lg:order-1 lg:h-[78vh]"
                    >
                        <div
                            class="relative flex-col items-start gap-8 md:flex"
                        >
                            <form
                                @submit.prevent="submit"
                                class="grid w-full items-start gap-6 overflow-auto p-2 lg:p-4"
                            >
                                <fieldset
                                    class="grid gap-6 rounded-lg border p-4"
                                >
                                    <legend
                                        class="-ml-1 px-1 text-sm font-medium"
                                    >
                                        Submission info
                                    </legend>
                                    <div class="grid gap-3">
                                        <Label>Upload File</Label>
                                        <FilepondUpload
                                            accepted-file-types="video/mp4"
                                            v-model="videoFile"
                                        />
                                        <!-- <VideoUpload v-model="videoFile" /> -->
                                        <!-- upload progress -->
                                        <div
                                            v-if="state.uploading"
                                            class="space-y-2"
                                        >
                                            <div
                                                class="h-3 overflow-hidden rounded bg-gray-100 shadow-inner"
                                            >
                                                <div
                                                    class="h-full bg-blue-500 transition-all duration-200"
                                                    v-bind:style="{
                                                        width:
                                                            state.progress +
                                                            '%',
                                                    }"
                                                ></div>
                                            </div>

                                            <div
                                                class="flex items-center justify-between"
                                            >
                                                <div
                                                    class="flex items-center space-x-2"
                                                >
                                                    <button
                                                        class="text-sm text-indigo-500"
                                                        v-if="
                                                            !state.uploader
                                                                ?.paused
                                                        "
                                                        v-on:click="
                                                            state.uploader?.pause()
                                                        "
                                                    >
                                                        Pause
                                                    </button>
                                                    <button
                                                        class="text-sm text-indigo-500"
                                                        v-if="
                                                            state.uploader
                                                                ?.paused
                                                        "
                                                        v-on:click="
                                                            state.uploader?.resume()
                                                        "
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
                                                <div class="text-sm">
                                                    {{
                                                        state.formattedProgress
                                                    }}%
                                                </div>
                                            </div>

                                            <div
                                                v-if="state.error"
                                                class="text-sm"
                                            >
                                                {{ state.error }}
                                            </div>
                                        </div>
                                        <!-- upload progress end -->
                                    </div>
                                    <div class="grid gap-3">
                                        <Label for="judul">Judul</Label>
                                        <Input
                                            id="judul"
                                            v-model="form.judulVideo"
                                            placeholder="ex: GDSCHOOLICIOUS_NAMA SEKOLAH_KOTA ASAL"
                                        />
                                    </div>
                                    <div class="grid gap-3">
                                        <Label for="instagram_reels"
                                            >link URL Instagram Reels :</Label
                                        >
                                        <Input
                                            v-model="form.linkIg"
                                            id="instagram_reels"
                                            placeholder="ex: https://www.instagram.com/reel/C68td6fyyzsM/?hl=en"
                                        />
                                    </div>
                                </fieldset>
                                <fieldset
                                    class="grid gap-6 rounded-lg border p-4"
                                >
                                    <legend
                                        class="-ml-1 px-1 text-sm font-medium"
                                    >
                                        Additional info
                                    </legend>
                                    <div class="grid gap-3">
                                        <Label for="role"
                                            >Upload Thumbnail video</Label
                                        >
                                    </div>
                                    <div class="grid gap-3">
                                        <Label for="description"
                                            >Description</Label
                                        >
                                        <Textarea
                                            id="description"
                                            v-model="form.videoDescription"
                                            placeholder="ex: Temukan Harmoni indah dalam lagu 'Rasa di Ujung Senda' dengan lirik penuh makna dan melodi yang menenagkan"
                                            class="min-h-[9.5rem]"
                                        />
                                    </div>
                                </fieldset>

                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </ScrollArea>

                    <!-- editor / preview  -->
                    <div
                        class="relative flex w-full max-w-[100vw] flex-col items-center justify-center rounded-md bg-muted/50 p-2 ring-2 ring-primary lg:col-span-2 lg:p-4"
                    >
                        <div
                            v-show="state.file"
                            class="relative aspect-video w-full rounded-lg"
                        >
                            <Badge
                                variant="outline"
                                class="absolute right-4 top-4 z-1 bg-muted opacity-50"
                            >
                                Video Preview
                            </Badge>
                            <video
                                draggable="false"
                                ref="videoPlayer"
                                id="video-preview"
                                class="aspect-video w-full rounded-lg"
                                controls
                            />
                        </div>
                        <div
                            v-if="!state.file"
                            class="grid aspect-video w-full items-center justify-center"
                        >
                            <div class="text-center text-muted-foreground">
                                <VideoOffIcon class="size-full" />
                                <p>No video</p>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </AppLayout>
</template>
