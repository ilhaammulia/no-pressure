<template>
  <div class="max-w-sm overflow-hidden border-2 border-dashed border-gray-300 bg-transparent p-4 rounded-lg shadow-lg h-56 transform transition duration-500 hover:scale-105">
    <button @click="modalToggle" class="border-2 border-dashed px-2 rounded "><PlusIcons class="w-6 h-6 fill-gray-400" /></button>
    <div class="grid grid-rows-2">
      <div class="mt-2">
        <span class="text-md mt-1">New Pin!</span>
        <p class="text-sm text-gray-500">Write me something...</p>
      </div>
    </div>
    <div class="flex items-center justify-between">
      <button @click="modalToggle" class="border-2 border-dashed px-3 py-1 rounded text-gray-500">Create New</button>
    </div>
  </div>
</template>

<script>
import PlusIcons from '../Icons/PlusIcons.vue';

export default {
    name: "CreatePinCard",
    data() {
        return { isVisible: false };
    },
    methods: {
        modalToggle() {
            this.isVisible = !this.isVisible;
            this.$emit("modal-toggle", !this.isVisible);
        }
    },
    components: { PlusIcons }
};
</script>
