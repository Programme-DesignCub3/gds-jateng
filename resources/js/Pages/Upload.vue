<script setup lang="ts">
import { Badge } from "@/Components/ui/badge";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import AppLayout from "@/Layouts/AppLayout.vue";
import FileUpload from "@/Components/ui/custom/FileUpload.vue";
import { ScrollArea } from "@/Components/ui/scroll-area";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Upload test page" />

    <AppLayout>
        <div class="grid w-full">
            <div class="flex flex-col">
                <main
                    class="grid flex-1 gap-4 overflow-auto p-4 lg:grid-cols-3"
                >
                    <!-- form -->
                    <ScrollArea class="rounded-md border ring-2 lg:h-[80vh]">
                        <div
                            class="relative flex-col items-start gap-8 max-md:order-1 md:flex"
                        >
                            <form
                                class="grid w-full items-start gap-6 overflow-auto p-4"
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
                                        <FileUpload />
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
                                        <FileUpload />
                                    </div>
                                    <div class="grid gap-3">
                                        <Label for="description"
                                            >Description</Label
                                        >
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
                        class="relative flex w-full max-w-[100vw] flex-col rounded-xl bg-muted/50 p-4 ring-2 ring-primary lg:col-span-2"
                    >
                        <Badge variant="outline" class="absolute right-3 top-3">
                            Preview
                        </Badge>
                        <div class="aspect-video" />
                    </div>
                </main>
            </div>
        </div>
    </AppLayout>
</template>
