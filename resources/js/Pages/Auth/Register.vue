<template>
  <div class="w-1/4 mx-auto">
    <h1 class="text-white text-center font-medium text-2xl mb-2">
      Create Account
    </h1>
    <form @submit.prevent="register">
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
        <div>
          <label for="password_confirmation" class="label"
            >Confirm Password</label
          >
          <input
            v-model="form.password_confirmation"
            type="password"
            id="password_confirmation"
            class="input"
            placeholder="Enter confirm password"
          />
        </div>
        <div class="mt-4">
          <button type="submit" class="w-full btn-primary">
            Create account
          </button>
        </div>
      </div>
    </form>
    <div class="text-center mt-4">
      <span class="text-white"
        >Already have an account?
        <Link :href="route('login')" class="text-blue-300"
          >Login here</Link
        ></span
      >
    </div>
  </div>
</template>

<script setup>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
});
const register = () => form.post(route("register.store"));

defineOptions({ layout: AuthLayout });
</script>
