<template>
  <div class="w-1/4 mx-auto">
    <h1 class="text-white text-center font-medium text-2xl mb-2">Login</h1>
    <form @submit.prevent="login">
      <div class="grid grid-cols-1 gap-4">
        <div>
          <label for="email" class="label">Email</label>
          <input
            v-model="form.email"
            type="email"
            id="email"
            class="input"
            placeholder="Enter email"
          />
          <span class="error" v-if="form.errors.email">{{
            form.errors.email
          }}</span>
        </div>
        <div>
          <label for="password" class="label">Password</label>
          <input
            v-model="form.password"
            type="password"
            id="password"
            class="input"
            placeholder="Enter password"
          />
          <span class="error" v-if="form.errors.password">{{
            form.errors.password
          }}</span>
        </div>
        <div class="mt-4">
          <button type="submit" class="w-full btn-primary">Login</button>
        </div>
      </div>
    </form>
    <div class="text-center mt-4">
      <span class="text-white"
        >Not registered yet?
        <Link :href="route('register')" class="text-blue-300"
          >Register here</Link
        ></span
      >
    </div>
  </div>
</template>

<script setup>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import { Link } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";
const form = useForm({
  email: null,
  password: null,
});
const login = () => form.post(route("login.store"));
defineOptions({ layout: AuthLayout });
</script>
