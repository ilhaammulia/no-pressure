<template>
    <section class="h-auto">
        <div class="w-3/4 mx-auto">
            <div v-if="canLogin" class="py-4 flex justify-between items-center">
                <div class="grid grid-cols-2 items-center">
                    <ApplicationMark class="h-12 px-8" />
                    <Link :href="route('home')" class="text-black font-bold py-2 px-8 hover:text-gray-400">Home</Link>
                </div>
                <Link v-if="$page.props.user" :href="route('pins')"
                    class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-8 rounded-md mt-5">
                My Pins</Link>

                <template v-else>
                    <Link :href="route('login')"
                        class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-8 rounded inline-flex items-center mt-5">
                    Log In</Link>
                </template>
            </div>
            <div class="w-full h-1 bg-indigo-100"></div>
        </div>

        <div class="flex w-full container mx-auto flex-col py-12 px-12 gap-10">
            <h1 class="text-3xl dark:text-white font-extrabold">Pins</h1>
            <div class="flex justify-between items-center">
                <div class="">
                    <h1 class="text-black font-semibold text-4xl">Pin and Share Your World!</h1>
                    <p class="text-md text-gray-500">Explore, Collect, Share: Your Ultimate Pin Experience! Discover a world
                        of inspiration, organize your interests, and share your passion with our interactive platform. Join
                        our global pin community and unlock endless possibilities today.</p>
                    <Link v-if="canRegister" :href="route('register')"
                        class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 px-8 rounded-full inline-flex items-center mt-5">
                    Get Started</Link>
                </div>
                <img src="../../img/peoples-2d.png" class="w-1/2">
            </div>

        </div>
        <div class="bg-indigo-600 w-full py-10 px-8">
            <div class="mx-auto py-8">
                <div class="overflow-x-scroll whitespace-nowrap">
                    <div class="flex p-4 w-1/3 transition duration-300 ease-in-out gap-10">
                        <div v-for="pin in pins"
                            class="bg-white grid grid-flow-row min-w-full py-4 px-8 shadow-md rounded-lg">
                            <span class="text-lg text-indigo-500 font-bold">{{ pin.title }}</span>
                            <p class="text-md text-gray-500 my-3 overflow-hidden">{{ pin.description }}</p>
                            <span class="text-lg text-indigo-500 font-bold">- {{ pin.user_name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import ApplicationMark from '@/Components/ApplicationMark.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    pins: {
        Type: Object,
        default: () => { }
    }
});
</script>