<template>
  <div class="text-gray-300 font-bold font-2xl">
    You are viewing all programs
  </div>
  <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 mt-5">
    <Program
      v-for="program in programs.data"
      :key="program.id"
      :program="program"
    >
    </Program>
  </div>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Program from "@/Pages/Home/Programs/Components/Program.vue";

defineOptions({ layout: MainLayout });

defineProps({
  programs: Object,
});
</script>
