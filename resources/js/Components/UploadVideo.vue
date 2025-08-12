<script setup lang="ts">
import { Badge } from "@/Components/ui/badge";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import { useForm, usePage } from "@inertiajs/vue3";
import { ref, computed, watch } from "vue";
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
  linkIg: string;
  submissionDescription: string;
}>({
  file: null,
  thumbnail: null,
  judulSubmission: "",
  linkIg: "",
  competition: user.value.competition,
  submissionDescription: "",
});

const videoPlayer = ref<HTMLVideoElement | null>(null);

const handleVideoChange = (event: Event) => {
  const target = event.target as HTMLInputElement;
  const file = target.files?.[0] || null;

  if (file) {
    if (!["video/mp4", "video/x-matroska", "video/quicktime"].includes(file.type)) {
      alert("Format file tidak didukung!");
      target.value = "";
      return;
    }
    if (file.size > 250 * 1024 * 1024) {
      alert("Ukuran file maksimal 250MB!");
      target.value = "";
      return;
    }
    form.file = file;
  } else {
    form.file = null;
  }
};

const handleThumbnailChange = (event: Event) => {
  const target = event.target as HTMLInputElement;
  const file = target.files?.[0] || null;

  if (file) {
    if (!["image/jpeg", "image/png", "image/jpg"].includes(file.type)) {
      alert("Format thumbnail tidak didukung!");
      target.value = "";
      return;
    }
    if (file.size > 3 * 1024 * 1024) {
      alert("Ukuran thumbnail maksimal 3MB!");
      target.value = "";
      return;
    }
    form.thumbnail = file;
  } else {
    form.thumbnail = null;
  }
};

const previewVideo = (file: File | null) => {
  if (file && videoPlayer.value) {
    const url = URL.createObjectURL(file);
    videoPlayer.value.src = url;
  } else if (videoPlayer.value) {
    videoPlayer.value.src = "";
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
      <!-- <div class="gap-3">
        <Label for="competition">Competition : </Label>
        <Badge>{{ getCompetitionLabel(form.competition) }}</Badge>

        <InputError class="mt-2" :message="form.errors.competition" />
      </div> -->

      <div class="">
        <div class="flex flex-col gap-2">
          <Label class="text-lg">Upload File</Label>

          <div class="relative inline-block w-2/6">
            <div
              class="absolute -right-1 -bottom-1 w-full h-full rounded-2xl z-0"
              :class="''"
              style="background-color: #F7C893;" 
              aria-hidden="true"
            ></div>

            <label
              class="relative z-10 block bg-primary text-white uppercase font-bold text-lg text-center px-6 py-3 rounded-2xl cursor-pointer select-none transition-transform duration-300 hover:translate-y-1 hover:translate-x-1"
            >
              Upload
              <input
                type="file"
                class="hidden"
                accept="video/mp4,video/x-matroska,video/quicktime"
                @change="handleVideoChange"
                :disabled="form.processing"
              />
            </label>
          </div>

          <p class="text-sm mt- font-bold" :class="form.file ? 'text-gray-700' : 'text-red-500'">
            {{ form.file ? form.file.name : 'No file attached.' }}
          </p>
        </div>
        <InputError class="mt-2" :message="form.errors.file" />


        <!-- editor / preview  -->
        <div v-show="form.file">
          <div
            class="relative flex w-full max-w-[100vw] mt-2 flex-col items-center justify-center rounded-md bg-muted/50 p-2 ring-2 ring-primary lg:col-span-2 lg:p-4"
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
          <Label for="instagram_reels" class="text-lg">link URL Youtube :</Label>
        </div>
        <Input
          v-model="form.linkIg"
          required
          id="instagram_reels"
          placeholder="ex: https://www.youtube.com/"
          :disabled="form.processing"
        />
        <InputError class="mt-2" :message="form.errors.linkIg" />
      </div>

      <div class="gap-3">
        <Label for="judul" class="text-lg">Judul</Label>
        <Input
          id="judul"
          required
          v-model="form.judulSubmission"
          placeholder="ex: GDSCHOOLICIOUS_NAMA SEKOLAH_KOTA ASAL"
          :disabled="form.processing"
        />
        <InputError class="mt-2" :message="form.errors.judulSubmission" />
      </div>

      <div class="flex flex-col gap-2">
        <Label class="text-lg">Upload Thumbnail Video</Label>

        <div class="relative inline-block w-2/6">
          <!-- shadow oranye -->
          <div
            class="absolute -right-1 -bottom-1 w-full h-full rounded-2xl z-0"
            style="background-color: #F7C893;"
            aria-hidden="true"
          ></div>

          <!-- tombol upload -->
          <label
            class="relative z-10 block bg-primary text-white uppercase font-bold text-lg text-center px-6 py-3 rounded-2xl cursor-pointer select-none transition-transform duration-300 hover:translate-y-1 hover:translate-x-1"
          >
            Upload
            <input
              type="file"
              class="hidden"
              accept="image/jpeg,image/png,image/jpg"
              @change="handleThumbnailChange"
              :disabled="form.processing"
            />
          </label>
        </div>

        <!-- teks nama file -->
        <p class="text-sm mt- font-bold" :class="form.thumbnail ? 'text-gray-700' : 'text-red-500'">
          {{ form.thumbnail ? form.thumbnail.name : 'No file attached.' }}
        </p>

        <InputError class="mt-2" :message="form.errors.thumbnail" />
      </div>

      <div class="grid gap-3">
        <Label for="description" class="text-lg">Description</Label>
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
     <div class="flex justify-center">
      <button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        class="w-fit items-center bg-primary hover:bg-primary/80 text-white rounded-full px-5 py-2 justify-center"
        type="submit"
      >
        Submit
      </button>
    </div>

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
