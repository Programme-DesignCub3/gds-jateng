<template>
    <AppLayout>
        <Head :title="data.title" />
        <CompetitionDetailHeader>{{ data.title }}</CompetitionDetailHeader>

        <div
            class="container my-8 mb-8 mt-14 flex flex-col items-center justify-center gap-y-8 md:mt-12 md:w-4/5"
        >
            <div
                class="text-center font-raleway"
                v-html="data.description"
            ></div>
        </div>

        <div class="my-20">
            <!-- Prize -->
            <CompetitionContentCard
                position="left"
                type=""
                name="Hadiah"
                :shortDesc="data.prize.desc"
                imageUrl=""
            />

            <!-- Juri -->
            <CompetitionContentCard
                v-for="(jury, i) in data.jury"
                :key="jury.name"
                :position="i % 2 === 0 ? 'right' : 'left'"
                :type="jury.type"
                :pengalaman="jury.pengalaman"
                :name="jury.name"
                :akun-ig="jury.akun_ig"
                :shortDesc="jury.desc"
                :imageUrl="jury.image"
            />
        </div>

        <div class="container mb-20 flex w-fit flex-col gap-4">
            <PrimaryButton>Download rules</PrimaryButton>
            <PrimaryButton as-child>
                <Link class="text-center" :href="route('submission.create')"
                    >Submit</Link
                >
            </PrimaryButton>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import CompetitionContentCard from "./Partials/CompetitionContentCard.vue";
import CompetitionDetailHeader from "@/Components/CompetitionDetailHeader.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps<{
    data: {
        title: string;
        description: string;
        prize: {
            imageUrl: string;
            desc: string;
        };
        jury: {
            name: string;
            desc: string;
            type: string;
            image: string;
            pengalaman: string[];
            akun_ig: string;
        }[];
    };
}>();
</script>

<style scoped></style>
