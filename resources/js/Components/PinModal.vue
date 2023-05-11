<script>
import { useForm } from '@inertiajs/inertia-vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import TextAreaInput from './TextAreaInput.vue';
import { watch } from 'vue';

export default {
  setup(props, { emit }) {
    const form = useForm({
      id: null,
      title: '',
      description: ''
    });

    watch(() => props.pinToUpdate, (value) => {
      if (value && props.pinToUpdate) {
        form.id = props.pinToUpdate.id,
        form.title = props.pinToUpdate.title,
        form.description = props.pinToUpdate.description
    }});

    
    const submitForm = () => {
      form.post(route('pin.create'), {
        onSuccess: () => {
          form.reset();
          emit('close-modal', true);
        }
      });
    };
    
    const updateForm = () => {
      form.put(route('pin.update', { id: form.id }), {
        onSuccess: () => {
          form.reset();
          emit('close-modal', true);
        }
      })
    };
    
    const handleFormSubmit = () => {
      if (!props.pinToUpdate) {
        submitForm();
      } else {
        updateForm();
      }
    };

    return { form, handleFormSubmit, submitForm, updateForm }
  },
  props: ['isVisible', 'pinToUpdate'],
  components: { InputError, InputLabel, TextAreaInput, TextInput }
}
</script>

<template>
  <div v-show="isVisible"
    class="bg-white right-0 min-h-screen w-full border-2 shadow-xl rounded transform transition duration-500 ease-in"
    :class="{ 'opacity-0': isVisible === false, 'opacity-1': isVisible }">
    <div class="p-8">
      <form @submit.prevent="handleFormSubmit">
        <div>
          <InputLabel for="title" class="block text-gray-700 font-bold mb-2" value="Title" />
          <TextInput type="text" id="title"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            v-model="form.title" required />
          <InputError class="mt-2" :message="form.errors.title" />
        </div>
        <div class="mt-4">
          <InputLabel for="description" class="block text-gray-700 font-bold mb-2" value="Description" />
          <TextAreaInput id="description"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            v-model="form.description" required />
          <InputError class="mt-2" :message="form.errors.description" />
        </div>
        <div class="mt-8">
          <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
        </div>
      </form>
    </div>

  </div>
</template>

