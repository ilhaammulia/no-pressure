<script>
import GridIcons from "@/Icons/GridIcons.vue";
import ListIcons from "@/Icons/ListIcons.vue";

export default {
  data() {
    return { showMode: 'grid' }
  },
  methods: {
    changeMode() {
      this.showMode = this.showMode === 'grid' ? 'list' : 'grid'
      this.$emit('mode-toggle', this.showMode);
    },
    modalToggle() {
      this.$emit("modal-toggle");
    }
  },
  components: { GridIcons, ListIcons }
}

</script>

<template>
  <div class="flex gap-4 ">
    <div class="bg-gray-200 text-sm text-gray-500 leading-none border-2 border-gray-200 rounded-full inline-flex">
      <button @click="changeMode"
        class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-indigo-600 focus:text-indigo-600 rounded-l-full px-4 py-2"
        :class="{ 'active': showMode == 'grid' }">
        <GridIcons class="fill-current w-4 h-4 mr-1" />
        <span>Grid</span>
      </button>
      <button @click="changeMode"
        class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-indigo-600 focus:text-indigo-600 rounded-r-full px-4 py-2"
        :class="{ 'active': showMode == 'list' }">
        <ListIcons class="fill-current w-4 h-4 mr-1" />
        <span>List</span>
      </button>
    </div>
    <button @click="modalToggle" class="bg-indigo-500 hover:bg-indigo-600 rounded-lg px-5 py-1 text-white font-extrabold">Add New</button>
  </div>
</template>

<style>
.active {
  background: white;
  border-radius: 9999px;
  color: #6366f1;
}</style>