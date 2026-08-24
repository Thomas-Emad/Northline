<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import ProjectGrid from '@/Components/ProjectGrid.vue';
import CTASection from '@/Components/CTASection.vue';
import { useI18n } from '@/i18n';

const props = defineProps({
  settings: { type: Object, required: true },
  projects: { type: Array, required: true },
});

const { t } = useI18n();

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
        <span class="eyebrow" v-reveal>{{ t('projects_page.eyebrow') }}</span>
        <h1 v-reveal>{{ t('projects_page.title') }}</h1>
        <p v-reveal>{{ t('projects_page.description') }}</p>
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
            {{ cat === 'All' ? t('projects_page.filter_all') : cat }}
          </button>
        </div>
        <ProjectGrid :projects="filteredProjects" />
      </div>
    </section>

    <CTASection />
  </MainLayout>
</template>
