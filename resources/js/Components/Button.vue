<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  href: { type: String, default: null },
  variant: { type: String, default: 'primary' }, // primary | ghost | on-dark | ghost-dark
  tag: { type: String, default: null }, // force 'a' | 'button'
});

const classMap = {
  primary: 'btn btn-primary',
  ghost: 'btn btn-ghost',
  'on-dark': 'btn btn-on-dark',
  'ghost-dark': 'btn btn-ghost-dark',
};
</script>

<template>
  <Link v-if="href && !tag" :href="href" :class="classMap[variant]">
    <slot />
  </Link>
  <a v-else-if="href && tag === 'a'" :href="href" :class="classMap[variant]">
    <slot />
  </a>
  <button v-else :class="classMap[variant]" type="button">
    <slot />
  </button>
</template>
