<script setup>
import { useForm, usePage } from '@inertiajs/vue3';

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
        <label for="name">Name</label>
        <input id="name" v-model="form.name" type="text" required />
        <div v-if="form.errors.name" class="form-error">{{ form.errors.name }}</div>
      </div>
      <div class="form-field">
        <label for="email">Email</label>
        <input id="email" v-model="form.email" type="email" required />
        <div v-if="form.errors.email" class="form-error">{{ form.errors.email }}</div>
      </div>
    </div>

    <div class="form-row">
      <div class="form-field">
        <label for="company">Company</label>
        <input id="company" v-model="form.company" type="text" />
      </div>
      <div class="form-field">
        <label for="phone">Phone</label>
        <input id="phone" v-model="form.phone" type="tel" />
      </div>
    </div>

    <div class="form-row">
      <div class="form-field">
        <label for="project_type">Project Type</label>
        <select id="project_type" v-model="form.project_type">
          <option value="">Select one</option>
          <option>Custom Software</option>
          <option>Web Application</option>
          <option>ERP System</option>
          <option>Integration</option>
          <option>Automation</option>
          <option>Dashboard / Analytics</option>
          <option>Other</option>
        </select>
      </div>
      <div class="form-field">
        <label for="budget">Budget</label>
        <select id="budget" v-model="form.budget">
          <option value="">Select a range</option>
          <option>Under $10k</option>
          <option>$10k – $30k</option>
          <option>$30k – $75k</option>
          <option>$75k+</option>
        </select>
      </div>
    </div>

    <div class="form-field">
      <label for="message">Message</label>
      <textarea id="message" v-model="form.message" rows="5" required></textarea>
      <div v-if="form.errors.message" class="form-error">{{ form.errors.message }}</div>
    </div>

    <button type="submit" class="btn btn-primary" :disabled="form.processing" style="width:100%; justify-content:center;">
      {{ form.processing ? 'Sending…' : 'Send Message' }}
    </button>
  </form>
</template>
