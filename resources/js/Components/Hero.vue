<script setup>
import Button from '@/Components/Button.vue';

defineProps({
    eyebrow: { type: String, required: true },
    title: { type: String, required: true },
    subtitle: { type: String, required: true },
});
</script>

<template>
    <section id="hero">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-copy">
                    <span class="eyebrow" v-reveal>{{ eyebrow }}</span>
                    <h1 v-reveal>
                        <template v-for="(word, i) in title" :key="i">
                            <span :class="{ grad: i >= title.length - 3 }">
                                {{ word }}
                            </span>
                            <span v-if="i < title.length - 1"> </span>
                        </template>
                    </h1>
                    <p v-reveal>{{ subtitle }}</p>
                    <div class="hero-ctas" v-reveal>
                        <Button href="/contact" variant="primary">Start a Project</Button>
                        <Button href="/projects" variant="ghost">Explore Our Work</Button>
                    </div>
                </div>
                <div class="hero-visual" v-reveal>
                    <svg viewBox="0 0 400 480" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="lineGrad" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="#5B54E8" stop-opacity="0.7" />
                                <stop offset="100%" stop-color="#35D8C6" stop-opacity="0.7" />
                            </linearGradient>
                        </defs>
                        <g stroke="url(#lineGrad)" stroke-width="1.2" fill="none" opacity="0.8">
                            <path d="M 70 90 L 200 170 L 330 110" />
                            <path d="M 200 170 L 180 300" />
                            <path d="M 180 300 L 90 380" />
                            <path d="M 180 300 L 300 360" />
                        </g>
                        <g fill="#8B85F5">
                            <circle cx="70" cy="90" r="4" />
                            <circle cx="330" cy="110" r="4" />
                            <circle cx="200" cy="170" r="5" />
                            <circle cx="180" cy="300" r="5" />
                            <circle cx="90" cy="380" r="4" />
                            <circle cx="300" cy="360" r="4" />
                        </g>
                    </svg>
                    <div class="float-card c1"><span class="dot"></span> API &middot; connected</div>
                    <div class="float-card c2"><span class="dot"></span> DB &middot; synced</div>
                    <div class="float-card c3"><span class="dot"></span> Deploy &middot; live</div>
                </div>
            </div>
        </div>
    </section>
</template>
