<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import ProjectGrid from '@/Components/ProjectGrid.vue';
import CTASection from '@/Components/CTASection.vue';

const props = defineProps({
  settings: { type: Object, required: true },
  projects: { type: Array, required: true },
});

const activeFilter = ref('All');

const categories = computed(() => {
  const set = new Set(props.projects.map((p) => p.category));
  return ['All', ...set];
});

const filteredProjects = computed(() => {
  if (activeFilter.value === 'All') return props.projects;
  return props.projects.filter((p) => p.category === activeFilter.value);
});
</script>

<template>
  <Head title="Projects" />
  <MainLayout :settings="settings">
    <section class="page-hero">
      <div class="container">
        <span class="eyebrow" v-reveal>Our Work</span>
        <h1 v-reveal>Our Work</h1>
        <p v-reveal>Explore some of the software solutions we've designed and developed.</p>
      </div>
    </section>

    <section class="section" style="padding-top: 0;">
      <div class="container">
        <div class="filter-bar" v-reveal>
          <button
            v-for="cat in categories"
            :key="cat"
            class="filter-pill"
            :class="{ active: activeFilter === cat }"
            @click="activeFilter = cat"
          >
            {{ cat }}
          </button>
        </div>
        <ProjectGrid :projects="filteredProjects" />
      </div>
    </section>

    <CTASection />
  </MainLayout>
</template>
