<script setup lang="ts">
import { Badge } from "@/Components/ui/badge";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import AppLayout from "@/Layouts/AppLayout.vue";
import FileUpload from "@/Components/ui/custom/FileUpload.vue";
import { ScrollArea } from "@/Components/ui/scroll-area";
import { Head, useForm, router } from "@inertiajs/vue3";
import { VideoOffIcon } from "lucide-vue-next";

const form = useForm({
    files: null,
});

const previewVideo = () => {
    let video = document.getElementById("video-preview") as HTMLVideoElement;
    let reader = new FileReader();

    if (form.files && video) {
        reader.readAsDataURL(form.files[0]);
        reader.addEventListener("load", function () {
            video.src = reader.result as string;
        });
    }
};

const handleVideoUpload = (files: any) => {
    form.files = files;
    previewVideo();
};

function submit() {
    form.post("/test-upload");
}

let removeRemoveEventListener = router.on("before", (event) => {
    if (form.isDirty) {
        const confirmation = confirm("Submission belum dikirim, pergi aja ?");
        if (confirmation) {
            removeRemoveEventListener();
        }
        return confirmation;
    }
});
</script>

<template>
    <Head title="Upload test page" />

    <div class="grid w-full">
        <div class="flex flex-col">
            <main class="grid flex-1 gap-4 overflow-auto p-4 lg:grid-cols-3">
                <!-- form -->
                <ScrollArea
                    class="rounded-md border ring-2 max-lg:order-1 lg:h-[78vh]"
                >
                    <div class="relative flex-col items-start gap-8 md:flex">
                        <form
                            class="grid w-full items-start gap-6 overflow-auto p-2 lg:p-4"
                        >
                            <fieldset class="grid gap-6 rounded-lg border p-4">
                                <legend class="-ml-1 px-1 text-sm font-medium">
                                    Submission info
                                </legend>
                                <div class="grid gap-3">
                                    <Label>Upload File</Label>
                                    <FileUpload
                                        @uploaded-files-change="
                                            handleVideoUpload
                                        "
                                    />
                                </div>
                                <div class="grid gap-3">
                                    <Label for="judul">Judul</Label>
                                    <Input
                                        id="judul"
                                        placeholder="ex: GDSCHOOLICIOUS_NAMA SEKOLAH_KOTA ASAL"
                                    />
                                </div>
                                <div class="grid gap-3">
                                    <Label for="instagram_reels"
                                        >link URL Instagram Reels :</Label
                                    >
                                    <Input
                                        id="instagram_reels"
                                        placeholder="ex: https://www.instagram.com/reel/C68td6fyyzsM/?hl=en"
                                    />
                                </div>
                            </fieldset>
                            <fieldset class="grid gap-6 rounded-lg border p-4">
                                <legend class="-ml-1 px-1 text-sm font-medium">
                                    Additional info
                                </legend>
                                <div class="grid gap-3">
                                    <Label for="role"
                                        >Upload Thumbnail video</Label
                                    >
                                    <FileUpload />
                                </div>
                                <div class="grid gap-3">
                                    <Label for="description">Description</Label>
                                    <Textarea
                                        id="description"
                                        placeholder="ex: Temukan Harmoni indah dalam lagu 'Rasa di Ujung Senda' dengan lirik penuh makna dan melodi yang menenagkan"
                                        class="min-h-[9.5rem]"
                                    />
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </ScrollArea>

                <!-- editor / preview  -->
                <div
                    class="relative flex w-full max-w-[100vw] flex-col items-center justify-center rounded-md bg-muted/50 p-2 ring-2 ring-primary lg:col-span-2 lg:p-4"
                >
                    <Badge
                        variant="outline"
                        class="absolute right-8 top-10 bg-muted opacity-50"
                        v-show="form.files"
                    >
                        Video Preview
                    </Badge>
                    <video
                        draggable="false"
                        id="video-preview"
                        class="aspect-video w-full rounded-lg"
                        controls
                        v-show="form.files"
                    />
                    <div
                        v-if="!form.files"
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
</template>
