<script setup>
defineProps({
  eyebrow: { type: String, default: '' },
  title: { type: String, required: true },
  description: { type: String, default: '' },
  onDark: { type: Boolean, default: false },
  center: { type: Boolean, default: false },
});
</script>

<template>
  <div class="section-head" :class="{ 'on-dark': onDark, center }" v-reveal>
    <span v-if="eyebrow" class="eyebrow">{{ eyebrow }}</span>
    <h2>{{ title }}</h2>
    <p v-if="description">{{ description }}</p>
  </div>
</template>
