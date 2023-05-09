<template>
  <div class="max-w-sm overflow-hidden border-2 border-dashed border-gray-300 bg-transparent p-4 rounded-lg shadow-md">
    <button class="border-2 border-dashed px-3 py-1 rounded"><i class="fa fa-solid fa-plus text-2xl text-gray-400 font-light"></i></button>
    <div class="grid grid-rows-2">
      <div class="mt-3">
        <span class="text-md">New Pin!</span>
        <p class="text-sm text-gray-500">Write me something...</p>
      </div>
    </div>
    <div class="flex items-center justify-between">
      <button class="border-2 border-dashed px-3 py-1 rounded text-gray-500">Create New</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CreatePinCard',
};
</script>
