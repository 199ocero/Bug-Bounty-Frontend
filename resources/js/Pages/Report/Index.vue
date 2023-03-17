<template>
  <div class="font-bold text-gray-300 font-2xl">
    You are viewing all reports you created
  </div>
  <div class="grid grid-cols-1 gap-5 mt-5 md:grid-cols-2 lg:grid-cols-3">
    <Report v-for="report in reports" :key="report.id" :report="report">
    </Report>
  </div>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Report from "@/Pages/Report/Reports/Components/Report.vue";

defineOptions({ layout: MainLayout });

defineProps({
  reports: Object,
});
</script>
