import '../css/app.css';
import '../css/rtl.css';
import { createApp, h, watch } from 'vue';
import { createInertiaApp, usePage } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import revealDirective from './reveal';
import i18n from './i18n';

createInertiaApp({
  title: (title) => (title ? `${title} — Northline` : 'Northline — Software Engineering Studio'),
  resolve: (name) =>
    resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(i18n)
      .directive('reveal', revealDirective);

    app.mount(el);

    // Keep <html lang>/<html dir> in sync with the active locale on every
    // Inertia navigation (including the very first page load).
    const page = usePage();
    watch(
      () => [page.props.locale, page.props.direction],
      ([locale, direction]) => {
        if (locale) document.documentElement.lang = locale;
        if (direction) document.documentElement.dir = direction;
      },
      { immediate: true }
    );
  },
  progress: {
    color: '#5B54E8',
  },
});
