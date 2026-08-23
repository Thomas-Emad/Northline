<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import SectionHeader from '@/Components/SectionHeader.vue';
import CTASection from '@/Components/CTASection.vue';

defineProps({
  settings: { type: Object, required: true },
});

const values = [
  { title: 'Clarity', description: 'We say what we mean, and we build what we agreed on.' },
  { title: 'Craft', description: 'Code, architecture and design are treated as things worth doing well.' },
  { title: 'Ownership', description: 'We treat every project like it will still be running in five years — because it usually is.' },
  { title: 'Partnership', description: 'We work alongside your team, not just for your ticket queue.' },
];
</script>

<template>
  <Head title="About" />
  <MainLayout :settings="settings">
    <section class="page-hero">
      <div class="container">
        <span class="eyebrow" v-reveal>About Northline</span>
        <h1 v-reveal>We build technology with purpose.</h1>
        <p v-reveal>
          Northline is a software engineering studio. We design and build custom
          applications, ERP systems, and integrations for businesses that are
          past the point where spreadsheets and off-the-shelf tools can keep up.
        </p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <SectionHeader
          eyebrow="Who we are"
          title="A small team that ships serious software"
          description="We're engineers first. Every project is led by people who will actually write the code, not just manage the relationship."
        />
        <div class="services-grid">
          <div class="service-card" v-reveal>
            <h3>Our Mission</h3>
            <p>Help businesses replace fragile, manual processes with software that scales with them.</p>
          </div>
          <div class="service-card" v-reveal>
            <h3>Our Vision</h3>
            <p>Be the studio businesses call when the problem is too specific for a template solution.</p>
          </div>
          <div class="service-card" v-reveal>
            <h3>How We Work</h3>
            <p>Discovery before code, architecture before features, and a plan for support before launch day.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="why" class="section">
      <div class="container">
        <SectionHeader on-dark eyebrow="What We Believe" title="Our values" />
        <div class="services-grid">
          <div v-for="value in values" :key="value.title" class="service-card" v-reveal style="background:var(--bg-soft); border-color:rgba(255,255,255,0.08);">
            <h3 style="color:var(--ink);">{{ value.title }}</h3>
            <p style="color:var(--ink-dim);">{{ value.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <CTASection />
  </MainLayout>
</template>
