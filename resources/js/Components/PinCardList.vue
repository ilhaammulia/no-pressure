<template>
  <div class="flex flex-col p-4 md:p-5 bg-white shadow-xl rounded-2xl transform transition duration-500 cursor-pointer hover:scale-105">
    <p class="text-xs text-gray-400 font-bold ml-3">{{ pin.created_at }}</p>
    <div class="flex items-center justify-between">
      <div class="flex items-center gap-6">
        <div class="flex flex-col ml-3 gap-2 py-2">
          <div class="font-bold leading-none text-indigo-500">{{ pin.title }}</div>
          <p class="text-sm text-gray-600 clamp-description w-2/3">{{ pin.description }}</p>
        </div>
      </div>
      <PinDropdown align="right" :pin="pin" @update-pin="updatePin" />
    </div>
  </div>
</template>

<script>
import PinDropdown from '@/Components/PinDropdown.vue';
export default {
  name: "PinCardList",
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
