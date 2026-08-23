<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Hero from '@/Components/Hero.vue';
import StatCard from '@/Components/StatCard.vue';
import SectionHeader from '@/Components/SectionHeader.vue';
import ServiceCard from '@/Components/ServiceCard.vue';
import ProjectGrid from '@/Components/ProjectGrid.vue';
import ProcessStep from '@/Components/ProcessStep.vue';
import TechnologyBadge from '@/Components/TechnologyBadge.vue';
import TestimonialCard from '@/Components/TestimonialCard.vue';
import CTASection from '@/Components/CTASection.vue';
import Button from '@/Components/Button.vue';

defineProps({
    settings: { type: Object, required: true },
    services: { type: Array, required: true },
    projects: { type: Array, required: true },
    testimonials: { type: Array, default: () => [] },
});

const processSteps = [
    { number: '01', title: 'Discovery', description: 'Understand the business, requirements, users, and objectives.' },
    { number: '02', title: 'Architecture', description: 'Design the system architecture, database structure, APIs, and technical foundation.' },
    { number: '03', title: 'Design', description: 'Create a clear and intuitive user experience.' },
    { number: '04', title: 'Development', description: 'Build the solution using modern and reliable technologies.' },
    { number: '05', title: 'Testing', description: 'Test functionality, performance, security, and edge cases.' },
    { number: '06', title: 'Deployment', description: 'Deploy the system and make it production-ready.' },
    { number: '07', title: 'Support', description: 'Continue improving, maintaining, and scaling the product.' },
];

const whyItems = [
    { title: 'Business-focused development', description: 'Every technical decision is tied back to a business outcome you care about.' },
    { title: 'Scalable architecture', description: 'Systems designed to handle growth in users, data, and complexity.' },
    { title: 'Clean, maintainable code', description: 'Code your team — or ours — can safely extend for years.' },
    { title: 'Security-focused development', description: 'Security considered from the architecture stage, not bolted on after.' },
    { title: 'Long-term support', description: 'We stay involved after launch to maintain, improve and scale the product.' },
];

const techStack = {
    Frontend: ['Vue.js', 'React', 'TypeScript'],
    Backend: ['Laravel', 'PHP', 'Node.js'],
    Database: ['MySQL', 'PostgreSQL', 'Redis'],
    Infrastructure: ['Docker', 'Linux', 'Cloud'],
};
</script>

<template>

    <Head title="Home" />
    <MainLayout :settings="settings">
        <Hero :eyebrow="settings.hero_eyebrow" :title="settings.hero_title" :subtitle="settings.hero_subtitle" />

        <section id="stats">
            <div class="container stats-grid">
                <StatCard v-for="stat in settings.stats" :key="stat.label" :value="stat.value" :suffix="stat.suffix"
                    :label="stat.label" />
            </div>
        </section>

        <section id="services" class="section">
            <div class="container">
                <SectionHeader eyebrow="Services" title="Software solutions built around your business"
                    description="We don't ship one-size-fits-all software. Every engagement starts with your workflows, your data, and your constraints — then we build around them." />
                <div class="services-grid">
                    <ServiceCard v-for="service in services" :key="service.id" :service="service" />
                </div>
            </div>
        </section>

        <section id="why" class="section">
            <div class="container">
                <div class="why-grid">
                    <div>
                        <SectionHeader on-dark eyebrow="Why Northline"
                            title="Technology is easy. Building the right solution isn't."
                            description="We spend as much time understanding your business as we do writing code — because the wrong solution, built well, is still the wrong solution." />
                        <div class="why-list" v-reveal>
                            <div v-for="(item, i) in whyItems" :key="item.title" class="why-item">
                                <span class="why-num">{{ String(i + 1).padStart(2, '0') }}</span>
                                <div>
                                    <h4>{{ item.title }}</h4>
                                    <p>{{ item.description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="why-visual" v-reveal>
                        <svg viewBox="0 0 500 420" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="wg" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%" stop-color="#5B54E8" stop-opacity="0.6" />
                                    <stop offset="100%" stop-color="#35D8C6" stop-opacity="0.6" />
                                </linearGradient>
                            </defs>
                            <g stroke="url(#wg)" stroke-width="1" fill="none" opacity="0.7">
                                <rect x="60" y="60" width="120" height="70" rx="8" />
                                <rect x="220" y="40" width="120" height="70" rx="8" />
                                <rect x="220" y="150" width="120" height="70" rx="8" />
                                <rect x="60" y="200" width="120" height="70" rx="8" />
                                <rect x="140" y="290" width="220" height="70" rx="8" />
                                <path d="M180 95 L220 75" />
                                <path d="M280 110 L280 150" />
                                <path d="M220 185 L180 220" />
                                <path d="M180 260 L220 300" />
                                <path d="M280 220 L280 290" />
                            </g>
                            <g fill="#8B85F5" opacity="0.9">
                                <circle cx="120" cy="95" r="3" />
                                <circle cx="280" cy="75" r="3" />
                                <circle cx="280" cy="185" r="3" />
                                <circle cx="120" cy="235" r="3" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" style="background:#F0F1F7;">
            <div class="container">
                <SectionHeader eyebrow="Process" title="From idea to production"
                    description="A consistent, transparent sequence — the same seven steps for every engagement, so you always know what comes next." />
                <div class="process-track" v-reveal>
                    <ProcessStep v-for="step in processSteps" :key="step.number" v-bind="step" />
                </div>
            </div>
        </section>

        <section id="projects" class="section">
            <div class="container">
                <SectionHeader eyebrow="Selected Work" title="Projects we're proud of"
                    description="A sample of the systems we've designed, built, and kept running." />
                <ProjectGrid :projects="projects" featured-layout />
                <div style="text-align:center; margin-top:48px;" v-reveal>
                    <Button href="/projects" variant="ghost">View All Projects</Button>
                </div>
            </div>
        </section>

        <section v-if="testimonials.length" class="section" style="background:#F0F1F7;">
            <div class="container">
                <SectionHeader eyebrow="Client Voices" title="What clients say" center />
                <div class="services-grid">
                    <TestimonialCard v-for="t in testimonials" :key="t.id" :testimonial="t" />
                </div>
            </div>
        </section>

        <section id="tech" class="section">
            <div class="container">
                <SectionHeader eyebrow="Stack" title="Technology we build with" />
                <div class="tech-cols" v-reveal>
                    <div v-for="(items, category) in techStack" :key="category">
                        <div class="tech-col-title">{{ category }}</div>
                        <div>
                            <TechnologyBadge v-for="item in items" :key="item" :name="item" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <CTASection />
    </MainLayout>
</template>
