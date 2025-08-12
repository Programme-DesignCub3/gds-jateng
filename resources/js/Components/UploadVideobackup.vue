<script setup lang="ts">
// Import Vue FilePond
import vueFilePond, { setOptions } from "vue-filepond";

// Import FilePond plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
import type { FilePondErrorDescription } from "filepond";
import type { FilePondFile } from "filepond";

import { Badge } from "@/Components/ui/badge";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import { useForm, usePage } from "@inertiajs/vue3";
import { watch, ref, computed } from "vue";
// import FilepondUpload from "@/Components/ui/custom/FilepondUpload.vue";

import InputError from "@/Components/InputError.vue";

import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
} from "@/Components/ui/alert-dialog";
import SubmissionHeader from "@/Components/SubmissionHeaderBackup.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { getCompetitionLabel } from "@/lib/utils";

const page = usePage();
const user = computed(() => page.props.auth.user);

const form = useForm<{
  file: null | File;
  thumbnail: null | File;
  judulSubmission: string;
  competition: string;
  linkIg: "";
  submissionDescription: "";
}>({
  file: null,
  thumbnail: null,
  judulSubmission: "",
  linkIg: "",
  competition: user.value.competition,
  submissionDescription: "",
});

const videoPlayer = ref<HTMLVideoElement | null>(null);

// Create component
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview,
  FilePondPluginFileValidateSize
);

// Handle video file add event
const handleFilePondVideoFileAdd = (
  error: FilePondErrorDescription | null,
  file: FilePondFile
) => {
  if (error) {
    console.error("Oh no, something went wrong!", error);
    return;
  }
  form.file = file.file as File;
};

// Remove the video from form on file remove
const handleFilePondVideoRemoveFile = (
  error: FilePondErrorDescription | null,
  file: FilePondFile
) => {
  form.file = null;
};

// Handle thumbnail file add event
const handleFilePondThumbnailFileAdd = (
  error: FilePondErrorDescription | null,
  file: FilePondFile
) => {
  if (error) {
    console.error("Oh no, something went wrong!", error);
    return;
  }
  form.thumbnail = file.file as File;
};

// Remove the thumbnail from form on file remove
const handleFilePondThumbnailRemoveFile = (
  error: FilePondErrorDescription | null,
  file: FilePondFile
) => {
  form.thumbnail = null;
};

// Handle FilePond init event
const handleFilePondInit = () => {
  setOptions({
    credits: false,
    allowMultiple: false,
    instantUpload: false,
    allowProcess: false,
  });
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
  }
);

const submit = () => {
  form.post("/submission", {
    onError: (errors) => {
      console.log("error nih bos : " + errors);
    },
  });
};
</script>

<template>
  <div class="container mb-10 max-w-xl">
    <form
      @submit.prevent="submit"
      class="grid w-full items-start gap-6 overflow-auto p-2 lg:p-4"
    >
      <div class="gap-3">
        <Label for="competition">Competition : </Label>
        <Badge>{{ getCompetitionLabel(form.competition) }}</Badge>

        <!-- <Input id="competition" required :v-model="form.competition" /> -->
        <InputError class="mt-2" :message="form.errors.competition" />
      </div>

      <div class="">
        <Label>Upload File</Label>
        <FilePond
          name="test"
          ref="pond"
          label-idle="Drop files here..."
          :instant-upload="false"
          :allow-multiple="false"
          credits="false"
          :accepted-file-types="['video/mp4', 'video/x-matroska', 'video/quicktime']"
          max-file-size="250MB"
          :disabled="form.processing"
          @addfile="handleFilePondVideoFileAdd"
          @init="handleFilePondInit"
          @removefile="handleFilePondVideoRemoveFile"
        />
        <InputError class="mt-2" :message="form.errors.file" />

        <!-- editor / preview  -->
        <div v-show="form.file">
          <div
            class="relative flex w-full max-w-[100vw] flex-col items-center justify-center rounded-md bg-muted/50 p-2 ring-2 ring-primary lg:col-span-2 lg:p-4"
          >
            <div class="relative aspect-video w-full rounded-lg">
              <Badge
                variant="outline"
                class="absolute right-1 top-2 z-1 bg-muted text-xs opacity-50 md:right-4 md:top-4"
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
          </div>
        </div>
      </div>

      <div class="gap-3">
        <div>
          <Label for="instagram_reels">link URL Instagram Reels :</Label>
          <p class="mt-1 text-xs text-muted-foreground dark:text-red-400">
            Video We Are Ready for Schoolicious
          </p>
        </div>
        <Input
          v-model="form.linkIg"
          required
          id="instagram_reels"
          placeholder="ex: https://www.instagram.com/reel/C68td6fyyzsM/?hl=en"
          :disabled="form.processing"
        />
        <InputError class="mt-2" :message="form.errors.linkIg" />
      </div>

      <div class="gap-3">
        <Label for="judul">Judul</Label>
        <Input
          id="judul"
          required
          v-model="form.judulSubmission"
          placeholder="ex: GDSCHOOLICIOUS_NAMA SEKOLAH_KOTA ASAL"
          :disabled="form.processing"
        />
        <InputError class="mt-2" :message="form.errors.judulSubmission" />
      </div>

      <div class="gap-3">
        <Label for="role">Upload Thumbnail video</Label>
        <FilePond
          name="test"
          max-file-size="3MB"
          accepted-file-types="image/jpeg, image/png, image/jpg"
          label-idle="Drop files here..."
          :instant-upload="false"
          :allow-multiple="false"
          credits="false"
          required
          :disabled="form.processing"
          @addfile="handleFilePondThumbnailFileAdd"
          @init="handleFilePondInit"
          @removefile="handleFilePondThumbnailRemoveFile"
        />
        <InputError class="mt-2" :message="form.errors.thumbnail" />
      </div>
      <div class="grid gap-3">
        <Label for="description">Description</Label>
        <Textarea
          id="description"
          required
          v-model="form.submissionDescription"
          placeholder="ex: Temukan Harmoni indah dalam lagu 'Rasa di Ujung Senda' dengan lirik penuh makna dan melodi yang menenagkan"
          class="min-h-[9.5rem]"
          :disabled="form.processing"
        />
        <InputError class="mt-2" :message="form.errors.submissionDescription" />
      </div>

      <!-- upload progress -->
      <div v-if="form.progress" class="space-y-2">
        <div class="h-3 overflow-hidden rounded bg-gray-100 shadow-inner">
          <div
            class="h-full bg-primary transition-all duration-200"
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
      <PrimaryButton
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        class="ml-auto w-fit"
        type="submit"
        >Submit</PrimaryButton
      >
    </form>
  </div>

  <AlertDialog>
    <AlertDialogContent>
      <AlertDialogHeader>
        <AlertDialogTitle>Are you absolutely sure?</AlertDialogTitle>
        <AlertDialogDescription>
          This action cannot be undone. This will permanently send the submission
        </AlertDialogDescription>
      </AlertDialogHeader>
      <AlertDialogFooter>
        <AlertDialogCancel>Cancel</AlertDialogCancel>
        <AlertDialogAction>Continue</AlertDialogAction>
      </AlertDialogFooter>
    </AlertDialogContent>
  </AlertDialog>
</template>
