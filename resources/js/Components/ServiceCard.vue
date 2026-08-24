<script setup>
import { Link } from '@inertiajs/vue3';
import { useI18n } from '@/i18n';

defineProps({
  service: { type: Object, required: true },
});

const { t } = useI18n();
</script>

<template>
  <Link :href="`/services/${service.slug}`" class="service-card" v-reveal>
    <div class="service-icon">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#5B54E8" stroke-width="1.8">
        <circle cx="12" cy="12" r="9" />
      </svg>
    </div>
    <h3>{{ service.title }}</h3>
    <p>{{ service.short_description }}</p>
    <span class="service-link">
      {{ t('services_section.learn_more') }}
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M5 12h14M12 5l7 7-7 7" />
      </svg>
    </span>
  </Link>
</template>
