<template>
  <h1 class="my-5 text-2xl font-medium text-center text-white">
    Edit and Update
  </h1>
  <div class="w-1/2 mx-auto">
    <form @submit.prevent="update">
      <div class="grid grid-cols-1 gap-4">
        <div>
          <label for="name" class="label">Name</label>
          <input
            v-model="form.name"
            type="text"
            id="name"
            class="input"
            placeholder="Enter name"
          />
          <span class="error" v-if="form.errors.name">{{
            form.errors.name
          }}</span>
        </div>
        <div>
          <label for="pentesting_start_date" class="label"
            >Pen Testing Start Date & Time</label
          >
          <input
            v-model="form.pentesting_start_date"
            type="datetime-local"
            id="pentesting_start_date"
            class="input"
          />
          <span class="error" v-if="form.errors.pentesting_start_date">{{
            form.errors.pentesting_start_date
          }}</span>
        </div>
        <div>
          <label for="pentesting_start_date" class="label"
            >Pen Testing End Date & Time</label
          >
          <input
            v-model="form.pentesting_end_date"
            type="datetime-local"
            id="pentesting_end_date"
            class="input"
          />
          <span class="error" v-if="form.errors.pentesting_end_date">{{
            form.errors.pentesting_end_date
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
  program: Object,
});

const form = useForm({
  name: props.program.name,
  pentesting_start_date: props.program.pentesting_start_date.slice(0, -3),
  pentesting_end_date: props.program.pentesting_end_date.slice(0, -3),
});

const update = () =>
  form.put(route("program.update", { id: props.program.id }));

defineOptions({ layout: MainLayout });
</script>
