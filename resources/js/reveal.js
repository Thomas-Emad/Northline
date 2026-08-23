// v-reveal: adds the `reveal` class and toggles `in` once the element
// scrolls into view, matching the fade-up behaviour used across the site.
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        observer.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.15 }
);

export default {
  mounted(el) {
    el.classList.add('reveal');
    observer.observe(el);
  },
  unmounted(el) {
    observer.unobserve(el);
  },
};
