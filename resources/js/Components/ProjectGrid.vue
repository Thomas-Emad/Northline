<script setup>
import ProjectCard from '@/Components/ProjectCard.vue';

defineProps({
  projects: { type: Array, required: true },
  featuredLayout: { type: Boolean, default: false },
});
</script>

<template>
  <div class="projects-grid">
    <ProjectCard
      v-for="(project, i) in projects"
      :key="project.id"
      :project="project"
      :large="featuredLayout && i === 0"
    />
  </div>
</template>
