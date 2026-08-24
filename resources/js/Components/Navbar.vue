<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useI18n } from '@/i18n';
import LocaleSwitcher from '@/Components/LocaleSwitcher.vue';

defineProps({
  companyName: { type: String, default: 'Northline' },
});

const { t } = useI18n();

const scrolled = ref(false);
const menuOpen = ref(false);

function onScroll() {
  scrolled.value = window.scrollY > 40;
}

onMounted(() => window.addEventListener('scroll', onScroll));
onUnmounted(() => window.removeEventListener('scroll', onScroll));

const links = computed(() => [
  { label: t('nav.home'), href: '/' },
  { label: t('nav.about'), href: '/about' },
  { label: t('nav.services'), href: '/services' },
  { label: t('nav.projects'), href: '/projects' },
  { label: t('nav.contact'), href: '/contact' },
]);
</script>

<template>
  <header id="navbar" :class="{ scrolled }">
    <div class="container">
      <div class="nav-inner">
        <Link href="/" class="logo">
          <span class="logo-mark"></span>{{ companyName }}
        </Link>
        <nav class="nav-links">
          <Link v-for="link in links" :key="link.href" :href="link.href">{{ link.label }}</Link>
        </nav>
        <div style="display:flex; align-items:center; gap:14px;">
          <LocaleSwitcher />
          <Link href="/contact" class="btn btn-primary" style="padding:11px 20px; font-size:14px;">{{ t('nav.cta') }}</Link>
          <button
            id="mobile-toggle"
            aria-label="Open menu"
            @click="menuOpen = !menuOpen"
          >
            <span class="hamburger" :class="{ open: menuOpen }"><span></span><span></span><span></span></span>
          </button>
        </div>
      </div>
    </div>
  </header>

  <div id="mobile-menu" :class="{ open: menuOpen }">
    <Link v-for="link in links" :key="link.href" :href="link.href" @click="menuOpen = false">
      {{ link.label }}
    </Link>
    <div style="margin-top:20px;">
      <LocaleSwitcher />
    </div>
  </div>
</template>
