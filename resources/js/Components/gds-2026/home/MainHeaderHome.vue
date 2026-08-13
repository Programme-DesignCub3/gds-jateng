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
      <img
        src="/assets/images/gds-2026/elements/basket.png"
        alt="Icon Basket"
        class="absolute left-[6%] md:left-[12%] top-[18%] w-[12%] max-w-[120px] min-w-[45px] pointer-events-none select-none transition-transform duration-300 hover:scale-110"
      />

      <img
        src="/assets/images/gds-2026/elements/lukis.png"
        alt="Icon Lukis"
        class="absolute left-[4%] md:left-[8%] bottom-[12%] w-[15%] max-w-[150px] min-w-[55px] pointer-events-none select-none transition-transform duration-300 hover:scale-110"
      />

      <img
        src="/assets/images/gds-2026/elements/nada.png"
        alt="Icon Nada"
        class="absolute right-[8%] md:right-[18%] top-[22%] w-[7%] max-w-[70px] min-w-[28px] pointer-events-none select-none transition-transform duration-300 hover:scale-110"
      />

      <img
        src="/assets/images/gds-2026/elements/buku.png"
        alt="Icon Buku"
        class="absolute right-[4%] md:right-[14%] bottom-[18%] w-[10%] max-w-[100px] min-w-[40px] pointer-events-none select-none transition-transform duration-300 hover:scale-110"
      />

      <slot>
        <HomeLogo class="w-[20rem] sm:w-[20rem] md:w-[32rem] lg:w-[36rem] xl:w-[40rem] 2xl:w-[48rem]" />
      </slot>
    </div>
  </div>
</template>

<style scoped></style>