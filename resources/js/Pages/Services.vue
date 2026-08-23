<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import SectionHeader from '@/Components/SectionHeader.vue';
import ServiceCard from '@/Components/ServiceCard.vue';
import CTASection from '@/Components/CTASection.vue';

defineProps({
  settings: { type: Object, required: true },
  services: { type: Array, required: true },
});
</script>

<template>
  <Head title="Services" />
  <MainLayout :settings="settings">
    <section class="page-hero">
      <div class="container">
        <span class="eyebrow" v-reveal>Services</span>
        <h1 v-reveal>Technology solutions designed around your business</h1>
        <p v-reveal>Explore the ways we help businesses automate, integrate, and scale.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <SectionHeader
          title="What we do"
          description="Every service below is a starting point, not a fixed package — most engagements end up mixing more than one."
        />
        <div class="services-grid">
          <ServiceCard v-for="service in services" :key="service.id" :service="service" />
        </div>
      </div>
    </section>

    <CTASection />
  </MainLayout>
</template>
