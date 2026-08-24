<script setup>
import { computed } from 'vue';
import Button from '@/Components/Button.vue';
import { useI18n } from '@/i18n';

const props = defineProps({
  eyebrow: { type: String, default: null },
  title: { type: String, default: null },
  description: { type: String, default: null },
  buttonLabel: { type: String, default: null },
  buttonHref: { type: String, default: '/contact' },
});

const { t } = useI18n();

const eyebrowText = computed(() => props.eyebrow ?? t('cta_section.eyebrow'));
const titleText = computed(() => props.title ?? t('cta_section.title'));
const descriptionText = computed(() => props.description ?? t('cta_section.description'));
const buttonText = computed(() => props.buttonLabel ?? t('cta_section.button'));
</script>

<template>
  <section id="cta">
    <div class="container">
      <span class="eyebrow" v-reveal>{{ eyebrowText }}</span>
      <h2 v-reveal>{{ titleText }}</h2>
      <p v-reveal>{{ descriptionText }}</p>
      <div class="hero-ctas" v-reveal>
        <Button :href="buttonHref" variant="on-dark">{{ buttonText }}</Button>
      </div>
    </div>
  </section>
</template>
