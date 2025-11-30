<script setup lang="ts">
import Applayout from'@/components/Welcome/Applayout.vue'
import latar from '@/images/latar-belakang.jpg';
import logo from '@/images/logo.png';
import Comunity from '@/components/Icon/Comunity.vue';
import Reycycle from '@/components/Icon/Reycycle.vue';
import Award from '@/components/Icon/Award.vue';
import Time from '@/components/Icon/Time.vue';
import CarouselItem from '@/components/Welcome/CarouselItem.vue';
import Button from '@/components/Welcome/Button.vue';
import { route } from 'ziggy-js';
import Send from '@/components/Icon/Send.vue';
import { Head,Link } from '@inertiajs/vue3';
</script>

<template>
<Applayout>
    <Head title="Home" />
        <div class="relative">

            <img
                :src="latar"
                alt="banner"
                class="w-screen h-[50vh] object-cover
               [mask-image:linear-gradient(to_bottom,white_40%,transparent_100%)]"
            >

            <div class="absolute inset-0 flex items-center justify-center">
                <img :src="logo" alt="logo" class="w-78 h-78">
            </div>

        </div>

        <div class="px-4 gap-y-6 text-center">
            <h1 style="font-family: 'Monoton' , sans-serif" class="pt-8 text-neutral-200 text-lg md:text-4xl max-w-3xl mx-auto tracking-widest leading-loose">
                Platform Pembelajaran Arsitektur
            </h1>

            <p class="mt-12 text-neutral-300 text-justify text-lg md:text-xl max-w-5xl mx-auto tracking-wider leading-relaxed drop-shadow-md">
                "Akademi Arsitek adalah platform yang dirancang untuk membantu mahasiswa dan pemula menguasai desain, teknis bangunan, dan software arsitektur secara praktis. Bersama kami, Anda akan siap membangun portofolio dan meniti karier di dunia arsitektur dengan lebih percaya diri"
            </p>
        </div>

        <div class="max-w-7xl mx-auto py-16 px-4">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 mt-12">
                <h1 class="text-white text-3xl text-center ">Mengapa harus Kursus di <b class="text-amber-400">Akademi Arsitek</b> ??</h1>

            </div>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-neutral-900 border border-neutral-800 rounded-lg p-6 transition hover:border-neutral-700">
                    <div>
                        <Award/>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-white">Mentor Berpengalaman</h3>
                    <p class="mt-2 text-sm text-neutral-400 leading-relaxed">
                        Pembelajaran didampingi oleh Studio Mentor berpengalaman yang siap membimbing Anda secara aplikatif dan relevan dengan dunia profesional.
                    </p>
                </div>

                <div class="bg-neutral-900 border border-neutral-800 rounded-lg p-6 transition hover:border-neutral-700">
                    <div>
                        <Time/>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-white">Waktu & Tempat Fleksibel</h3>
                    <p class="mt-2 text-sm text-neutral-400 leading-relaxed">
                        Proses belajar dirancang agar nyaman dan mudah diakses, menyesuaikan dengan kesepakatan waktu dan tempat Anda.
                    </p>
                </div>

                <div class="bg-neutral-900 border border-neutral-800 rounded-lg p-6 transition hover:border-neutral-700">
                    <div>
                        <Reycycle/>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-white">Gratis Mengulang Seumur Hidup</h3>
                    <p class="mt-2 text-sm text-neutral-400 leading-relaxed">
                        Jika Anda merasa belum memahami materi, Anda dapat mengikuti kembali kelas terjadwal hanya dengan membayar biaya administrasi.
                    </p>
                </div>

                <div class="md:col-span-2 lg:col-span-3 bg-neutral-900 border border-neutral-800 rounded-lg p-6 transition hover:border-neutral-700">
                    <div>
                        <comunity/>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-white">Komunitas Solid</h3>
                    <p class="mt-2 text-sm text-neutral-400 leading-relaxed">
                        Lebih dari sekadar tempat belajar, kami adalah komunitas untuk memperluas koneksi dengan sesama arsitek muda di seluruh Indonesia.
                    </p>
                </div>

            </div>
        </div>
        <div class="max-w-4xl mx-auto py-16 px-4">
            <h1 class="text-white font-alan-sans text-xl text-center ">
                “ Kami menyediakan tiga kelas progresif—<b class="text-amber-400">Core</b>, <b class="text-amber-400">Build</b>,
                dan <b class="text-amber-400">Pro</b>—yang dirancang sesuai kebutuhan dan tingkat kemampuan Anda. "
            </h1>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
        </div>
        <carousel-item/>
        <div class="max-w-4xl mx-auto py-16 px-4 mt-4">
            <h1 class="text-white font-alan-sans text-xl text-center ">" Ayo jadikan dirimu pionir dalam bidang arsitektur modern , Mari bergabung bersama kami sekarang juga! " </h1>
            <Link :href="route('daftar')">
                <Button color="cyan" size="md" class="w-full text-white mt-12">
                    Daftar <Send size="20" class="inline-block ml-2"/>
                </Button>
            </Link>
        </div>

</Applayout>
</template>

<style scoped>

</style>
