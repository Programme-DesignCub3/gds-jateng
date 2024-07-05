<script setup lang="ts">
// Import Vue FilePond
import vueFilePond, { setOptions } from "vue-filepond";

// Import FilePond plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
import type { FilePondErrorDescription } from "filepond";
import type { FilePondFile } from "filepond";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed } from "vue";
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
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Badge } from "@/Components/ui/badge";
import { getCompetitionLabel } from "@/lib/utils";

const page = usePage();
const user = computed(() => page.props.auth.user);

const form = useForm<{
    files: FilePondFile[];
    thumbnail: null | File;
    judulSubmission: string;
    competition: string;
    linkIg: "";
    submissionDescription: "";
}>({
    files: [],
    thumbnail: null,
    judulSubmission: "",
    linkIg: "",
    competition: user.value.competition,
    submissionDescription: "",
});

// Create component
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize,
);

// Handle video file add event
const handleFilePondImagesFileAdd = (
    error: FilePondErrorDescription | null,
    file: FilePondFile,
) => {
    if (error) {
        console.error("Oh no, something went wrong!", error);
        return;
    }
    form.files.push(file);
};

// Remove the video from form on file remove
const handleFilePondImagesRemoveFile = (
    error: FilePondErrorDescription | null,
    file: FilePondFile,
) => {
    console.log("remove id : " + file.id);

    form.files = form.files.filter((formFile) => formFile.id !== file.id);
};

// Handle thumbnail file add event
const handleFilePondThumbnailFileAdd = (
    error: FilePondErrorDescription | null,
    file: FilePondFile,
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
    file: FilePondFile,
) => {
    form.thumbnail = null;
};

// Handle FilePond init event
const handleFilePondInit = () => {
    setOptions({
        credits: false,
        instantUpload: false,
        allowProcess: false,
    });
};

const submit = () => {
    form.transform((data) => ({
        ...data,
        files: data.files.map((file) => file.file),
    })).post("/submission", {
        onError: (errors) => {
            console.log("error nih bos : " + errors);
        },
    });
};
</script>

<template>
    <div class="container mb-10 max-w-xl">
        <h1>Upload images</h1>
        <form
            @submit.prevent="submit"
            class="grid w-full items-start gap-6 overflow-auto p-2 lg:p-4"
        >
            <div class="gap-3">
                <Label for="competition">Competition : </Label>
                <Badge>{{ getCompetitionLabel(form.competition) }}</Badge>
                <InputError class="mt-2" :message="form.errors.competition" />
            </div>

            <div class="">
                <Label>Upload File</Label>
                <FilePond
                    name="test"
                    ref="pond"
                    label-idle="Drop files here..."
                    :instant-upload="false"
                    :allow-multiple="true"
                    credits="false"
                    accepted-file-types="image/jpeg, image/png, image/jpg"
                    max-file-size="3MB"
                    :max-files="2"
                    @warning="form.errors.files = 'Max file 2'"
                    @updatefiles="form.errors.files = undefined"
                    @addfile="handleFilePondImagesFileAdd"
                    @init="handleFilePondInit"
                    @removefile="handleFilePondImagesRemoveFile"
                />
                <InputError class="mt-2" :message="form.errors.files" />
            </div>

            <div class="gap-3">
                <Label for="judul">Judul</Label>
                <Input
                    id="judul"
                    required
                    v-model="form.judulSubmission"
                    placeholder="ex: GDSCHOOLICIOUS_NAMA SEKOLAH_KOTA ASAL"
                />
                <InputError
                    class="mt-2"
                    :message="form.errors.judulSubmission"
                />
            </div>

            <div class="gap-3">
                <div>
                    <Label for="instagram_reels"
                        >link URL Instagram Reels :</Label
                    >
                    <p
                        class="mt-1 text-xs text-muted-foreground dark:text-red-400"
                    >
                        Video We Are Ready for Schoolicious
                    </p>
                </div>
                <Input
                    v-model="form.linkIg"
                    required
                    id="instagram_reels"
                    placeholder="ex: https://www.instagram.com/reel/C68td6fyyzsM/?hl=en"
                />
                <InputError class="mt-2" :message="form.errors.linkIg" />
            </div>

            <div class="gap-3">
                <Label for="role">Upload Thumbnail</Label>
                <FilePond
                    name="test"
                    max-file-size="3MB"
                    accepted-file-types="image/jpeg, image/png, image/jpg"
                    label-idle="Drop files here..."
                    :instant-upload="false"
                    :allow-multiple="false"
                    credits="false"
                    required
                    @addfile="handleFilePondThumbnailFileAdd"
                    @init="handleFilePondInit"
                    @warning="(error: string | undefined) => console.log(error)"
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
                />
                <InputError
                    class="mt-2"
                    :message="form.errors.submissionDescription"
                />
            </div>

            <!-- upload progress -->
            <div v-if="form.progress" class="space-y-2">
                <div
                    class="h-3 overflow-hidden rounded bg-gray-100 shadow-inner"
                >
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
                    This action cannot be undone. This will permanently send the
                    submission
                </AlertDialogDescription>
            </AlertDialogHeader>
            <AlertDialogFooter>
                <AlertDialogCancel>Cancel</AlertDialogCancel>
                <AlertDialogAction>Continue</AlertDialogAction>
            </AlertDialogFooter>
        </AlertDialogContent>
    </AlertDialog>
</template>
