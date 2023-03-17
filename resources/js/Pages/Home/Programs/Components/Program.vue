<template>
  <Box>
    <template #header> Program Information </template>
    <div>
      <Link :href="route('program.show', { id: program.id })">
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
      </Link>
    </div>
  </Box>
</template>
<script setup>
import { defineProps } from "vue";
import Box from "@/Components/Box.vue";
import { Link } from "@inertiajs/vue3";

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
