<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import SectionHeader from '@/Components/SectionHeader.vue';
import CTASection from '@/Components/CTASection.vue';
import { useI18n } from '@/i18n';

defineProps({
  settings: { type: Object, required: true },
});

const { t } = useI18n();
</script>

<template>
  <Head title="About" />
  <MainLayout :settings="settings">
    <section class="page-hero">
      <div class="container">
        <span class="eyebrow" v-reveal>{{ t('about_page.eyebrow') }}</span>
        <h1 v-reveal>{{ t('about_page.title') }}</h1>
        <p v-reveal>{{ t('about_page.intro') }}</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <SectionHeader
          :eyebrow="t('about_page.who_eyebrow')"
          :title="t('about_page.who_title')"
          :description="t('about_page.who_description')"
        />
        <div class="services-grid">
          <div class="service-card" v-reveal>
            <h3>{{ t('about_page.mission_title') }}</h3>
            <p>{{ t('about_page.mission_body') }}</p>
          </div>
          <div class="service-card" v-reveal>
            <h3>{{ t('about_page.vision_title') }}</h3>
            <p>{{ t('about_page.vision_body') }}</p>
          </div>
          <div class="service-card" v-reveal>
            <h3>{{ t('about_page.how_title') }}</h3>
            <p>{{ t('about_page.how_body') }}</p>
          </div>
        </div>
      </div>
    </section>

    <section id="why" class="section">
      <div class="container">
        <SectionHeader on-dark :eyebrow="t('about_page.values_eyebrow')" :title="t('about_page.values_title')" />
        <div class="services-grid">
          <div
            v-for="value in t('about_page.values', [])"
            :key="value.title"
            class="service-card"
            v-reveal
            style="background:var(--bg-soft); border-color:rgba(255,255,255,0.08);"
          >
            <h3 style="color:var(--ink);">{{ value.title }}</h3>
            <p style="color:var(--ink-dim);">{{ value.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <CTASection />
  </MainLayout>
</template>
