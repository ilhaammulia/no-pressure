<script>
  import Dropdown from '@/Components/Dropdown.vue'
  import DropdownLink from '@/Components/DropdownLink.vue';
  import DeleteIcons from '@/Icons/DeleteIcons.vue';
  import ElipsisIcons from '@/Icons/ElipsisIcons.vue';
  import { useForm } from '@inertiajs/inertia-vue3';

  export default {
    setup(props) {
      const form = useForm({
        id: props.pin.id
      });

      const remove = () => {
        form.delete(route('pin.destroy', { id: form.id }));
      }

      return { form,  remove}
    },
    methods: {
      updatePin() {
        this.$emit('update-pin', this.pin)
      },
    },
    components: { Dropdown, DropdownLink, DeleteIcons, ElipsisIcons },
    props: ['pin', 'align']
  }
</script>


<template>
  <Dropdown :align="align">
    <template #trigger>
      <button class="text-xs">
        <ElipsisIcons class="w-4 h-4 fill-gray-400" />
      </button>
    </template>
    <template #content>
      <div class="block">
        <DropdownLink as="button">
          <button @click="updatePin" class="w-full text-start text-xs text-gray-400">Edit</button>
        </DropdownLink>
      </div>
      <div class="border-t border-gray-100" />
      <div class="block">
        <form @submit.prevent="remove">
          <DropdownLink as="button">
            <div class="flex items-center gap-1">
              <DeleteIcons class="w-3 h-3 fill-red-400" />
              <button class="w-full text-start text-xs text-red-400">Delete</button>
            </div>
          </DropdownLink>
        </form>
      </div>
    </template>
  </Dropdown>
</template>