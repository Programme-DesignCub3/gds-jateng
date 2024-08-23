<script setup lang="ts">
defineProps<{
  name: string;
  schoolName: string;
  thumbnail: string;
}>();
</script>
<template>
  <div>
    <div
      class="flex aspect-square items-center justify-center overflow-hidden rounded-2xl bg-muted-foreground/50 object-contain object-center"
    >
      <img :src="thumbnail" alt="" />
    </div>

    <div>
      <p class="mt-2 text-xs md:text-base">
        {{ schoolName }}
      </p>
      <p class="text-base font-bold md:text-lg">
        {{ name }}
      </p>
    </div>
  </div>
</template>

<style scoped></style>
