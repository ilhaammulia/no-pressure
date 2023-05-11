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
    }
  },
  components: { GridIcons, ListIcons }
}

</script>

<template>
  <div class="bg-gray-200 text-sm text-gray-500 leading-none border-2 border-gray-200 rounded-full inline-flex">
    <button @click="changeMode" class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-purple-600 focus:text-purple-600 rounded-l-full px-4 py-2" :class="{'active': showMode == 'grid'}">
      <GridIcons class="fill-current w-4 h-4 mr-1" />
      <span>Grid</span>
    </button>
    <button @click="changeMode" class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-purple-600 focus:text-purple-600 rounded-r-full px-4 py-2" :class="{'active': showMode == 'list'}">
      <ListIcons class="fill-current w-4 h-4 mr-1" />
      <span>List</span>
    </button>
  </div>
</template>

<style>
.active {
  background: white; 
  border-radius: 9999px; 
  color: #6366f1;
}
</style>