<template>
  <div class="p-4 border rounded-md shadow-sm border-gray-800 text-gray-300">
    <div class="mb-2 flex justify-between">
      <span class="text-sm font-medium text-gray-500">
        <slot name="header"></slot>
      </span>
      <span>
        <slot name="header-crud"></slot>
      </span>
    </div>
    <slot></slot>
  </div>
</template>
