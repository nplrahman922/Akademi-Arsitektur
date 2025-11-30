<script setup lang="ts">
import { Head,Link } from '@inertiajs/vue3';
import AppLayout from '@/components/Welcome/Applayout.vue';
import Card from '@/components/Welcome/Card.vue';
import Product from '@/images/Product.png';
import { ref } from 'vue';
import PopupCard from '@/components/Welcome/PopupCard.vue';
import SketchUp from '@/images/SketchUp.png';
import Revit from '@/images/Revit.png';
import KlsBersama1 from '@/images/klsBersama1.png';
import KlsBersama2 from '@/images/klsBersama2.png';
import Rendering from '@/images/Rendering.png';
import Privat from '@/images/Privat.jpg';
import Button from '@/components/Welcome/Button.vue';
import {route} from'ziggy-js';

const isPopupVisible = ref(false);
const selectedClass = ref<any>(null);
const selectedClassType = ref<'reguler' | 'privat' | 'bimbingan' | null>(null);

// Data MVP Anda
const classData = {
    reguler: {
        sketchup: {
            img: SketchUp,
            title: 'Kelas Reguler: Sketch Up & AutoCad',
            description: 'Belajar berkelompok (3-4 orang) secara interaktif. Cocok untuk Anda yang ingin berkembang sambil berdiskusi.',
            materials: ['Dasar AutoCad', 'Modeling 3D Sketch Up', 'Layouting', 'V-Ray Render'],
            pricing: [
                { duration: '6 Jam (± 3 Hari)', core: 'Rp 299.000', pro: 'Rp 399.000' },
                { duration: '8 Jam (± 4 Hari)', core: 'Rp 380.000', pro: 'Rp 520.000' },
                { duration: '10 Jam (± 5 Hari)', core: 'Rp 460.000', pro: 'Rp 630.000' }
            ]
        },
        revit: {
            img: Revit,
            title: 'Kelas Reguler: Revit & BIM',
            description: 'Fokus pada Building Information Modeling (BIM) dengan Revit dalam grup kecil.',
            materials: ['Pengenalan BIM', 'Modeling Arsitektur', 'Struktur', 'MEP'],
            pricing: [
                { duration: '6 Jam (± 3 Hari)', core: 'Rp 375.000', pro: 'Rp 450.000' },
                { duration: '8 Jam (± 4 Hari)', core: 'Rp 480.000', pro: 'Rp 575.000' },
                { duration: '10 Jam (± 5 Hari)', core: 'Rp 575.000', pro: 'Rp 680.000' }
            ]
        },
        rendering: {
            img: Rendering,
            title: 'Kelas Reguler: Rendering & Photosoph',
            description: 'Pelajari teknik rendering fotorealistis dan post-processing dengan Photoshop.',
            materials: ['Setting V-Ray/Enscape', 'Material & Lighting', 'Post-processing di Photoshop', 'Tips & Trik Cepat'],
            pricing: [
                { duration: '6 Jam (± 3 Hari)', core: 'Rp 450.000', pro: 'Rp 570.000' },
                { duration: '8 Jam (± 4 Hari)', core: 'Rp 599.000', pro: 'Rp 750.000' },
                { duration: '10 Jam (± 5 Hari)', core: 'Rp 750.000', pro: 'Rp 950.000' }
            ]
        }
    },
    privat: {
        semuaMateri: {
            title: 'Kelas Privat: Semua Materi',
            img: Privat,
            description: 'Sesi belajar personal dan intensif 1-on-1 dengan mentor. Anda bebas memilih topik pembelajaran (SketchUp, AutoCAD, Revit, Rendering) sesuai kebutuhan untuk menyelesaikan tugas atau proyek spesifik.',
            materials: ['SketchUp', 'AutoCAD', 'Revit', 'Rendering & Photoshop'],
            pricing: [
                { duration: '6 Jam (± 3 Hari)', core: 'Rp 599.000', pro: 'Rp 689.000' },
                { duration: '8 Jam (± 4 Hari)', core: 'Rp 780.000', pro: 'Rp 899.000' },
                { duration: '10 Jam (± 5 Hari)', core: 'Rp 950.000', pro: 'Rp 1.150.000' }
            ]
        }
    },
    bimbingan: {
        privat: {
            title: 'Bimbingan Privat (1-on-1)',
            img: KlsBersama1,
            description: 'Layanan mentorship privat berbasis langganan bulanan yang dirancang 100% untuk membantu penyelesaian tugas akademis atau proyek profesional Anda.',
            materials: ['Konsultasi Proyek', 'Bimbingan Tugas Akhir', 'Portfolio Review', 'Dukungan Penuh'],
            pricing: [
                { duration: 'Sprint (1 Bulan)', price: 'Rp 2.000.000' },
                { duration: 'Marathon (2 Bulan)', price: 'Rp 3.800.000' },
                { duration: 'Semester (3 Bulan)', price: 'Rp 5.500.000' }
            ]
        },
        kelompok: {
            title: 'Bimbingan Kelompok (2-4 Anak)',
            img: KlsBersama2,
            description: 'Mentorship kelompok untuk tim proyek atau grup belajar. Dapatkan bimbingan ahli dengan biaya lebih terjangkau.',
            materials: ['Kolaborasi Tim', 'Project Management', 'Review Kelompok', 'Presentasi Akhir'],
            pricing: [
                { duration: 'Sprint (1 Bulan)', price: 'Rp 4.000.000' },
                { duration: 'Marathon (2 Bulan)', price: 'Rp 7.300.000' },
                { duration: 'Semester (3 Bulan)', price: 'Rp 10.000.000' }
            ]
        }
    }
};

function openPopup(data: any, type: 'reguler' | 'privat' | 'bimbingan') {
    selectedClass.value = data;
    selectedClassType.value = type;
    isPopupVisible.value = true;
}

function closePopup() {
    isPopupVisible.value = false;
    setTimeout(() => {
        selectedClass.value = null;
        selectedClassType.value = null;
    }, 300);
}
</script>

<template>
    <Head title="Product" />
    <AppLayout>
        <div class="relative">
            <img :src="Product" alt="banner" class="w-screen h-[50vh] object-cover [mask-image:linear-gradient(to_bottom,white_40%,transparent_100%)]">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 style="font-family: 'Major Mono Display',sans-serif" class="text-white text-6xl">
                    Paket Kelas
                </h1>
            </div>
        </div>

        <div class="max-w-4xl mx-auto py-12 px-4">
            <h1 class="text-white font-annie text-3xl text-center tracking-widest leading-loose ">
                " Temukan Paket Kelas yang tepat Untuk Anda "
            </h1>
            <p class="text-neutral-400 font-red-hat-mono text-xl">
                Kami menawarkan tiga jenis kelas yang dapat disesuaikan dengan gaya dan tujuan belajar Anda: Reguler, Privat, dan Bimbingan
            </p>
        </div>

        <div class="max-w-6xl mx-auto py-12 px-4 mt-10">

            <div>
                <h1 class="text-white font-suse-mono text-2xl text-center leading-loose hover:text-amber-400 ">
                    &rarr; Kelas Reguler &larr;
                </h1>
                <p class="text-neutral-400 text-justify max-w-4xl mx-auto text-md font-red-hat-mono">
                    Kelas berkelompok (3-4 orang) yang dirancang untuk belajar bersama secara interaktif dan kolaboratif. Cocok untuk Anda yang ingin berkembang sambil berdiskusi dengan peserta lain
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-12">
                    <card
                        v-for="(data, key) in classData.reguler"
                        :key="key"
                        class="cursor-pointer transition-transform duration-200 hover:scale-[1.03]"
                    >
                        <h1 class="text-neutral-200 font-annie text-xl tracking-wider text-center mb-12 ">
                            {{ data.title.split(': ')[1] }}
                        </h1>
                        <img :src="data.img" :alt="data.title" class="w-full h-40 object-cover rounded-t-lg">
                        <p class="text-neutral-400 text-sm font-red-hat-mono text-center mt-2 hover:text-amber-400"
                           @click="openPopup(data, 'reguler')"
                        > Click Disini</p>
                    </card>
                </div>
            </div>
            <div class="mt-30">
                <h1 class="text-white font-suse-mono text-2xl text-center leading-loose mt-12 hover:text-amber-400">
                    &rarr; Kelas Bimbingan &larr;
                </h1>
                <p class="text-neutral-400 text-justify max-w-4xl mx-auto text-md font-red-hat-mono">
                    Layanan mentorship privat berbasis langganan bulanan yang dirancang 100% untuk membantu penyelesaian tugas akademis atau proyek profesional Anda
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 my-12">
                    <card
                        v-for="(data, key) in classData.bimbingan"
                        :key="key"
                        class="cursor-pointer transition-transform duration-200 hover:scale-[1.03]"
                    >
                        <h1 class="text-neutral-200 font-annie text-xl tracking-wider text-center ">
                            {{ data.title }}
                        </h1>
                        <img :src="data.img" :alt="data.title" class="w-full h-40 object-cover rounded-t-lg saturate-0 hover:saturate-100">
                        <p class="text-neutral-400 text-sm font-red-hat-mono text-center mt-2 hover:text-amber-400"
                           @click="openPopup(data, 'bimbingan')"
                        > Click Disini</p>
                    </card>
                </div>
            </div>
            <div class="mt-30">
                <h1 class="text-white font-suse-mono text-2xl text-center leading-loose mt-12 hover:text-amber-400  my-6">
                    &rarr; Kelas Privat &larr;
                </h1>
                <p class="text-neutral-400 text-justify max-w-4xl mx-auto text-md font-red-hat-mono">
                    Sesi belajar personal dan intensif 1-on-1 dengan mentor. Anda bebas memilih topik pembelajaran sesuai kebutuhan untuk menyelesaikan tugas atau proyek spesifik.
                </p>
                <div class="grid grid-cols-1 gap-6 my-12"
                     v-for="(data, key) in classData.privat"
                     :key="key">

                    <h1 class="text-neutral-200 font-annie text-3xl tracking-wider text-center mb-12 ">
                        SketchUp , AutoCAD , Revit , Rendering
                    </h1>
                    <div class="mx-auto">
                        <img :src="data.img" :alt="data.title" class="w-[50rem] h-2/3  object-cover saturate-0 hover:saturate-100 rounded-lg">
                        <p class="text-neutral-400 text-sm font-red-hat-mono text-center mt-12 hover:text-amber-400"
                           @click="openPopup(data, 'privat')"
                        > informasi Selengkapnya 📜</p>
                    </div>
                </div>
            </div>
        </div>

        <PopupCard :show="isPopupVisible" @close="closePopup">
            <div v-if="selectedClass" class="text-white">
                <h2 class="mb-3 text-2xl font-semibold">{{ selectedClass.title }}</h2>
                <p class="mb-4 text-gray-300">{{ selectedClass.description }}</p>

                <h4 class="mb-2 font-semibold text-gray-100">Materi yang akan dipelajari:</h4>
                <ul class="mb-5 list-disc list-inside text-gray-300">
                    <li v-for="materi in selectedClass.materials" :key="materi">
                        {{ materi }}
                    </li>
                </ul>

                <h4 class="mb-3 font-semibold text-gray-100">Rincian Biaya:</h4>

                <div v-if="selectedClassType === 'reguler' || selectedClassType === 'privat'" class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-300">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-700">
                        <tr>
                            <th scope="col" class="px-4 py-3">Durasi</th>
                            <th scope="col" class="px-4 py-3">Core & Build</th>
                            <th scope="col" class="px-4 py-3">Pro</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="price in selectedClass.pricing" :key="price.duration" class="border-b border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium whitespace-nowrap">{{ price.duration }}</th>
                            <td class="px-4 py-3">{{ price.core }}</td>
                            <td class="px-4 py-3">{{ price.pro }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div v-else-if="selectedClassType === 'bimbingan'" class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-300">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-700">
                        <tr>
                            <th scope="col" class="px-4 py-3">Paket</th>
                            <th scope="col" class="px-4 py-3">Harga</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="price in selectedClass.pricing" :key="price.duration" class="border-b border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium whitespace-nowrap">{{ price.duration }}</th>
                            <td class="px-4 py-3">{{ price.price }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <Link :href="route('daftar')">
                    <Button
                        class="w-full mt-12" >
                        Daftar
                    </Button>
                </Link>

            </div>
        </PopupCard>

    </AppLayout>
</template>
