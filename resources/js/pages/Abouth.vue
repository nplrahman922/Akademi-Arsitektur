<script setup lang="ts">
import Applayout from'@/components/Welcome/Applayout.vue'
import Aboutsrc from '@/images/Tentang-Kami.png'
import Button from '@/components/Welcome/Button.vue'
import Instagram from '@/components/Icon/Instagram.vue';
import WhatsApp from '@/components/Icon/WhatsApp.vue';
import { route } from 'ziggy-js';
import Mail from '@/components/Icon/Mail.vue';
import WA from '@/components/Icon/WA.vue';
import {Head , Link} from '@inertiajs/vue3';

import Card from '@/components/Welcome/Card.vue'
import Send from '@/components/Icon/Send.vue';

const openWhatsApp = () => {
    const phoneNumber = '6285804069705';
    const pesan = 'Halo, Saya ingin mencari tahu tentang Akademi Arsitektur!!';
    const encodedMessage = encodeURIComponent(pesan);
    const waURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

    window.open(waURL, '_blank');
};


</script>

<template>
    <Head title="Abouth" />
    <Applayout>
        <div class="relative">

            <img
                :src="Aboutsrc"
                alt="banner"
                class="w-screen h-[50vh] object-cover
               [mask-image:linear-gradient(to_bottom,white_40%,transparent_100%)]"
            >

            <div class="absolute inset-0 flex items-center justify-center">
               <div class="font-Annie text-white text-6xl max-w-3xl leading-snug tracking-widest">
                   <h1>Tentang akademi</h1>
                   <span class="text-amber-400">Arsitek</span>
               </div>
            </div>
        </div>
            <div class="px-4 mx-10 text-justify">

                <p class="pt-8 text-neutral-300 text-lg md:text-xl max-w-4xl mx-auto tracking-wider leading-relaxed drop-shadow-md ">
                    <b class="text-neutral-300 font-grenze text-5xl">A</b><span class="text-neutral-300">kademi </span>Arsitek adalah sebuah platform pembelajaran arsitektur yang didirikan berbasis komunitas. Misi kami adalah membantu mahasiswa dan para pemula untuk menguasai berbagai keahlian penting dalam dunia arsitektur, mulai dari desain konseptual, pemahaman teknis bangunan, hingga penguasaan software arsitektur secara praktis dan aplikatif.
                </p>
                <p class="pt-5 text-neutral-300 text-lg md:text-xl max-w-4xl mx-auto tracking-wider leading-relaxed drop-shadow-md ">
                    Kami percaya bahwa proses belajar harus fleksibel, relevan, dan mendukung pertumbuhan setiap individu. Oleh karena itu, kami menyediakan tiga tingkatan kelas yang progresif <b class="text-neutral-50 hover:underline">(Core, Build, dan Pro)</b> untuk memastikan materi sesuai dengan tingkat kemampuan peserta. Dengan bimbingan dari Studio Mentor yang berpengalaman, Akademi Arsitek menjadi tempat yang tepat untuk mengasah skill, membangun portofolio yang kuat, dan mempersiapkan karier arsitektur dengan penuh percaya diri.
                </p>

            </div>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 my-12">
                <h1 class="font-annie text-white text-5xl text-center leading-snug">Cara <b class="text-amber-400">Belajar</b></h1>
                <h1 class="font-annie text-white text-5xl text-center"> Kami ?</h1>
                <div class="grid grid-rows-1 md:grid-cols-2 gap-6 mt-20">
                    <div class="flex flex-col">
                        <card>
                            <h1 class="text-neutral-200 font-annie text-2xl tracking-wider text-center ">Ayo daftarkan diri anda sekarang juga!! </h1>
                            <Link :href="route('daftar')">
                                <Button color="cyan" size="md" class="mt-12 w-full text-white">
                                    Daftar
                                    <Send size="20" class="inline-block ml-2"/>
                                </Button>
                            </Link>

                            <h1 class="text-neutral-200 font-annie text-2xl tracking-wider text-center mt-12">Dan dapat menghubungi kami melalui :</h1>
                            <card class="m-8">
                                <div class="flex flex-row items-center gap-2 my-2">
                                    <Instagram/>
                                    <p style="font-family:'Red Hat Mono',sans-serif " class="text-neutral-200 text-md">
                                        Instagram : @akademiarsitek
                                    </p>
                                </div>
                                <div class="flex flex-row items-center gap-2 my-2">
                                    <WhatsApp/>
                                    <p style="font-family: 'Red Hat Mono',sans-serif" class="text-neutral-200 text-md">
                                        WhatsApp : 085804069705
                                    </p>
                                </div>
                                <div class="flex flex-row items-center gap-2 my-2">
                                    <Mail/>
                                    <p style="font-family: 'Red Hat Mono',sans-serif" class="text-neutral-200 text-md">
                                        Email : akademiarsitek@gmail.com
                                    </p>
                                </div>
                            </card>
                            <h1 class="text-neutral-200 font-annie text-2xl text-center">
                                Atau anda dapat menekan Tombol dibawah ini!!
                            </h1>
                            <Button color="green" size="md" class="mt-5 w-full text-white" @click="openWhatsApp">
                                Pesan
                                <WA size="20" class="inline-block ml-2"/>
                            </Button>
                        </card>

                    </div>

                    <div class="flex flex-col items-center gap-6">
                        <card>
                            <h1 class="text-neutral-200 font-suse-mono text-xl">-> Praktis dan Aplikatif: </h1>
                            <h1 class="text-neutral-400 font-red-hat-mono text-md">Materi dirancang agar langsung bisa diterapkan untuk kebutuhan tugas kuliah maupun proyek profesional 👤</h1>
                        </card>
                       <card>
                           <h1 class="text-neutral-200 font-suse-mono text-xl">-> Fleksibilitas Tinggi: </h1>
                           <h1 class="text-neutral-400 font-red-hat-mono text-md">Peserta dapat menyepakati jadwal dan lokasi belajar bersama mentor, menciptakan suasana belajar yang nyaman dan personal 🔄</h1>
                       </card>
                        <card>
                            <h1 class="text-neutral-200 font-suse-mono text-xl">-> Berbasis Komunitas: </h1>
                            <h1 class="text-neutral-400 font-red-hat-mono text-md">Kami mendorong interaksi dan kolaborasi antar peserta untuk saling bertukar ide dan memperluas jaringan profesional 🤝</h1>
                        </card>
                    </div>

                </div>
            </div>
    </Applayout>
</template>

<style scoped>

</style>
