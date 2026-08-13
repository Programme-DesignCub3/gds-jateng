<script setup lang="ts">
import HomeLogo from "@/Components/gds-2026/include/HomeLogo.vue";
import { cn } from "@/lib/utils";

withDefaults(
  defineProps<{
    showJatengText?: boolean;
    bgImage?: string | null;
  }>(),
  {
    showJatengText: true,
    bgImage: null,
  }
);
</script>

<template>
  <div
    :class="
      cn(
        `${bgImage ? '' : ''} relative -z-0 lg:h-[80vh] md:h-[60vh] h-[40vh] bg-cover bg-center bg-no-repeat overflow-hidden`,
        $attrs.class as string,
      )
    "
    :style="bgImage ? { backgroundImage: `url(${bgImage})` } : {}"
  >
    <div class="relative flex h-full w-full items-center justify-center">

      <slot>
        <HomeLogo class="w-[20rem] sm:w-[20rem] md:w-[32rem] lg:w-[36rem] xl:w-[40rem] 2xl:w-[48rem]" />
      </slot>
    </div>
  </div>
</template>

<style scoped></style>