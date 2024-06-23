<script setup lang="ts">
import { Button } from "@/Components/ui/button";
</script>

<template>
  <Button
    class="inline-flex items-center rounded-md border border-transparent bg-primary px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:scale-105 hover:shadow-sm hover:brightness-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 active:scale-95"
  >
    <slot />
  </Button>
</template>
