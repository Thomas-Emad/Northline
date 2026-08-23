<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  project: { type: Object, required: true },
  large: { type: Boolean, default: false },
});
</script>

<template>
  <Link :href="`/projects/${project.slug}`" class="project-card" :class="{ large }" v-reveal>
    <div
      class="project-media"
      :style="project.featured_image
        ? { backgroundImage: `url(${project.featured_image})` }
        : { background: 'linear-gradient(135deg,#1B2140,#3A2E7A)' }"
    ></div>
    <div class="project-overlay">
      <span class="project-cat">{{ project.category }}</span>
      <h3>{{ project.title }}</h3>
      <p>{{ project.description }}</p>
      <div class="project-tech">
        <span v-for="tech in (project.technologies || []).slice(0, 3)" :key="tech">{{ tech }}</span>
      </div>
    </div>
  </Link>
</template>
