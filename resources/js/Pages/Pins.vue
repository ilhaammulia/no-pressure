<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pins</h2>
                <SearchBar @search-value="setSearchValue" class="text-gray-600  fill-current hidden md:block" />
                <Toolbar @mode-toggle="changeShowMode" @modal-toggle="modalToggle" />
            </div>
        </template>

        <div class="flex">
            <div class="mx-auto py-12 max-w-7xl sm:px-6 lg:px-8">

                <div class="flex">
                    <!-- Pin Card List -->
                    <div class="mx-auto pt-5">

                        <!-- Pin Card Grid Mode -->
                        <div v-if="showMode === 'grid'" class="grid grid-cols-1 grid-flow-row gap-10 md:grid-cols-2">
                            <div v-for="pin in filteredPins" :key="pin.id">
                                <PinCard :pin="pin" @update-pin="updatePin" />
                            </div>
                        </div>

                        <!-- Pin Card List Mode -->
                        <div v-if="showMode === 'list'" class="grid grid-flow-row gap-7">
                            <div v-for="pin in filteredPins" :key="pin.id">
                                <PinCardList :pin="pin" @update-pin="updatePin" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Modal for Create/Update Pin -->
            <PinModal @close-modal="modalToggle" :pinToUpdate="pinToUpdate" ref="modal" />
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import PinCard from '@/Components/PinCard.vue';
import PinCardList from '@/Components/PinCardList.vue';
import PinModal from '@/Components/PinModal.vue';
import Toolbar from '@/Components/Toolbar.vue';
import SearchBar from '@/Components/SearchBar.vue';

export default {
    data() {
        return { pinToUpdate: null, showMode: 'grid', searchValue: '' }
    },
    components: {
        AppLayout,
        Welcome,
        PinCard,
        PinCardList,
        PinModal,
        Toolbar,
        SearchBar,
    },
    computed: {
        filteredPins() {
            const searchValue = this.searchValue.toLowerCase();
            return this.pins.filter(pin => pin.title.toLowerCase().includes(searchValue))
        }
    },
    props: {
        pins: Array
    },
    methods: {
        modalToggle() {
            this.$refs.modal.toggleModal()
        },
        updatePin(value) {
            this.pinToUpdate = value
            if (!this.$refs.modal.isVisible)
                this.modalToggle()
        },
        changeShowMode(value) {
            this.showMode = value
        },
        setSearchValue(value) {
            this.searchValue = value
        }
    }
}
</script>