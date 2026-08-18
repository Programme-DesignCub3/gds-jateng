<template>
  <div 
    class="relative bg-[url('/assets/images/gds-2026/home-long.png')] bg-no-repeat bg-center bg-cover lg:bg-[length:100%_120%]"
  >
    <AppLayout>
      <Head :title="data.title" />

      <BackButton class="fixed left-4 top-20 z-20 md:top-28 lg:left-8 lg:top-40" />

      <MainHeaderHome
        class="relative z-0 bg-transparent bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
      />

      <div class="relative w-full overflow-hidden">
        <IconSecondary />

        <div class="relative z-0">
          <div
            class="container flex flex-col items-center justify-center"
          >
            <img :src="data.logoURL" alt="Logo" class="max-w-full w-auto md:w-[24rem] h-auto" />
          </div>

          <div
            class="container my-8 flex flex-col items-center justify-center gap-y-8 md:w-1/2"
          >
            <div class="text-center text-sm md:text-lg font-raleway font-[500]" v-html="data.description"></div>
          </div>

          <div
            :class="{
              'mb-0': !showButtons,
            }"
          >
            <CompetitionContentCard
              position="right"
              type=""
              name="HADIAH"
              :shortDesc="data.prize.desc"
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
              :imageUrl2="jury.image2"
            />
          </div>

          <div
            class="container flex flex-col items-center justify-center w-full md:w-2/3"
            :class="showButtons ? 'py-8' : 'pt-8 pb-20'"
          >
            <h2 class="text-4xl text-center text-[#8b3b1e] font-black uppercase tracking-tighter text-sticker">Rules</h2>

            <div class="text-left text-sm md:text-xl font-raleway font-[500] pt-12" v-html="data.rules.list"></div>
          </div>

          <div class="container pb-20 flex w-fit flex-col gap-4" v-if="showButtons">
            <button as-child>
              <Link class="text-center bg-primary text-white hover:bg-primary/80 px-4 py-2 rounded-full" :href="route('submission.create')">Upload</Link>
            </button>
          </div>
        </div>
      </div>

    </AppLayout>
  </div>
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
import IconContent from "@/Components/IconContent.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";
import IconSecondary from "@/Components/gds-2026/include/IconSecondary.vue";

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
      image2?: string;
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