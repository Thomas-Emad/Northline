<script setup>
defineProps({
  name: { type: String, required: true },
});
</script>

<template>
  <span class="tech-badge"><span class="dot2"></span>{{ name }}</span>
</template>
