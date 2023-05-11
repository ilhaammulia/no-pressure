<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pins
            </h2>
        </template>

        <div class="flex">

            <div class="mx-auto py-12 max-w-7xl" :class="{ 'blur-sm': isVisible === true }">
                <div class="flex justify-between mx-auto sm:px-6 lg:px-8">
                    <SearchBar class="text-gray-600 h-4 w-4 fill-current" />
                    <ShowModeSwitch @mode-toggle="changeShowMode" />
                </div>
                <div class="flex">
                    <!-- Pin Card List -->
                    <div class="mx-auto sm:px-6 lg:px-8 py-5">
                        <div v-if="showMode === 'grid'" class="grid grid-cols-3 grid-flow-row gap-10">
                            <CreatePinCard @modal-toggle="modalToggle" />
                            <div v-for="pin in pins" :key="pin.id">
                                <PinCard :pin="pin" @update-pin="updatePin" />
                            </div>
                        </div>

                        <div v-if="showMode === 'list'" class="grid grid-flow-row gap-7">
                            <div v-for="pin in pins" :key="pin.id">
                                <PinCardList :pin="pin" @update-pin="updatePin" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Modal for Create Pin -->
            <PinModal :isVisible="isVisible" @close-modal="modalToggle" :pinToUpdate="pinToUpdate" ref="modal" />
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import PinCard from '@/Components/PinCard.vue';
import PinCardList from '@/Components/PinCardList.vue';
import CreatePinCard from '@/Components/CreatePinCard.vue';
import PinModal from '@/Components/PinModal.vue';
import ShowModeSwitch from '@/Components/ShowModeSwitch.vue';
import SearchBar from '@/Components/SearchBar.vue';

export default {
    data() {
        return { isVisible: false, pinToUpdate: null, showMode: 'grid' }
    },
    components: {
        AppLayout,
        Welcome,
        PinCard,
        PinCardList,
        CreatePinCard,
        PinModal,
        PinModal,
        ShowModeSwitch,
        SearchBar
    },
    props: {
        pins: Array
    },
    methods: {
        modalToggle(isVisible) {
            this.isVisible = !isVisible
        },
        updatePin(value) {
            this.pinToUpdate = value
            this.isVisible = true
        },
        changeShowMode(value) {
            this.showMode = value
        }
    }
}
</script>