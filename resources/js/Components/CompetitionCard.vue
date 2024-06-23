<template>
  <div
    class="flex h-full items-center justify-between gap-x-10 gap-y-4 rounded-2xl border-2 border-primary p-4 max-sm:size-auto max-sm:h-full max-sm:flex-col sm:max-h-80 sm:max-w-3xl sm:pr-16"
  >
    <div class="size-32 max-w-32 shrink overflow-hidden rounded-lg">
      <img src="https://unsplash.it/500/500" alt="" />
    </div>

    <div class="flex w-full items-center justify-between max-sm:gap-x-4 sm:max-w-xs">
      <div class="h-full">
        <h2 class="mb-3 text-xl font-bold">Nama Kompetisi</h2>
        <p class="text-sm">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit eaque
          exercitationem qui expedita! Maxime vero provident atque
        </p>
      </div>
      <Button as-child class="shrink-0 rounded-full" size="icon">
        <ArrowRight class="h-8 w-8" />
      </Button>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ArrowRight } from "lucide-vue-next";
import { Button } from "@/Components/ui/button";
</script>

<style scoped></style>
