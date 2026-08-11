<script setup lang="ts">
import { Badge } from "@/Components/ui/badge";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import AppLayout from "@/Layouts/AppLayout.vue";
import FileUpload from "@/Components/ui/custom/FileUpload.vue";
import { ScrollArea } from "@/Components/ui/scroll-area";
import { Head, useForm } from "@inertiajs/vue3";
import { VideoOffIcon } from "lucide-vue-next";
import VideoUpload from "@/Components/ui/custom/VideoUpload.vue";
import { ref } from "vue";

const form = useForm({});
const videoFile = ref<File | null>(null);
const videoPlayer = ref<HTMLVideoElement | null>(null);

const previewVideo = () => {
  let reader = new FileReader();

  if (videoFile.value && videoPlayer) {
    reader.readAsArrayBuffer(videoFile.value);

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
  }
};

const handleVideoInput = (file: File) => {
  videoFile.value = file;
  previewVideo();
};

function submit() {
  form.post("/test-upload/basic");
}

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

    <main class="flex flex-1 gap-4 overflow-auto p-4 lg:h-[87vh]">
      <!-- form -->
      <ScrollArea
        class="rounded-md border ring-2 transition-all duration-700 max-lg:order-1"
        :class="{
          'basis-[35%]': videoFile,
          'basis-full': !videoFile,
        }"
      >
        <div class="relative flex-col items-start gap-8 md:flex">
          <form
            @submit.prevent="submit"
            class="grid w-full items-start gap-6 overflow-auto p-2 lg:p-4"
          >
            <fieldset class="grid gap-6 rounded-lg border p-4">
              <legend class="-ml-1 px-1 text-sm font-medium">Submission info</legend>
              <div class="grid gap-3">
                <Label>Upload File</Label>
                <!-- <VideoUpload @uploaded-files-change="handleVideoInput" /> -->
              </div>
              <div class="grid gap-3">
                <Label for="judul">Judul</Label>
                <Input
                  id="judul"
                  placeholder="ex: GDSCHOOLICIOUS_NAMA SEKOLAH_KOTA ASAL"
                />
              </div>
              <div class="grid gap-3">
                <Label for="instagram_reels">link URL Instagram Reels :</Label>
                <Input
                  id="instagram_reels"
                  placeholder="ex: https://www.instagram.com/reel/C68td6fyyzsM/?hl=en"
                />
              </div>
            </fieldset>
            <fieldset class="grid gap-6 rounded-lg border p-4">
              <legend class="-ml-1 px-1 text-sm font-medium">Additional info</legend>
              <div class="grid gap-3">
                <Label for="role">Upload Thumbnail video</Label>
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

            <button type="submit">Submit</button>
          </form>
        </div>
      </ScrollArea>

      <!-- editor / preview  -->
      <div
        class="relative flex max-w-[100vw] flex-col items-center justify-center rounded-md bg-muted/50 p-2 ring-2 ring-primary transition-all duration-700 lg:col-span-2 lg:p-4"
        :class="{ 'w-full': videoFile, 'hidden w-0': !videoFile }"
      >
        <Badge
          variant="outline"
          class="absolute right-8 top-10 bg-muted opacity-50"
          v-show="videoFile"
        >
          Video Preview
        </Badge>
        <video
          draggable="false"
          ref="videoPlayer"
          id="video-preview"
          class="aspect-video h-full rounded-lg"
          controls
          v-show="videoFile"
        />
        <div
          v-if="!videoFile"
          class="grid aspect-video w-full items-center justify-center"
        >
          <div class="text-center text-muted-foreground">
            <VideoOffIcon class="size-full" />
            <p>No video</p>
          </div>
        </div>
      </div>
    </main>
  </AppLayout>
</template>
