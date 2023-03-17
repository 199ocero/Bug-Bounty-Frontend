<template>
  <div class="text-gray-300 font-bold font-2xl">
    You are viewing all programs you created
  </div>
  <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 mt-5">
    <ProgramAllByUser
      v-for="program in programs"
      :key="program.id"
      :program="program"
    >
    </ProgramAllByUser>
  </div>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import ProgramAllByUser from "@/Pages/Home/Programs/Components/ProgramAllByUser.vue";

defineOptions({ layout: MainLayout });

defineProps({
  programs: Object,
});
</script>
