<template>
  <Box>
    <template #header> Report Information </template>
    <template #header-crud>
      <div class="flex gap-3">
        <Link href="#" class="text-sm btn-primary-sm">Edit</Link>
        <Link
          :href="route('report.destroy', { id: report.id })"
          method="DELETE"
          as="button"
          class="text-sm btn-danger-sm"
          >Delete</Link
        >
      </div>
    </template>
    <div>
      <Link href="#">
        <div class="flex justify-between">
          <p>Report:</p>
          <p class="text-blue-300">{{ report.title }}</p>
        </div>
        <div class="flex justify-between">
          <p>Status:</p>
          <p class="text-green-300">{{ report.status }}</p>
        </div>
        <div class="flex justify-between">
          <p>Severity:</p>
          <p class="text-red-300">{{ report.severity }}</p>
        </div>
      </Link>
    </div>
  </Box>
</template>
<script setup>
import { defineProps } from "vue";
import Box from "@/Components/Box.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
  report: Object,
});
</script>
