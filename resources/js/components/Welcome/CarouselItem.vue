<script setup lang="ts">

import { Splide, SplideSlide } from '@splidejs/vue-splide';
import RevitIcon from '@/components/Icon/Revit.vue'
import CAD from '@/components/Icon/CAD.vue';
import Skechup from '@/components/Icon/Skechup.vue';
import Photosop from '@/components/Icon/Photosop.vue';
import '@splidejs/vue-splide/css';

const options = {
    type       : 'loop',
    gap        : '1.5rem',
    arrows     : false,
    pagination : false,

    autoplay   : true,
    interval   : 1500,
    pauseOnHover: true,


    fixedWidth : '15rem',

    breakpoints: {

        1024: {
            fixedWidth: '9.5rem',
        },

        768: {
            fixedWidth: '8rem',
        },

        640: {
            fixedWidth: '7rem',
        },
    },
};
</script>

<template>
    <div class="max-w-5xl mx-auto px-4 font-red-hat-mono">
        <Splide :options="options" aria-label="Koleksi Item Kami">

            <SplideSlide>
                <div class="flex flex-col h-40 bg-neutral-800 rounded-lg flex items-center justify-center border border-neutral-700">
                   <revit-icon size="75"/>
                    <h1 class="text-neutral-200 text-lg">Revit</h1>
                    <p class="font-sans text-neutral-400 text-xs hover:text-cyan-400 hover:underline">Pelajari lebih lanjut</p>
                </div>
            </SplideSlide>

            <SplideSlide>
                <div class="flex flex-col h-40 bg-neutral-800 rounded-lg flex items-center justify-center border border-neutral-700">
                    <CAD size="75"/>
                    <h1 class="text-neutral-200 text-lg">Auto CAD</h1>
                    <p class="font-sans text-neutral-400 text-xs hover:text-cyan-400 hover:underline">Pelajari lebih lanjut</p>
                </div>
            </SplideSlide>

            <SplideSlide>
                <div class="flex flex-col h-40 bg-neutral-800 rounded-lg flex items-center justify-center border border-neutral-700">
                    <Skechup size="75"/>
                    <h1 class="text-neutral-200 text-lg">Sketch Up</h1>
                    <p class="font-sans text-neutral-400 text-xs hover:text-cyan-400 hover:underline">Pelajari lebih lanjut</p>
                </div>
            </SplideSlide>

            <SplideSlide>
                <div class="flex flex-col h-40 bg-neutral-800 rounded-lg flex items-center justify-center border border-neutral-700">
                    <Photosop size="75"/>
                    <h1 class="text-neutral-200 text-lg">Adobe Photosop</h1>
                    <p class="font-sans text-neutral-400 text-xs hover:text-cyan-400 hover:underline">Pelajari lebih lanjut</p>
                </div>
            </SplideSlide>

        </Splide>
    </div>
</template>

<style scoped>

</style>
