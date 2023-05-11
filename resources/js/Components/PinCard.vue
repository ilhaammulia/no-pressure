<template>
  <div class="col-span-1 flex flex-col bg-white border-2 p-4 rounded-lg h-56 shadow-lg transform transition duration-500 cursor-pointer hover:scale-105">
    <div class="px-3 py-2 w-full">
      <div class="flex justify-between items-center mb-2">
        <p class="text-xs text-gray-400 font-bold">{{ pin.created_at }}</p>
        <PinDropdown :pin="pin" @update-pin="updatePin" />
      </div>
      <div class="font-bold text-lg mb-1 text-indigo-500">{{ pin.title }}</div>
      <div class="line-clamp-4">
        <p class="text-gray-500 text-sm text-md clamp-description">{{ pin.description }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import PinDropdown from '@/Components/PinDropdown.vue';


export default {
  name: "PinCard",
  props: ["pin"],
  components: { PinDropdown },
  methods: {
    updatePin(value) {
      this.$emit('update-pin', value);
    }
  }
};
</script>

<style>
.clamp-description {
  display: -webkit-box;
  overflow: hidden;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
}
</style>
