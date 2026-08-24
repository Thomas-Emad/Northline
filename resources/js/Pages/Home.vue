<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Hero from '@/Components/Hero.vue';
import StatCard from '@/Components/StatCard.vue';
import SectionHeader from '@/Components/SectionHeader.vue';
import ServiceCard from '@/Components/ServiceCard.vue';
import ProjectGrid from '@/Components/ProjectGrid.vue';
import ProcessStep from '@/Components/ProcessStep.vue';
import TechnologyBadge from '@/Components/TechnologyBadge.vue';
import TestimonialCard from '@/Components/TestimonialCard.vue';
import CTASection from '@/Components/CTASection.vue';
import Button from '@/Components/Button.vue';
import { useI18n } from '@/i18n';

defineProps({
  settings: { type: Object, required: true },
  services: { type: Array, required: true },
  projects: { type: Array, required: true },
  testimonials: { type: Array, default: () => [] },
});

const { t } = useI18n();
</script>

<template>
  <Head title="Home" />
  <MainLayout :settings="settings">
    <Hero
      :eyebrow="settings.hero_eyebrow"
      :title="settings.hero_title"
      :subtitle="settings.hero_subtitle"
    />

    <section id="stats">
      <div class="container stats-grid">
        <StatCard
          v-for="stat in settings.stats"
          :key="stat.label"
          :value="stat.value"
          :suffix="stat.suffix"
          :label="stat.label"
        />
      </div>
    </section>

    <section id="services" class="section">
      <div class="container">
        <SectionHeader
          :eyebrow="t('services_section.eyebrow', 'Services')"
          :title="t('services_section.title', 'Software solutions built around your business')"
          :description="t('services_section.description', 'We build software around your business, not the other way around.')"
        />
        <div class="services-grid">
          <ServiceCard v-for="service in services" :key="service.id" :service="service" />
        </div>
      </div>
    </section>

    <section id="why" class="section">
      <div class="container">
        <div class="why-grid">
          <div>
            <SectionHeader
              on-dark
              :eyebrow="t('why_section.eyebrow', 'Why Northline')"
              :title="t('why_section.title', &quot;Technology is easy. Building the right solution isn't.&quot;)"
              :description="t('why_section.description', 'We spend as much time understanding your business as we do writing code.')"
            />
            <div class="why-list" v-reveal>
              <div v-for="(item, i) in t('why_section.items', [])" :key="item.title" class="why-item">
                <span class="why-num">{{ String(i + 1).padStart(2, '0') }}</span>
                <div>
                  <h4>{{ item.title }}</h4>
                  <p>{{ item.description }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="why-visual" v-reveal>
            <svg viewBox="0 0 500 420" preserveAspectRatio="none">
              <defs>
                <linearGradient id="wg" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0%" stop-color="#5B54E8" stop-opacity="0.6" />
                  <stop offset="100%" stop-color="#35D8C6" stop-opacity="0.6" />
                </linearGradient>
              </defs>
              <g stroke="url(#wg)" stroke-width="1" fill="none" opacity="0.7">
                <rect x="60" y="60" width="120" height="70" rx="8" />
                <rect x="220" y="40" width="120" height="70" rx="8" />
                <rect x="220" y="150" width="120" height="70" rx="8" />
                <rect x="60" y="200" width="120" height="70" rx="8" />
                <rect x="140" y="290" width="220" height="70" rx="8" />
                <path d="M180 95 L220 75" />
                <path d="M280 110 L280 150" />
                <path d="M220 185 L180 220" />
                <path d="M180 260 L220 300" />
                <path d="M280 220 L280 290" />
              </g>
              <g fill="#8B85F5" opacity="0.9">
                <circle cx="120" cy="95" r="3" />
                <circle cx="280" cy="75" r="3" />
                <circle cx="280" cy="185" r="3" />
                <circle cx="120" cy="235" r="3" />
              </g>
            </svg>
          </div>
        </div>
      </div>
    </section>

    <section class="section" style="background:#F0F1F7;">
      <div class="container">
        <SectionHeader
          :eyebrow="t('process_section.eyebrow', 'Process')"
          :title="t('process_section.title', 'From idea to production')"
          :description="t('process_section.description', 'A consistent, transparent sequence for every engagement.')"
        />
        <div class="process-track" v-reveal>
          <ProcessStep
            v-for="step in t('process_section.steps', [])"
            :key="step.number"
            :number="step.number"
            :title="step.title"
            :description="step.description"
          />
        </div>
      </div>
    </section>

    <section id="projects" class="section">
      <div class="container">
        <SectionHeader
          :eyebrow="t('projects_section.eyebrow', 'Selected Work')"
          :title="t('projects_section.title', &quot;Projects we're proud of&quot;)"
          :description="t('projects_section.description', &quot;A sample of the systems we've designed, built, and kept running.&quot;)"
        />
        <ProjectGrid :projects="projects" featured-layout />
        <div style="text-align:center; margin-top:48px;" v-reveal>
          <Button href="/projects" variant="ghost">{{ t('projects_section.view_all', 'View All Projects') }}</Button>
        </div>
      </div>
    </section>

    <section v-if="testimonials.length" class="section" style="background:#F0F1F7;">
      <div class="container">
        <SectionHeader
          :eyebrow="t('testimonials_section.eyebrow', 'Client Voices')"
          :title="t('testimonials_section.title', 'What clients say')"
          center
        />
        <div class="services-grid">
          <TestimonialCard v-for="tItem in testimonials" :key="tItem.id" :testimonial="tItem" />
        </div>
      </div>
    </section>

    <section id="tech" class="section">
      <div class="container">
        <SectionHeader :eyebrow="t('tech_section.eyebrow', 'Stack')" :title="t('tech_section.title', 'Technology we build with')" />
        <div class="tech-cols" v-reveal>
          <div v-for="category in settings.tech_stack" :key="category.key">
            <div class="tech-col-title">{{ t(`tech_section.${category.key}`, category.key) }}</div>
            <div>
              <TechnologyBadge v-for="item in category.items" :key="item" :name="item" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <CTASection />
  </MainLayout>
</template>
