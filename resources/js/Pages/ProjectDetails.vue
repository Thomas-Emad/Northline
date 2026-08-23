<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import TechnologyBadge from '@/Components/TechnologyBadge.vue';
import ProjectGrid from '@/Components/ProjectGrid.vue';
import CTASection from '@/Components/CTASection.vue';
import Button from '@/Components/Button.vue';

defineProps({
  settings: { type: Object, required: true },
  project: { type: Object, required: true },
  relatedProjects: { type: Array, default: () => [] },
});
</script>

<template>
  <Head :title="project.title" />
  <MainLayout :settings="settings">
    <section class="page-hero" style="padding-bottom: 40px;">
      <div class="container">
        <span class="eyebrow" v-reveal>{{ project.category }}</span>
        <h1 v-reveal>{{ project.title }}</h1>
        <p v-reveal>{{ project.description }}</p>
        <div style="margin-top:20px;" v-reveal>
          <TechnologyBadge v-for="tech in project.technologies" :key="tech" :name="tech" />
        </div>
        <div class="hero-ctas" style="margin-top:20px;" v-reveal>
          <Button v-if="project.project_url" :href="project.project_url" tag="a" variant="ghost">Visit Live Project</Button>
          <Button v-if="project.github_url" :href="project.github_url" tag="a" variant="ghost">View on GitHub</Button>
        </div>
      </div>
    </section>

    <section v-if="project.featured_image" class="container" style="margin-bottom:80px;">
      <div
        style="border-radius:20px; overflow:hidden; aspect-ratio:16/9; background:linear-gradient(135deg,#1B2140,#3A2E7A);"
        v-reveal
      >
        <img :src="project.featured_image" :alt="project.title" style="width:100%; height:100%; object-fit:cover;" />
      </div>
    </section>

    <section class="section" style="padding-top:0;">
      <div class="container">
        <div class="why-grid" style="align-items:flex-start;">
          <div v-reveal>
            <h3 style="margin-bottom:16px;">The Challenge</h3>
            <p style="color:var(--paper-dim); line-height:1.7; margin-bottom:32px;">
              {{ project.client ? `${project.client} needed` : 'The client needed' }} a way to replace
              manual, disconnected processes with a single reliable system.
            </p>
            <h3 style="margin-bottom:16px;">The Solution</h3>
            <div v-if="project.long_description" v-html="project.long_description" style="color:var(--paper-dim); line-height:1.7;"></div>
          </div>
          <div v-reveal>
            <h4 style="margin-bottom:14px; font-size:15px;">Results</h4>
            <ul style="display:flex; flex-direction:column; gap:12px;">
              <li v-for="result in project.results" :key="result" style="font-size:14.5px; color:var(--paper-dim); display:flex; gap:10px; align-items:flex-start;">
                <span style="color:var(--teal); font-family:var(--mono);">✓</span>{{ result }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section v-if="relatedProjects.length" class="section" style="background:#F0F1F7; padding-top:80px; padding-bottom:80px;">
      <div class="container">
        <h3 style="margin-bottom:32px;" v-reveal>Related Projects</h3>
        <ProjectGrid :projects="relatedProjects" />
      </div>
    </section>

    <CTASection />
  </MainLayout>
</template>
