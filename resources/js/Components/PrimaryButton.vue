<script setup lang="ts">
import { Button } from "@/Components/ui/button";
</script>

<template>
    <Button
        class="duration-[0.3s] relative inline-flex h-10 cursor-pointer items-center justify-center rounded-none border border-none bg-black bg-primary px-5 py-0 text-xs font-semibold uppercase tracking-widest text-white shadow-[5px_5px_0px_rgb(0,0,0)] transition ease-in-out hover:scale-[98%] hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 active:translate-x-[3px] active:translate-y-[3px] active:scale-95 active:shadow-[2px_2px_0px_rgb(140,32,212)]"
    >
        <slot />
    </Button>
</template>
