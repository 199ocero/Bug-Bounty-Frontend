<template>
  <Box>
    <template #header> Program Information </template>
    <div>
      <div class="flex justify-between">
        <p>Name:</p>
        <p class="text-blue-300">{{ program.name }}</p>
      </div>
      <div class="flex justify-between">
        <p>Start:</p>
        <p class="text-green-300">
          {{ formattedDate(program.pentesting_start_date) }}
        </p>
      </div>
      <div class="flex justify-between">
        <p>End:</p>
        <p class="text-red-300">
          {{ formattedDate(program.pentesting_end_date) }}
        </p>
      </div>
      <div class="flex justify-between">
        <p>Created by:</p>
        <p class="text-orange-300">{{ program.user.name }}</p>
      </div>
    </div>
  </Box>
  <div class="grid grid-cols-4 gap-4 mt-5" v-if="program.report.length != 0">
    <div v-for="report in program.report" :key="report.id">
      <Box class="mb-5">
        <template #header> Report Information </template>
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
      </Box>
    </div>
  </div>

  <div v-else class="mt-5">
    <Box>
      <template #header> Report Information </template>
      <div>No report found.</div>
    </Box>
  </div>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Box from "@/Components/Box.vue";
defineOptions({ layout: MainLayout });

defineProps({
  program: Object,
});

const formattedDate = (dateValue) => {
  const date = new Date(dateValue);
  const options = {
    year: "numeric",
    month: "long",
    day: "numeric",
    hour: "numeric",
    minute: "numeric",
    hour12: true,
  };
  return date.toLocaleString("en-PH", options);
};
</script>
