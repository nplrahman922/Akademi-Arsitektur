<script setup lang="ts">
import { route } from 'ziggy-js'
import logoSrc from '@/images/logo1.png';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <footer class="bg-neutral-950 font-alan-sans text-stone-400">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

                <div class="col-span-2 md:col-span-1 md:flex md:flex-col md:items-center">
                    <a href="#">
                        <img :src="logoSrc" class="w-28"  alt="Logo Akademi Arsitektur id">
                    </a>
                    <p class="mt-4 text-sm md:text-center">
                        Membentuk masa depan arsitektur Indonesia melalui pendidikan berkualitas.
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-semibold tracking-wider text-stone-200 uppercase">Navigasi</h3>
                    <ul class="mt-4 space-y-2">
                        <li><Link :href="route('Home')" class="hover:text-white transition-colors">Home</Link></li>
                        <li><Link :href="route('Abouth')" class="hover:text-white transition-colors">Tentang Kami</Link></li>
                        <li><Link :href="route('Product')" class="hover:text-white transition-colors">Paket Kelas</Link></li>
                    </ul>
                </div>


                <div>
                    <h3 class="text-sm font-semibold tracking-wider text-stone-200 uppercase">Hubungi Kami</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="mailto:info@akademiarsitektur.id" class="hover:text-white transition-colors">akademiarsitek@gmail.com</a></li>
                        <li><p>085804069705</p></li>
                        <li><p>Balikpapan, Indonesia</p></li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 border-t border-stone-800 pt-8 flex flex-col sm:flex-row-reverse justify-between items-center">
                <p class="mt-4 sm:mt-0 text-sm text-stone-500">&copy; 2025 Akademi Arsitektur id. All rights reserved.</p>
            </div>
        </div>
    </footer>
</template>

<style scoped>

</style>
