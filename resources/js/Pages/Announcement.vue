<script setup lang="ts">
import AnnouncementHeader from "@/Components/AnnouncementHeader.vue";
import AnnouncementSection from "@/Components/AnnouncementSection.vue";
import AnnouncementTitle from "@/Components/gds-2026/announcement/CompetitionTitle.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";
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
  <div class="relative" :style="{
      backgroundImage: `url('/assets/images/gds-2026/long-bg.png')`,
      backgroundRepeat: 'no-repeat',
      backgroundPosition: 'center',
      backgroundSize: 'cover',
    }">
    <Head title="Pengumuman" />
    <AppLayout>
      <MainHeaderHome class="...">
        <!-- Tag img langsung dengan class dan src pilihan Anda -->
        <img 
          src="/assets/images/gds-2026/logo-finalist.png" 
          alt="Header Pengumuman" 
          class="w-[20rem] sm:w-[20rem] md:w-[32rem] lg:w-[36rem] xl:w-[40rem] 2xl:w-[48rem] h-auto object-contain"
          draggable="false"
        />
      </MainHeaderHome>
      <div
        class="container flex flex-col justify-center gap-y-10"
        :class="{
          'items-center': !currentRegion,
        }"
      >
      <div class="pt-6 md:space-y-20 space-y-12 pb-20">
        <AnnouncementTitle
          title="Winner"
          subtitle="Kolaborasa"
          class="w-full h-auto z-0"
        />
        <AnnouncementTitle
          title="Winner"
          subtitle="Modern Dance Competition"
          class="w-full h-auto z-0"
        />
        <AnnouncementTitle
          title="Winner"
          subtitle="Chant Supporter Competition"
          class="w-full h-auto z-0"
        />
        <AnnouncementTitle
          title="Winner"
          subtitle="Vlog Competition"
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
  </div>
</template>

<style scoped></style>
