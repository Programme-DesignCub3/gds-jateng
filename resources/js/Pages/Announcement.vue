<script setup lang="ts">
import AnnouncementHeader from "@/Components/AnnouncementHeader.vue";
import AnnouncementSection from "@/Components/AnnouncementSection.vue";
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
    <AnnouncementHeader />

    <div
      class="container flex flex-col justify-center gap-y-10 py-8 md:gap-y-20"
      :class="{
        'items-center': !currentRegion,
      }"
    >
      <Tabs
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
      </Alert>
    </div>
  </AppLayout>
</template>

<style scoped></style>
