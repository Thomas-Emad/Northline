<script setup>
import { router, usePage } from '@inertiajs/vue3';

const page = usePage();

function switchTo(locale) {
  if (locale === page.props.locale) return;
  router.get(`/locale/${locale}`, {}, { preserveScroll: true, preserveState: false });
}
</script>

<template>
  <div class="locale-switch" role="group" aria-label="Language">
    <button
      type="button"
      :class="{ active: page.props.locale === 'en' }"
      @click="switchTo('en')"
    >EN</button>
    <button
      type="button"
      :class="{ active: page.props.locale === 'ar' }"
      @click="switchTo('ar')"
    >AR</button>
  </div>
</template>

<style scoped>
.locale-switch {
  display: flex;
  align-items: center;
  gap: 2px;
  padding: 3px;
  border-radius: 8px;
  background: rgba(16, 20, 42, 0.05);
}
.locale-switch button {
  font-family: var(--mono);
  font-size: 11.5px;
  font-weight: 600;
  padding: 6px 10px;
  border-radius: 6px;
  border: none;
  background: transparent;
  color: var(--paper-dim);
  cursor: pointer;
  transition: all 0.2s ease;
}
.locale-switch button.active {
  background: var(--paper-ink);
  color: white;
}
</style>
