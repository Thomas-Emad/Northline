<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import ContactForm from '@/Components/ContactForm.vue';
import { useI18n } from '@/i18n';

defineProps({
  settings: { type: Object, required: true },
});

const { t } = useI18n();
</script>

<template>
  <Head title="Contact" />
  <MainLayout :settings="settings">
    <section class="page-hero" style="padding-bottom: 60px;">
      <div class="container">
        <span class="eyebrow" v-reveal>{{ t('contact_page.eyebrow') }}</span>
        <h1 v-reveal>{{ t('contact_page.title') }}</h1>
        <p v-reveal>{{ t('contact_page.description') }}</p>
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
                  <h4>{{ t('contact_page.email') }}</h4>
                  <p>{{ settings.email }}</p>
                </div>
              </div>
              <div class="info-item">
                <div>
                  <h4>{{ t('contact_page.phone') }}</h4>
                  <p>{{ settings.phone }}</p>
                </div>
              </div>
              <div class="info-item">
                <div>
                  <h4>{{ t('contact_page.location') }}</h4>
                  <p>{{ settings.address }}</p>
                </div>
              </div>
              <div class="info-item">
                <div>
                  <h4>{{ t('contact_page.working_hours') }}</h4>
                  <p>{{ t('contact_page.working_hours_value') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>
