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
      }
    });


    const submitForm = () => {
      form.post(route('pin.create'), {
        onSuccess: () => {
          form.reset();
        }
      });
    };

    const updateForm = () => {
      form.put(route('pin.update', { id: form.id }), {
        onSuccess: () => {
          form.reset();
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
  data() {
    return { isVisible: false }
  },
  methods: {
    toggleModal() {
      this.isVisible = !this.isVisible
      if (!this.isVisible)
        this.form.reset()
    }
  },
  props: {
    pinToUpdate: Object,
  },
  components: { InputError, InputLabel, TextAreaInput, TextInput }
}
</script>

<template>
  <div v-show="isVisible"
    class="bg-white right-0 min-h-screen w-full  border-2 shadow-xl rounded transform transition duration-500 ease-in"
    :class="{ 'opacity-0': isVisible === false, 'opacity-1': isVisible }">
    <div class="p-8">
      <form @submit.prevent="handleFormSubmit">
        <div>
          <TextInput type="text" id="title"
            class="text-lg font-bold border-none rounded w-full py-4 px-3 placeholder-gray-400 focus:border-transparent focus:ring-0"
            v-model="form.title" placeholder="Title" required />
          <InputError class="mt-2" :message="form.errors.title" />
        </div>
        <div class="mt-2">
          <TextAreaInput id="description"
            class="text-lg font-bold border-none rounded w-full py-2 px-3 placeholder-gray-400 focus:border-transparent focus:ring-0 focus:outline-none"
            v-model="form.description" placeholder="Description" rows="10" required />
          <InputError class="mt-2" :message="form.errors.description" />
        </div>
        <div class="flex mt-8 gap-4">
          <button type="submit"
            class="px-8 py-1 font-bold transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300">Save</button>
          <button type="button" @click="toggleModal"
            class="px-8 py-1 font-bold bg-transparent border-2 border-indigo-500 text-indigo-500 text-lg rounded-lg transition-colors duration-700 transform hover:bg-indigo-500 hover:text-gray-100 focus:border-4 focus:border-indigo-300">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</template>

