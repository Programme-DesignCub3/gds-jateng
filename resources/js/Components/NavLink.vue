<script setup lang="ts">
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps<{
  href: string;
  active?: boolean;
}>();

const baseClass = `inline-flex  lg:text-xl text-center text-wrap items-center px-1 pt-1 border-b-2 focus:outline-none text-sm font-medium leading-5 transition duration-150 ease-in-out`;

const classes = computed(() =>
  props.active
    ? `${baseClass} border-primary text-gray-900 focus:border-primary`
    : `${baseClass} border-transparent text-sm font-medium leading-5 text-gray-500  hover:text-gray-700 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300`
);
</script>

<template>
  <Link :href="href" :class="classes">
    <slot />
  </Link>
</template>
