<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import ContactForm from '@/Components/ContactForm.vue';

defineProps({
  settings: { type: Object, required: true },
});
</script>

<template>
  <Head title="Contact" />
  <MainLayout :settings="settings">
    <section class="page-hero" style="padding-bottom: 60px;">
      <div class="container">
        <span class="eyebrow" v-reveal>Contact</span>
        <h1 v-reveal>Let's build something great together.</h1>
        <p v-reveal>Have a project, business challenge, or idea? Tell us about it.</p>
      </div>
    </section>

    <section class="section" style="padding-top:0;">
      <div class="container">
        <div class="contact-grid">
          <div v-reveal>
            <ContactForm />
          </div>
          <div v-reveal>
            <div class="info-card">
              <div class="info-item">
                <div>
                  <h4>Email</h4>
                  <p>{{ settings.email }}</p>
                </div>
              </div>
              <div class="info-item">
                <div>
                  <h4>Phone</h4>
                  <p>{{ settings.phone }}</p>
                </div>
              </div>
              <div class="info-item">
                <div>
                  <h4>Location</h4>
                  <p>{{ settings.address }}</p>
                </div>
              </div>
              <div class="info-item">
                <div>
                  <h4>Working Hours</h4>
                  <p>Mon &ndash; Fri, 9am &ndash; 6pm</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>
