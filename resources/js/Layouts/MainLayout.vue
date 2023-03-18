<template>
  <header class="w-full bg-gray-800 border-b border-gray-700">
    <div class="container mx-auto">
      <nav class="flex items-center justify-between p-4">
        <div class="text-white">
          {{ user.data.name }}
        </div>
        <div class="text-lg font-bold text-blue-400">
          <Link :href="route('program.index')">Bug Bounty</Link>
        </div>
        <div v-if="user" class="flex items-center gap-4 text-base">
          <Link :href="route('report.index')" class="font-medium btn-primary-sm"
            >My Reports</Link
          >
          <Link
            :href="route('program.show.all')"
            class="font-medium btn-primary-sm"
            >My Programs</Link
          >
          <Link
            :href="route('program.create')"
            class="font-medium btn-primary-sm"
            >+ New Program</Link
          >
          <span class="text-gray-600">|</span>
          <div class="font-medium text-red-400">
            <Link :href="route('logout')" method="DELETE" as="button"
              >Logout</Link
            >
          </div>
        </div>
      </nav>
    </div>
  </header>
  <main class="container p-4 mx-auto">
    <div
      v-if="flashSuccess"
      class="p-3 mb-2 text-green-700 bg-green-200 rounded-md"
    >
      {{ flashSuccess }}
    </div>
    <slot></slot>
  </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const flashSuccess = computed(() => usePage().props.flash.success);
const user = computed(() => usePage().props.user);
</script>
