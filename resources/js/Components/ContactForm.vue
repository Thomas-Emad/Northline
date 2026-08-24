<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { useI18n } from '@/i18n';

const form = useForm({
  name: '',
  email: '',
  company: '',
  phone: '',
  project_type: '',
  budget: '',
  message: '',
});

const page = usePage();
const { t } = useI18n();

function submit() {
  form.post('/contact', {
    preserveScroll: true,
    onSuccess: () => form.reset(),
  });
}
</script>

<template>
  <form @submit.prevent="submit">
    <div v-if="page.props.flash?.success" class="form-success">
      {{ page.props.flash.success }}
    </div>

    <div class="form-row">
      <div class="form-field">
        <label for="name">{{ t('form.name') }}</label>
        <input id="name" v-model="form.name" type="text" required />
        <div v-if="form.errors.name" class="form-error">{{ form.errors.name }}</div>
      </div>
      <div class="form-field">
        <label for="email">{{ t('form.email') }}</label>
        <input id="email" v-model="form.email" type="email" required />
        <div v-if="form.errors.email" class="form-error">{{ form.errors.email }}</div>
      </div>
    </div>

    <div class="form-row">
      <div class="form-field">
        <label for="company">{{ t('form.company') }}</label>
        <input id="company" v-model="form.company" type="text" />
      </div>
      <div class="form-field">
        <label for="phone">{{ t('form.phone') }}</label>
        <input id="phone" v-model="form.phone" type="tel" />
      </div>
    </div>

    <div class="form-row">
      <div class="form-field">
        <label for="project_type">{{ t('form.project_type') }}</label>
        <select id="project_type" v-model="form.project_type">
          <option value="">{{ t('form.select_one') }}</option>
          <option v-for="type in t('form.project_types', [])" :key="type" :value="type">{{ type }}</option>
        </select>
      </div>
      <div class="form-field">
        <label for="budget">{{ t('form.budget') }}</label>
        <select id="budget" v-model="form.budget">
          <option value="">{{ t('form.select_range') }}</option>
          <option v-for="range in t('form.budget_ranges', [])" :key="range" :value="range">{{ range }}</option>
        </select>
      </div>
    </div>

    <div class="form-field">
      <label for="message">{{ t('form.message') }}</label>
      <textarea id="message" v-model="form.message" rows="5" required></textarea>
      <div v-if="form.errors.message" class="form-error">{{ form.errors.message }}</div>
    </div>

    <button type="submit" class="btn btn-primary" :disabled="form.processing" style="width:100%; justify-content:center;">
      {{ form.processing ? t('form.sending') : t('form.send') }}
    </button>
  </form>
</template>
