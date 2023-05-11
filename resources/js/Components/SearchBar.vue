<script>
import TextInput from './TextInput.vue';

export default {
  name: 'SearchBar',
  components: { TextInput },
  props: {
    classList: String
  }
}
</script>

<template>
  <div class="text-gray-600">
    <TextInput class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" placeholder="Search" />
  </div>
</template>