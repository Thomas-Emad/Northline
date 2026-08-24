import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

function get(obj, path) {
  return path.split('.').reduce((acc, key) => (acc && acc[key] !== undefined ? acc[key] : undefined), obj);
}

/**
 * useI18n() — reads `locale` and `translations` shared by
 * HandleInertiaRequests::share() on every Inertia response.
 *
 *   const { t, locale, dir } = useI18n();
 *   t('nav.home') // -> "Home" or "الرئيسية"
 */
export function useI18n() {
  const page = usePage();

  const locale = computed(() => page.props.locale || 'en');
  const dir = computed(() => page.props.direction || 'ltr');
  const translations = computed(() => page.props.translations || {});

  function t(key, fallback = '') {
    const value = get(translations.value, key);
    if (value !== undefined) return value;
    // Only fall back to printing the key itself when no explicit fallback
    // was given AND the caller didn't ask for a list — this stops
    // `v-for="x in t('foo.bar')"` from ever iterating over a string.
    if (Array.isArray(fallback)) return fallback;
    return fallback || key;
  }

  return { t, locale, dir, translations };
}

/**
 * Vue plugin so templates can use the global $t() without importing
 * useI18n() in every single-file component.
 */
export default {
  install(app) {
    app.mixin({
      computed: {
        $t() {
          const { t } = useI18n();
          return t;
        },
        $locale() {
          const { locale } = useI18n();
          return locale.value;
        },
        $dir() {
          const { dir } = useI18n();
          return dir.value;
        },
      },
    });
  },
};
