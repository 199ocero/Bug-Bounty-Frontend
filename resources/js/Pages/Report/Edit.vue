<template>
  <h1 class="my-5 text-2xl font-medium text-center text-white">
    Edit and Update Report
  </h1>
  <div class="w-1/2 mx-auto">
    <form @submit.prevent="update">
      <div class="grid grid-cols-1 gap-4">
        <div>
          <label for="name" class="label">Name</label>
          <input
            v-model="form.title"
            type="text"
            id="name"
            class="input"
            placeholder="Enter report name"
          />
          <span class="error" v-if="form.errors.title">{{
            form.errors.title
          }}</span>
        </div>
        <div>
          <label for="severity" class="label">Severity</label>
          <select v-model="form.severity" id="severity" class="input">
            <option value="">Select severity</option>
            <option
              v-for="option in severityOptions"
              :value="option.value"
              :key="option.id"
            >
              {{ option.label }}
            </option>
          </select>
          <span class="error" v-if="form.errors.severity">{{
            form.errors.severity
          }}</span>
        </div>

        <div>
          <label for="severity" class="label">Status</label>
          <select v-model="form.status" id="status" class="input">
            <option value="">Select status</option>
            <option
              v-for="option in statusOptions"
              :value="option.value"
              :key="option.id"
            >
              {{ option.label }}
            </option>
          </select>
          <span class="error" v-if="form.errors.status">{{
            form.errors.status
          }}</span>
        </div>

        <div class="mt-4">
          <button type="submit" class="w-full btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
  report: Object,
});
const form = useForm({
  title: props.report.title,
  severity: props.report.severity,
  status: props.report.status,
});

const severityOptions = [
  { label: "Critical", value: "Critical", id: 1 },
  { label: "High", value: "High", id: 2 },
  { label: "Medium", value: "Medium", id: 3 },
  { label: "Low", value: "Low", id: 4 },
  { label: "None", value: "nNoneone", id: 5 },
];

const statusOptions = [
  { label: "New", value: "New", id: 1 },
  { label: "Resolved", value: "Resolved", id: 2 },
];

const update = () => form.put(route("report.update", { id: props.report.id }));

defineOptions({ layout: MainLayout });
</script>
