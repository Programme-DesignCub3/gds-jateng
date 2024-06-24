<script setup lang="ts">
import Nav from "@/Components/Nav.vue";
import { useForwardProps } from "radix-vue";

const props = withDefaults(defineProps<{ fixedNav?: boolean }>(), {
    fixedNav: false,
});
const forwarded = useForwardProps(props);
</script>

<template>
    <Nav v-bind="forwarded" />

    <slot />
</template>

<style lang="scss" scoped></style>
