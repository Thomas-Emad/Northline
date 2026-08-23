<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
  companyName: { type: String, default: 'Northline' },
});

const scrolled = ref(false);
const menuOpen = ref(false);

function onScroll() {
  scrolled.value = window.scrollY > 40;
}

onMounted(() => window.addEventListener('scroll', onScroll));
onUnmounted(() => window.removeEventListener('scroll', onScroll));

const links = [
  { label: 'Home', href: '/' },
  { label: 'About', href: '/about' },
  { label: 'Services', href: '/services' },
  { label: 'Projects', href: '/projects' },
  { label: 'Contact', href: '/contact' },
];
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
          <Link href="/contact" class="btn btn-primary" style="padding:11px 20px; font-size:14px;">Let's Work Together</Link>
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
  </div>
</template>
