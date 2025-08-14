<script setup lang="ts">
import HomeLogo from "@/Components/HomeLogo.vue";
import { cn } from "@/lib/utils";
import IconContainer from "./IconContainer.vue";

withDefaults(
  defineProps<{
    showJatengText?: boolean;
    bgImage?: string | null;
  }>(),
  {
    showJatengText: false,
    bgImage: null,
  }
);
</script>

<template>
  <div
    :class="
        cn(
        `${bgImage ? '' : 'bg-black'} relative -z-0 lg:h-[80vh] md:h-[60vh] h-[40vh] bg-cover bg-center bg-no-repeat`,
        $attrs.class as string,
        )
    "
    :style="bgImage ? { backgroundImage: `url(${bgImage})` } : {}"
    >
    <!-- GRADIENT FADE -->
    <div class="absolute bottom-0 left-0 h-32 w-full bg-gradient-to-b from-transparent to-[#fff9f0]"></div>
    <!-- LOGO CENTER -->
    <div class="flex h-full w-full items-center justify-center">
      <HomeLogo class="w-[20rem] sm:w-[20rem] md:w-[32rem] lg:w-[36rem] xl:w-[40rem] 2xl:w-[48rem]" />
    </div>
  </div>
</template>

<style scoped></style>
