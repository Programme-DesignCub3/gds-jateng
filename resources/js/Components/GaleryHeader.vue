<script setup lang="ts">
import { cn } from "@/lib/utils";

withDefaults(
    defineProps<{
        bgImage?: string | null;
    }>(),
    {
        bgImage: null,
    },
);
</script>

<template>
    <div
        :class="
            cn(
                `${bgImage ? bgImage : 'bg-black'} -z-10 bg-cover bg-center relative overflow-hidden`,
                $attrs.class as string,
            )
        "
        :style="{ 'background-image': `url(${bgImage})` }"
    >
        <div class="flex items-center justify-center w-full h-full">
            <img src="/assets/images/logo_galery.png" alt="Logo Galery" class="lg:h-[48rem] md:h-[32rem] h-[24rem] w-auto object-contain" />
        </div>
        
    </div>

        
    
</template>

<style scoped></style>
