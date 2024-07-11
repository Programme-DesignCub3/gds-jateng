<template>
  <AppLayout>
    <Head :title="data.title" />

    <BackButton class="fixed left-4 top-20 z-1 md:top-28 lg:left-8 lg:top-40" />

    <CompetitionDetailHeader>{{ data.title }}</CompetitionDetailHeader>

    <div
      class="container my-8 mb-8 mt-14 flex flex-col items-center justify-center gap-y-8 md:mt-12 md:w-4/5"
    >
      <div class="text-center font-raleway" v-html="data.description"></div>
    </div>

    <div
      class="my-20"
      :class="{
        'mb-0': !showButtons,
      }"
    >
      <!-- Prize -->
      <CompetitionContentCard
        position="left"
        type=""
        name="Hadiah"
        :shortDesc="data.prize.desc"
        :imageUrl="data.prize.imageUrl"
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
    <ul
      class="container mb-20 flex flex-col mt-8 w-fit list-disc gap-4"
      v-if="data.rules.list.length"
    >
      <h2 class="text-4xl text-center font-bold">Rules</h2>

      <li v-for="item in data.rules.list">{{ item }}</li>
    </ul>
    <div class="container mb-20 flex w-fit flex-col gap-4" v-if="showButtons">
      <PrimaryButton v-if="$page.props.auth.user" as-child>
        <a :href="data.rules.file_url" target="_blank">Download rules</a>
      </PrimaryButton>

      <PrimaryButton as-child>
        <Link class="text-center" :href="route('submission.create')">Submit</Link>
      </PrimaryButton>
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import BackButton from "@/Components/BackButton.vue";
import CompetitionContentCard from "./Partials/CompetitionContentCard.vue";
import CompetitionDetailHeader from "@/Components/CompetitionDetailHeader.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps<{
  data: {
    title: string;
    description: string;
    slug: string;
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
    rules: {
      file_url: string;
      list: string[];
    };
  };
  showButtons: boolean;
}>();
</script>

<style scoped></style>
