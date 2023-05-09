<template>
  <div class="max-w-sm rounded overflow-hidden shadow-lg h-60">
    <div class="w-full h-24 bg-gradient-to-r from-purple-600 to-lime-600"></div>
    <div class="px-6 py-4">
      <div class="font-bold text-lg mb-1">{{ pin.title }}</div>
      <p class="text-gray-700 text-base">{{ pin.description }}</p>
    </div>
    <!-- <div class="px-6 pt-4 pb-2">
      <span
        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
      <span
        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
      <span
        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
    </div> -->
  </div>
</template>

<script>
export default {
  name: 'PinCard',
  props: ['pin'],
};
</script>
