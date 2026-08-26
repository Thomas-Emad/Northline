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
import { useI18n } from '@/i18n';

defineProps({
    settings: { type: Object, required: true },
    services: { type: Array, required: true },
    projects: { type: Array, required: true },
    testimonials: { type: Array, default: () => [] },
});

const { t } = useI18n();
</script>

<template>

    <Head title="Home" />
    <MainLayout :settings="settings">
        <Hero :eyebrow="settings.hero_eyebrow" :title="settings.hero_title" :subtitle="settings.hero_subtitle" />

        <section id="services" class="section">
            <div class="container">
                <SectionHeader :eyebrow="t('services_section.eyebrow', 'Services')"
                    :title="t('services_section.title', 'Software solutions built around your business')"
                    :description="t('services_section.description', 'We build software around your business, not the other way around.')" />
                <div class="services-grid">
                    <ServiceCard v-for="service in services" :key="service.id" :service="service" />
                </div>
            </div>
        </section>

        <section id="why" class="section">
            <div class="container">
                <div class="why-grid">
                    <div>
                        <SectionHeader on-dark :eyebrow="t('why_section.eyebrow', 'Why Northline')"
                            :title="t('why_section.title', 'Technology is easy. Building the right solution isn\'t.')"
                            :description="t('why_section.description', 'We spend as much time understanding your business as we do writing code.')" />
                        <div class="why-list" v-reveal>
                            <div v-for="(item, i) in t('why_section.items', [])" :key="item.title" class="why-item">
                                <span class="why-num">{{ String(i + 1).padStart(2, '0') }}</span>
                                <div>
                                    <h4>{{ item.title }}</h4>
                                    <p>{{ item.description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" style="background:#F0F1F7;">
            <div class="container">
                <SectionHeader :eyebrow="t('process_section.eyebrow', 'Process')"
                    :title="t('process_section.title', 'From idea to production')"
                    :description="t('process_section.description', 'A consistent, transparent sequence for every engagement.')" />
                <div class="process-track" v-reveal>
                    <ProcessStep v-for="step in t('process_section.steps', [])" :key="step.number" :number="step.number"
                        :title="step.title" :description="step.description" />
                </div>
            </div>
        </section>

        <section id="projects" class="section">
            <div class="container">
                <SectionHeader :eyebrow="t('projects_section.eyebrow', 'Selected Work')"
                    :title="t('projects_section.title', 'Projects we\'re proud of')"
                    :description="t('projects_section.description', 'A sample of the systems we\'ve designed, built, and kept running.')" />
                <ProjectGrid :projects="projects" featured-layout />
                <div style="text-align:center; margin-top:48px;" v-reveal>
                    <Button href="/projects" variant="ghost">
                        {{ t('projects_section.view_all', 'View All Projects') }}
                    </Button>
                </div>
            </div>
        </section>

        <section v-if="testimonials.length" class="section" style="background:#F0F1F7;">
            <div class="container">
                <SectionHeader :eyebrow="t('testimonials_section.eyebrow', 'Client Voices')"
                    :title="t('testimonials_section.title', 'What clients say')" center />
                <div class="services-grid">
                    <TestimonialCard v-for="tItem in testimonials" :key="tItem.id" :testimonial="tItem" />
                </div>
            </div>
        </section>

        <section id="tech" class="section">
            <div class="container">
                <SectionHeader :eyebrow="t('tech_section.eyebrow', 'Stack')"
                    :title="t('tech_section.title', 'Technology we build with')" />
                <div class="tech-cols" v-reveal>
                    <div v-for="category in settings.tech_stack" :key="category.key">
                        <div class="tech-col-title">{{ t(`tech_section.${category.key}`, category.key) }}</div>
                        <div>
                            <TechnologyBadge v-for="item in category.items" :key="item" :name="item" />
                        </div>
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
