<script setup lang="ts">
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

import { Badge } from "@/Components/ui/badge";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import AppLayout from "@/Layouts/AppLayout.vue";
import { ScrollArea } from "@/Components/ui/scroll-area";
import { Head, useForm } from "@inertiajs/vue3";
import { VideoOffIcon } from "lucide-vue-next";
import { watch, ref } from "vue";
import FilepondUpload from "@/Components/ui/custom/FilepondUpload.vue";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";

import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
    AlertDialogTrigger,
} from "@/Components/ui/alert-dialog";

const form = useForm<{
    file: null | File;
    thumbnail: null | File;
    judulVideo: string;
    competition: string;
    linkIg: "";
    videoDescription: "";
}>({
    file: null,
    thumbnail: null,
    judulVideo: "",
    linkIg: "",
    competition: "",
    videoDescription: "",
});
const videoPlayer = ref<HTMLVideoElement | null>(null);

const initialState = {
    file: null,
    uploader: null,
    progress: 0,
    uploading: false,
    error: null,
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

watch(
    () => form.file,
    (newValue) => {
        previewVideo(newValue);
    },
);

const submit = () => {
    form.post("/test-upload/basic", {
        onError: (errors) => {
            console.log("error nih bos : " + errors);
        },
    });
};
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
                                            max-file-size="250MB"
                                            accepted-file-types="video/mp4"
                                            v-model="form.file"
                                        />

                                        <!-- <VideoUpload v-model="videoFile" /> -->
                                        <!-- upload progress -->
                                        <div
                                            v-if="form.progress"
                                            class="space-y-2"
                                        >
                                            <div
                                                class="h-3 overflow-hidden rounded bg-gray-100 shadow-inner"
                                            >
                                                <div
                                                    class="h-full bg-blue-500 transition-all duration-200"
                                                    v-bind:style="{
                                                        width:
                                                            form.progress
                                                                .percentage +
                                                            '%',
                                                    }"
                                                ></div>
                                            </div>

                                            <div
                                                class="flex items-center justify-between"
                                            >
                                                <div
                                                    class="flex items-center space-x-2"
                                                ></div>
                                                <div class="text-sm">
                                                    {{
                                                        form.progress
                                                            .percentage
                                                    }}%
                                                </div>
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
                                    <div>
                                        <InputLabel
                                            for="competition"
                                            value="Kompetisi yang Diikuti"
                                        />
                                        <Select v-model="form.competition">
                                            <SelectTrigger>
                                                <SelectValue
                                                    placeholder="Pilih kompetisi"
                                                />
                                            </SelectTrigger>
                                            <SelectContent>
                                                <SelectItem value="mascot"
                                                    >Mascot Design</SelectItem
                                                >
                                                <SelectItem value="cheerleading"
                                                    >Cheerleading
                                                    Competition</SelectItem
                                                >
                                                <SelectItem value="chant"
                                                    >Chant
                                                    Competition</SelectItem
                                                >
                                                <SelectItem value="kolaborasa"
                                                    >Kolaborasa</SelectItem
                                                >
                                            </SelectContent>
                                        </Select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.competition"
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
                                        <FilepondUpload
                                            max-file-size="5MB"
                                            accepted-file-types="image/jpeg, image/png"
                                            v-model="form.thumbnail"
                                        />
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
                            v-show="form.file"
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
                            v-if="!form.file"
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

        <AlertDialog>
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle
                        >Are you absolutely sure?</AlertDialogTitle
                    >
                    <AlertDialogDescription>
                        This action cannot be undone. This will permanently send
                        the submission
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel>Cancel</AlertDialogCancel>
                    <AlertDialogAction>Continue</AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    </AppLayout>
</template>
