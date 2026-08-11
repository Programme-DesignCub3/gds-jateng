<script setup lang="ts">
import AnnouncementHeader from "@/Components/AnnouncementHeader.vue";
import AnnouncementSection from "@/Components/AnnouncementSection.vue";
import AnnouncementTitle from "@/Components/AnnouncementTitle.vue";
import IconBackgroundDetail from "@/Components/IconBackgroundDetail.vue";
import { Alert, AlertDescription, AlertTitle } from "@/Components/ui/alert";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/Components/ui/tabs";
import AppLayout from "@/Layouts/AppLayout.vue";
import type { TFinalistList } from "@/lib/types";
import { Head } from "@inertiajs/vue3";
import { AlertCircle } from "lucide-vue-next";
import { ref } from "vue";

const currentRegion = ref<string | null>(null);

defineProps<{
  finalistSemarang: TFinalistList[];
  finalistYogyakarta: TFinalistList[];
}>();
</script>

<template>
  <Head title="Pengumuman" />
  <AppLayout>
    <AnnouncementHeader
        bgImage="/assets/images/new/home.png"
        class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
      /> 
            <IconBackgroundDetail class="z-0" />

    <div
      class="container flex flex-col justify-center gap-y-10"
      :class="{
        'items-center': !currentRegion,
      }"
    >
    <div class="py-12 2xl:space-y-[12rem] xl:space-y-[6rem] space-y-[6rem]">
      <AnnouncementTitle
        logo="/assets/images/new/announcement/winner-kolaborasa.png"
        class="w-full h-auto z-0"
      />
      <AnnouncementTitle
        logo="/assets/images/new/announcement/winner-chant.png"
        class="w-full h-auto z-0"
      />
      <AnnouncementTitle
        logo="/assets/images/new/announcement/winner-dance.png"
        class="w-full h-auto z-0"
      />
    </div>
      

      <!-- <Tabs
        @update:model-value="(region) => (currentRegion = String(region))"
        default-value=""
        class="flex flex-col items-center justify-center"
      >
        <TabsList class="justify-center space-x-4 bg-white text-center">
          <TabsTrigger class="bg-muted text-2xl" value="yogyakarta">
            Yogyakarta
          </TabsTrigger>

          <TabsTrigger class="bg-muted text-2xl" value="semarang"> Semarang </TabsTrigger>
        </TabsList>

        <TabsContent class="w-full" value="yogyakarta">
          <AnnouncementSection
            :finalist-list="competition.list"
            v-for="competition in finalistYogyakarta"
            :key="`yogyakarta-${competition.competition}`"
            :title="competition.label"
          />
        </TabsContent>

        <TabsContent class="w-full" value="semarang">
          <AnnouncementSection
            :finalist-list="competition.list"
            v-for="competition in finalistSemarang"
            :key="`semarang-${competition.competition}`"
            :title="competition.label"
          />
        </TabsContent>
      </Tabs>

      <Alert variant="destructive" class="w-fit text-lg" v-if="!currentRegion">
        <AlertCircle class="size-5" />
        <AlertTitle>Perhatian</AlertTitle>
        <AlertDescription class="text-base">
          Silahkan pilih area yang ingin ditampilkan
        </AlertDescription>
      </Alert> -->
    </div>
  </AppLayout>
</template>

<style scoped></style>
