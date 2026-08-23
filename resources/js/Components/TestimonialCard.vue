<script setup>
defineProps({
  testimonial: { type: Object, required: true },
});
</script>

<template>
  <div class="service-card" v-reveal style="display:flex; flex-direction:column;">
    <div style="display:flex; gap:2px; margin-bottom:16px;">
      <svg v-for="n in testimonial.rating" :key="n" width="14" height="14" viewBox="0 0 24 24" fill="#35D8C6">
        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.77 5.82 21 7 14.14l-5-4.87 6.91-1.01L12 2z" />
      </svg>
    </div>
    <p style="font-size:15px; line-height:1.65; color:var(--paper-ink); margin-bottom:22px; flex:1;">
      &ldquo;{{ testimonial.testimonial }}&rdquo;
    </p>
    <div style="display:flex; align-items:center; gap:12px;">
      <img
        v-if="testimonial.avatar"
        :src="testimonial.avatar"
        :alt="testimonial.client_name"
        style="width:38px; height:38px; border-radius:50%; object-fit:cover;"
      />
      <div v-else style="width:38px; height:38px; border-radius:50%; background:linear-gradient(135deg,var(--indigo),var(--teal));"></div>
      <div>
        <div style="font-size:14px; font-weight:600;">{{ testimonial.client_name }}</div>
        <div style="font-size:12.5px; color:var(--paper-dim);">{{ testimonial.position }}<span v-if="testimonial.company">, {{ testimonial.company }}</span></div>
      </div>
    </div>
  </div>
</template>
