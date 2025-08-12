<template>
  <AppLayout>
    <Head :title="data.title" />

    <BackButton class="fixed left-4 top-20 z-1 md:top-28 lg:left-8 lg:top-40" />

    <MainHeader
        showJatengText
        bgImage="/assets/images/new/home.png"
        class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
    /> 

    <IconBackgroundDetail />

    <div
      class="container mb-8 flex flex-col items-center justify-center gap-y-8 md:w-4/5"
    >
      <img :src="data.logoURL" alt="Logo" class="max-w-full w-[16rem] sm:w-[18rem] md:w-[20rem] lg:w-[24rem] xl:w-[28rem] 2xl:w-[32rem] h-auto" />
    </div>
    <div
      class="container my-8 mb-8 mt-14 flex flex-col items-center justify-center gap-y-8 md:mt-12 md:w-3/5"
    >
      <div class="text-center text-xl font-raleway font-[500]" v-html="data.description"></div>
    </div>

    <div
      class="my-20"
      :class="{
        'mb-0': !showButtons,
      }"
    >
      <CompetitionContentCard
        position="right"
        type=""
        name="Hadiah"
        :shortDesc="data.prize.desc"
        :imageUrl="data.prize.imageUrl"
      />

      <CompetitionContentCardNew
        v-for="(jury, i) in data.jury"
        :key="jury.name"
        :position="i % 2 === 0 ? 'left' : 'left'"
        :type="jury.type"
        :pengalaman="jury.pengalaman"
        :name="jury.name"
        :akun-ig="jury.akun_ig"
        :shortDesc="jury.desc"
        :imageUrl="jury.image"
      />
    </div>
    <div
      class="container my-8 mb-8 mt-14 flex flex-col items-center justify-center gap-y-8 md:mt-12 md:w-3/5"
    >
          <h2 class="text-4xl text-center font-bold text-[#8b3b1e]">Rules</h2>

      <div class="text-center text-xl font-raleway font-[500]" v-html="data.rules.list"></div>
    </div>
    <div class="container mb-20 flex w-fit flex-col gap-4" v-if="showButtons">

      <button as-child>
        <Link class="text-center bg-primary text-white hover:bg-primary/80 px-4 py-2 rounded-full" :href="route('submission.create')">Upload</Link>
      </button>
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import BackButton from "@/Components/BackButton.vue";
import CompetitionContentCard from "./Partials/CompetitionContentCard.vue";
import CompetitionContentCardNew from "./Partials/CompetitionContentCardNew.vue";
import CompetitionDetailHeader from "@/Components/CompetitionDetailHeader.vue";
import MainHeader from "@/Components/MainHeader.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import IconBackgroundDetail from "@/Components/IconBackgroundDetail.vue";

defineProps<{
  data: {
    title: string;
    description: string;
    logoURL: string;
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
