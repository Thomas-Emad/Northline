<script setup>
import { Link } from '@inertiajs/vue3';
import { useI18n } from '@/i18n';

const props = defineProps({
  settings: { type: Object, required: true },
});

const { t } = useI18n();
</script>

<template>
  <footer id="contact-footer">
    <div class="container">
      <div class="footer-grid">
        <div>
          <Link href="/" class="logo"><span class="logo-mark"></span>{{ settings.company_name }}</Link>
          <p class="footer-desc">{{ settings.footer_description }}</p>
        </div>
        <div class="footer-col">
          <div class="footer-col-title">{{ t('footer.company') }}</div>
          <Link href="/about">{{ t('footer.about') }}</Link>
          <Link href="/services">{{ t('footer.services') }}</Link>
          <Link href="/projects">{{ t('footer.projects') }}</Link>
          <Link href="/careers">{{ t('footer.careers') }}</Link>
        </div>
        <div class="footer-col">
          <div class="footer-col-title">{{ t('footer.resources') }}</div>
          <Link href="/blog">{{ t('footer.blog') }}</Link>
          <Link href="/insights">{{ t('footer.insights') }}</Link>
          <Link href="/faqs">{{ t('footer.faqs') }}</Link>
        </div>
        <div class="footer-col">
          <div class="footer-col-title">{{ t('footer.contact') }}</div>
          <div>{{ settings.email }}</div>
          <div>{{ settings.phone }}</div>
          <div>{{ settings.address }}</div>
        </div>
      </div>
      <div class="footer-bottom">
        <span>&copy; {{ new Date().getFullYear() }} {{ settings.company_name }}. {{ t('footer.rights') }}</span>
        <div class="socials">
          <a v-if="settings.social_links?.linkedin" :href="settings.social_links.linkedin" aria-label="LinkedIn">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.24 8.25h4.5V23H.24V8.25zM8.25 8.25h4.3v2.02h.06c.6-1.13 2.07-2.32 4.26-2.32 4.55 0 5.39 3 5.39 6.9V23h-4.5v-6.9c0-1.65-.03-3.77-2.3-3.77-2.3 0-2.65 1.8-2.65 3.65V23h-4.5V8.25z"/></svg>
          </a>
          <a v-if="settings.social_links?.github" :href="settings.social_links.github" aria-label="GitHub">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.57.1.78-.25.78-.55v-2.15c-3.2.7-3.88-1.35-3.88-1.35-.52-1.34-1.28-1.7-1.28-1.7-1.04-.72.08-.7.08-.7 1.15.08 1.76 1.18 1.76 1.18 1.02 1.76 2.68 1.25 3.34.95.1-.74.4-1.25.72-1.54-2.56-.29-5.25-1.28-5.25-5.69 0-1.26.45-2.28 1.18-3.08-.12-.29-.51-1.46.11-3.04 0 0 .96-.31 3.15 1.18a10.9 10.9 0 0 1 5.74 0c2.19-1.49 3.15-1.18 3.15-1.18.62 1.58.23 2.75.11 3.04.73.8 1.18 1.82 1.18 3.08 0 4.42-2.69 5.4-5.26 5.68.42.36.78 1.08.78 2.18v3.23c0 .3.21.66.79.55A10.52 10.52 0 0 0 23.5 12c0-6.27-5.23-11.5-11.5-11.5z"/></svg>
          </a>
          <a v-if="settings.social_links?.facebook" :href="settings.social_links.facebook" aria-label="Facebook">FB</a>
          <a v-if="settings.social_links?.instagram" :href="settings.social_links.instagram" aria-label="Instagram">IG</a>
        </div>
      </div>
    </div>
  </footer>
</template>
