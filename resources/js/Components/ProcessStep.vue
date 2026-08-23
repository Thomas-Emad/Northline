<script setup>
defineProps({
  number: { type: String, required: true },
  title: { type: String, required: true },
  description: { type: String, required: true },
});
</script>

<template>
  <div class="process-step">
    <div class="process-dot">{{ number }}</div>
    <h4>{{ title }}</h4>
    <p>{{ description }}</p>
  </div>
</template>
