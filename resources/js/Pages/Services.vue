<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import SectionHeader from '@/Components/SectionHeader.vue';
import ServiceCard from '@/Components/ServiceCard.vue';
import CTASection from '@/Components/CTASection.vue';
import { useI18n } from '@/i18n';

defineProps({
  settings: { type: Object, required: true },
  services: { type: Array, required: true },
});

const { t } = useI18n();
</script>

<template>
  <Head title="Services" />
  <MainLayout :settings="settings">
    <section class="page-hero">
      <div class="container">
        <span class="eyebrow" v-reveal>{{ t('services_page.eyebrow') }}</span>
        <h1 v-reveal>{{ t('services_page.title') }}</h1>
        <p v-reveal>{{ t('services_page.description') }}</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <SectionHeader
          :title="t('services_page.section_title')"
          :description="t('services_page.section_description')"
        />
        <div class="services-grid">
          <ServiceCard v-for="service in services" :key="service.id" :service="service" />
        </div>
      </div>
    </section>

    <CTASection />
  </MainLayout>
</template>
