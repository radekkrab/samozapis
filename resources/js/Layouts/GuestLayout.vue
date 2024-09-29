<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="bg-cover bg-center min-h-screen flex flex-col sm:justify-center items-center pt-6 px-2 sm:pt-0" style="background-image: url('storage/img/welcome-bg.webp'); background-attachment: fixed;">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-800 shadow-md overflow-hidden rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
