<template>
    <section class="min-h-screen relative">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('pins')" class="text-sm text-gray-700 dark:text-gray-500 underline">Pins</Link>

            <template v-else>
                <div class="mr-10">
                    <Link :href="route('login')" class="bg-flatpurple hover:bg-purple-600 text-white font-semibold py-3 px-8 rounded inline-flex items-center mt-5">Log In</Link>
                </div>
            </template>
        </div>

        <div class="flex w-full container mx-auto flex-col py-20 gap-10">
            <h1 class="text-3xl dark:text-white font-extrabold">Pins</h1>

            <div class="flex justify-between mt-5">
                <div class="">
                    <h1 class="text-black font-bold text-6xl">Stay organized with our digital pinboard</h1>
                    <p class="mt-3 text-lg">By using our digital pinboard, users can easily capture their ideas, prioritize their tasks, and declutter their physical workspace. With our user-friendly interface, staying organized has never been easier.</p>
                    <Link v-if="canRegister" :href="route('register')" class="bg-flatpurple hover:bg-purple-600 text-white font-semibold py-3 px-8 rounded-full inline-flex items-center mt-5">Get Started</Link>
                </div>
                <img src="../../img/peoples-2d.png" class="w-2/3 -mr-40">
            </div>
        </div>
    </section>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    pins: {
        Type: Object,
        default: () => {}
    }
});
</script>