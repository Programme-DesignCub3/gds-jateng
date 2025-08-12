<template>
  <div class="flex flex-col items-center">
    <!-- Logo utama -->
    <img :src="logo" alt="Logo" class="max-w-full h-auto" draggable="false" />
  </div>
</template>

<script>
export default {
  props: {
    logo: {
      type: String,
      required: true
    }
  }
};
</script>