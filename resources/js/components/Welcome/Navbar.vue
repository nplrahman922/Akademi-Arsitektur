<script setup lang="ts">
import logoSrc from '@/images/logo1.png';
import Hamburger from '@/components/Icon/Hamburger.vue';
import { route } from 'ziggy-js';
import { Link } from '@inertiajs/vue3';

import { ref } from 'vue';

const isMenuMobileOpen = ref(false);
function toggleMenuMobile() {
    isMenuMobileOpen.value = !isMenuMobileOpen.value;
}
</script>

<template>
    <div class="bg-stone-950 max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 font-alan-sans font-bold text-lg relative z-10">

        <nav class="flex justify-between items-center py-4">
            <div>
                <a :href="route('Home')">
                    <img :src="logoSrc" alt="logo" class="w-20">
                </a>
            </div>

            <div class="hidden md:flex items-center gap-10 font-red-hat-mono font-normal tracking-wider">
                <Link
                    :href="route('Home')"
                    class="transition-transform hover:text-amber-300 hover:scale-110"
                    :class="[
                    $page.url === '/'
                    ? 'text-white'  : 'text-stone-300'
                    ]">
                    Home
                </Link>
                <Link
                    :href="route('Abouth')"
                    class="transition-transform hover:text-amber-300 hover:scale-110"
                    :class="[
                    $page.url === '/tentang-kami'
                    ? 'text-white scale-110'
                    : 'text-stone-300'
                    ]">
                    Tentang Kami
                    </Link>
                <Link
                    :href="route('Product')"
                    class="transition-transform hover:text-amber-300 hover:scale-110"
                    :class="[
                    $page.url === '/paket-kelas'
                    ? 'text-white scale-110'
                    : 'text-stone-300'
                    ]">
                    Paket Kelas
                </Link>

            </div>
            <div>
                <Link  :href="route('login')" class="hidden md:block text-neutral-300 hover:text-white hover:scale-110 transition-transform">
                    Login
                </Link>
                <button @click="toggleMenuMobile" class="md:hidden text-stone-300 hover:text-white">
                    <Hamburger/>
                </button>
            </div>

        </nav>

        <div :class="{ 'hidden': !isMenuMobileOpen }"
             class="md:hidden pb-4 absolute w-full left-0 bg-stone-950 z-10">
            <Link :href="route('Home')" class="block py-2 px-4 text-stone-300 hover:bg-stone-800 rounded">Home</Link>
            <Link :href="route('Abouth')" class="block py-2 px-4 text-stone-300 hover:bg-stone-800 rounded">Tentang Kami</Link>
            <Link :href="route('Product')" class="block py-2 px-4 text-stone-300 hover:bg-stone-800 rounded">Paket Kelas</Link>
            <Link :href="route('login')" class="block py-2 px-4 text-stone-300 hover:bg-stone-800 rounded">Login</Link>
        </div>

    </div>
</template>

<style scoped>

</style>
