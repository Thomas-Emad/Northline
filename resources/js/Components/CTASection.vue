<script setup>
import Button from '@/Components/Button.vue';

defineProps({
  eyebrow: { type: String, default: 'Get Started' },
  title: { type: String, default: "Have an idea? Let's build it." },
  description: {
    type: String,
    default: "Tell us what you're trying to build, and we'll help you turn the idea into a scalable software solution.",
  },
  buttonLabel: { type: String, default: 'Start a Conversation' },
  buttonHref: { type: String, default: '/contact' },
});
</script>

<template>
  <section id="cta">
    <div class="container">
      <span class="eyebrow" v-reveal>{{ eyebrow }}</span>
      <h2 v-reveal>{{ title }}</h2>
      <p v-reveal>{{ description }}</p>
      <div class="hero-ctas" v-reveal>
        <Button :href="buttonHref" variant="on-dark">{{ buttonLabel }}</Button>
      </div>
    </div>
  </section>
</template>
