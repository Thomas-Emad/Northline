import '../css/app.css';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import revealDirective from './reveal';

createInertiaApp({
  title: (title) => (title ? `${title} — Northline` : 'Northline — Software Engineering Studio'),
  resolve: (name) =>
    resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .directive('reveal', revealDirective)
      .mount(el);
  },
  progress: {
    color: '#5B54E8',
  },
});
