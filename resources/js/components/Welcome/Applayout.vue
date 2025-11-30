<script setup lang="ts">
import Navbar from '@/components/Welcome/Navbar.vue';
import Footer from '@/components/Welcome/Footer.vue';
import WavesBackground from '@/components/Welcome/WavesBackground.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Akademi Arsitektur" />
    <WavesBackground >
    <Navbar class="sticky top-0 z-50" />
    <main class="z-index-10">
        <slot />
    </main>
    <Footer class="bottom-0 z-50" />
    </WavesBackground>
</template>

<style scoped>

</style>
