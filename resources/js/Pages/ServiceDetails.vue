<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import TechnologyBadge from '@/Components/TechnologyBadge.vue';
import CTASection from '@/Components/CTASection.vue';

defineProps({
  settings: { type: Object, required: true },
  service: { type: Object, required: true },
});
</script>

<template>
  <Head :title="service.title" />
  <MainLayout :settings="settings">
    <section class="page-hero">
      <div class="container">
        <span class="eyebrow" v-reveal>Service</span>
        <h1 v-reveal>{{ service.title }}</h1>
        <p v-reveal>{{ service.short_description }}</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="why-grid">
          <div v-reveal>
            <div v-if="service.full_description" v-html="service.full_description" style="font-size:16px; line-height:1.7; color:var(--paper-dim);"></div>

            <h4 style="margin-top:32px; margin-bottom:14px; font-size:15px;">Key capabilities</h4>
            <ul style="display:flex; flex-direction:column; gap:10px;">
              <li v-for="feature in service.features" :key="feature" style="font-size:14.5px; color:var(--paper-dim); display:flex; gap:10px; align-items:flex-start;">
                <span style="color:var(--teal); font-family:var(--mono);">→</span>{{ feature }}
              </li>
            </ul>
          </div>
          <div v-reveal>
            <h4 style="margin-bottom:14px; font-size:15px;">Technologies</h4>
            <div>
              <TechnologyBadge v-for="tech in service.technologies" :key="tech" :name="tech" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <CTASection
      title="Ready to start on this?"
      :description="`Tell us about your ${service.title.toLowerCase()} project and we'll follow up within one business day.`"
    />
  </MainLayout>
</template>
