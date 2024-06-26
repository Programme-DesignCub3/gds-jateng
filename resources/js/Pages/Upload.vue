<script setup lang="ts">
import { Badge } from "@/Components/ui/badge";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import AppLayout from "@/Layouts/AppLayout.vue";
import { ScrollArea } from "@/Components/ui/scroll-area";
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import { VideoOffIcon } from "lucide-vue-next";
import { ref } from "vue";

// Import filepond
import vueFilePond, { setOptions } from "vue-filepond";

// Import filepond plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";

// Import filepond styles
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

import type { FilePond, FilePondErrorDescription, FilePondFile } from "filepond";

const showVideoPreview = ref(false);

const page = usePage();
const form = useForm<{
  videoId: string | null;
  thumbnail: string | null;
  judulVideo: string;
  linkIg: string;
  videoDescription: string;
}>({
  videoId: null,
  thumbnail: null,
  judulVideo: "",
  linkIg: "",
  videoDescription: "",
});

const filepondVideoInput = ref<FilePond | null>(null); // Reference the input to clear the files later
const filepondThumbnailInput = ref<FilePond | null>(null); // Reference the input to clear the files later
const videoPlayer = ref<HTMLVideoElement | null>(null);

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

// watch(
//     () => form.videoId,
//     (newValue) => {
//         previewVideo(newValue);
//     },
// );

const submit = async () => {
  //   console.log(videoProcessed);
  //   console.log(thumbnailProcessed);
  //   if (videoProcessed?.serverId && thumbnailProcessed?.serverId) {
  //   }
};

async function processFiles() {
  const videoProcessed = await filepondVideoInput.value?.processFile();
  const thumbnailProcessed = await filepondThumbnailInput.value?.processFile();
  if (videoProcessed?.serverId) {
    form.videoId = videoProcessed?.serverId;
  }
  if (thumbnailProcessed?.serverId) {
    form.thumbnail = thumbnailProcessed?.serverId;
  }
  return videoProcessed?.serverId && thumbnailProcessed?.serverId;
}

async function startFormSubmission() {
  const filesProcessed = await processFiles();
  if (filesProcessed) {
    form.put(route("test-upload.uploadFilepond"), {
      onBefore: () => {
        // This onBefore is now synchronous
        return true;
      },
      onSuccess: () => {
        console.log("upload success");

        if (filepondVideoInput.value) {
          filepondVideoInput.value.removeFiles();
        }
        if (filepondThumbnailInput.value) {
          filepondThumbnailInput.value.removeFiles();
        }
      },
    });
  } else {
    // Handle the case where files are not processed correctly
    console.error("File processing failed");
  }
}

// Create FilePond component
const FilePondInput = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginFileValidateSize,
  FilePondPluginImagePreview
);

// Set global options on filepond init
const handleFilePondInit = () => {
  setOptions({
    credits: false,
    allowMultiple: false,
    instantUpload: false,
    allowProcess: false,
    server: {
      url: "/filepond",
      headers: {
        "X-CSRF-TOKEN": page.props.csrf_token as string,
      },
    },
  });
};

// Set the server id from response
const handleFilePondVideoProcess = (
  error: FilePondErrorDescription | null,
  file: FilePondFile
) => {
  form.videoId = file.serverId;
};

const handleFilePondVideoAddFile = (
  error: FilePondErrorDescription | null,
  file: FilePondFile
) => {
  previewVideo(file.file as File);
  showVideoPreview.value = true;
};

// Remove the server id on file remove
const handleFilePondVideoRemoveFile = (
  error: FilePondErrorDescription | null,
  file: FilePondFile
) => {
  form.videoId = null;
  previewVideo(null);
  showVideoPreview.value = false;
};

// Set the server id from response
const handleFilePondThumbnailProcess = (
  error: FilePondErrorDescription | null,
  file: FilePondFile
) => {
  console.log(file.serverId);

  form.thumbnail = file.serverId;
};
// Remove the server id on file remove
const handleFilePondThumbnailRemoveFile = (
  error: FilePondErrorDescription | null,
  file: FilePondFile
) => {
  form.thumbnail = null;
};

// const submit = () => {
//     form.post("/test-upload/basic", {
//         onError: (errors) => {
//             console.log("error nih bos : " + errors);
//         },
//     });
// };
</script>

<template>
  <AppLayout>
    <Head title="Upload test page" />

    <div class="grid w-full">
      <div class="flex flex-col">
        <main class="grid flex-1 gap-4 overflow-auto p-4 lg:grid-cols-3">
          <!-- form -->
          <ScrollArea class="rounded-md border ring-2 max-lg:order-1 lg:h-[78vh]">
            <div class="relative flex-col items-start gap-8 md:flex">
              <form
                @submit.prevent="startFormSubmission"
                class="grid w-full items-start gap-6 overflow-auto p-2 lg:p-4"
              >
                <fieldset class="grid gap-6 rounded-lg border p-4">
                  <legend class="-ml-1 px-1 text-sm font-medium">Submission info</legend>
                  <div class="grid gap-3">
                    <Label>Upload File</Label>
                    <FilePondInput
                      name="video"
                      credits="false"
                      max-file-size="250MB"
                      ref="filepondVideoInput"
                      :chunk-upload="true"
                      accepted-file-types="video/*"
                      @init="handleFilePondInit"
                      @processfile="handleFilePondVideoProcess"
                      @addfile="handleFilePondVideoAddFile"
                      @removefile="handleFilePondVideoRemoveFile"
                    />

                    <!-- <VideoUpload v-model="videoId" /> -->
                    <!-- upload progress -->
                    <div v-if="form.progress" class="space-y-2">
                      <div class="h-3 overflow-hidden rounded bg-gray-100 shadow-inner">
                        <div
                          class="h-full bg-blue-500 transition-all duration-200"
                          v-bind:style="{
                            width: form.progress.percentage + '%',
                          }"
                        ></div>
                      </div>

                      <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2"></div>
                        <div class="text-sm">{{ form.progress.percentage }}%</div>
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
                    <Label for="instagram_reels">link URL Instagram Reels :</Label>
                    <Input
                      v-model="form.linkIg"
                      id="instagram_reels"
                      placeholder="ex: https://www.instagram.com/reel/C68td6fyyzsM/?hl=en"
                    />
                  </div>
                </fieldset>
                <fieldset class="grid gap-6 rounded-lg border p-4">
                  <legend class="-ml-1 px-1 text-sm font-medium">Additional info</legend>
                  <div class="grid gap-3">
                    <Label for="role">Upload Thumbnail video</Label>
                    <!-- <FilepondInputUpload
                      max-file-size="5MB"
                      accepted-file-types="image/jpeg, image/png"
                      v-model="form.thumbnail"
                    /> -->

                    <FilePondInput
                      name="thumbnail"
                      credits="false"
                      max-file-size="2MB"
                      ref="filepondThumbnailInput"
                      accepted-file-types="image/jpeg, image/png"
                      @init="handleFilePondInit"
                      @processfile="handleFilePondThumbnailProcess"
                      @removefile="handleFilePondThumbnailRemoveFile"
                    />
                  </div>
                  <div class="grid gap-3">
                    <Label for="description">Description</Label>
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
              v-show="showVideoPreview"
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
              v-if="!showVideoPreview"
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
