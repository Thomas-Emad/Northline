<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
  value: { type: [Number, String], required: true },
  suffix: { type: String, default: '' },
  label: { type: String, required: true },
});

const display = ref(0);
const el = ref(null);

onMounted(() => {
  const target = Number(props.value) || 0;
  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        let cur = 0;
        const step = Math.max(1, Math.round(target / 40));
        const timer = setInterval(() => {
          cur += step;
          if (cur >= target) {
            cur = target;
            clearInterval(timer);
          }
          display.value = cur;
        }, 30);
        io.unobserve(el.value);
      }
    });
  }, { threshold: 0.5 });
  if (el.value) io.observe(el.value);
});
</script>

<template>
  <div ref="el" v-reveal>
    <div class="stat-num"><span class="accent">{{ display }}</span>{{ suffix }}</div>
    <div class="stat-label">{{ label }}</div>
  </div>
</template>
