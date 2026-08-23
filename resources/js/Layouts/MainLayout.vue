<script setup>
import Navbar from '@/Components/Navbar.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
  settings: { type: Object, required: true },
});
</script>

<template>
  <Navbar :company-name="settings.company_name" />
  <main>
    <slot />
  </main>
  <Footer :settings="settings" />
</template>
