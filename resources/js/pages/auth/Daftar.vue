<script setup lang="ts">
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from 'vee-validate';
import { toTypedSchema } from '@vee-validate/zod';
import * as z from 'zod';
import { route } from 'ziggy-js';

import AuthBase from '@/layouts/AuthLayout.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';


const submitResult = ref<string | null>(null);

// Schema Validasi
const validationSchema = toTypedSchema(
    z.object({
        name: z.string().min(1, 'Nama wajib diisi'),
        email: z.string().min(1, 'Email wajib diisi').email('Format email tidak valid'),
        kursus: z.string().min(1, 'Silakan pilih kursus'),
        paket: z.string().min(1, 'Silakan pilih paket'),
    })
);

// Vee-Validate Form Definition
const { handleSubmit, defineField, isSubmitting, resetForm, errors } = useForm({
    validationSchema,
});

// Definisi Field (v-model binding)
const [name, nameProps] = defineField('name');
const [email, emailProps] = defineField('email');
const [kursus, kursusProps] = defineField('kursus');
const [paket, paketProps] = defineField('paket');

const onSubmit = handleSubmit((values) => {
    submitResult.value = null; // Reset pesan sebelumnya

    const messageText = `Halo, Saya ingin Mendaftar di Akademi Arsitektur!
\nNama : *${values.name}*
Email : *${values.email}*
Kursus : *${values.kursus}*
Paket : *${values.paket}*
\nMohon informasi untuk pembayaran dan pendaftaran lebih lanjut.`;

    const encodeMessage = encodeURIComponent(messageText.trim());
    const phoneNumber = '6281385266775'; // Gunakan string untuk nomor telepon
    const waURL = `https://wa.me/${phoneNumber}?text=${encodeMessage}`;

    try {
        window.open(waURL, '_blank');
        resetForm();
        submitResult.value = 'SUCCESS: Pesan berhasil disiapkan! Cek tab WhatsApp Anda.';

        // Hilangkan pesan sukses setelah 5 detik
        setTimeout(() => {
            if (submitResult.value?.startsWith('SUCCESS')) {
                submitResult.value = null;
            }
        }, 5000);

    } catch (error) {
        console.error(error);
        submitResult.value = 'ERROR: Gagal membuka WhatsApp. Silakan coba lagi.';
    }
});
</script>

<template>
    <AuthBase
        title="Form Pendaftaran Akademi Arsitektur"
        description="Masukkan detail Anda di bawah untuk mendaftar"
    >
        <Head title="Register" />

        <form @submit="onSubmit" class="flex flex-col gap-6">
            <div class="grid gap-4">
                <div class="grid gap-2">
                    <Label for="name">Nama Lengkap</Label>
                    <Input
                        id="name"
                        type="text"
                        placeholder="Nama Anda"
                        v-model="name"
                        v-bind="nameProps"
                        :class="{ 'border-red-500 focus-visible:ring-red-500': errors.name }"
                    />
                    <InputError :message="errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="email">Email</Label>
                    <Input
                        id="email"
                        type="email"
                        placeholder="nama@example.com"
                        v-model="email"
                        v-bind="emailProps"
                        :class="{ 'border-red-500 focus-visible:ring-red-500': errors.email }"
                    />
                    <InputError :message="errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="kursus">Pilihan Kursus</Label>
                    <select
                        id="kursus"
                        v-model="kursus"
                        v-bind="kursusProps"
                        class="flex h-9 w-full  rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                        :class="[
                            !kursus ? 'text-muted-foreground' : '',
                            errors.kursus ? 'border-red-500 focus-visible:ring-red-500' : ''
                        ]"
                    >
                        <option class="text-neutral-800" value="" disabled selected>-- Pilih salah satu --</option>
                        <option class="text-neutral-800 text-foreground" value="Revit" >Revit</option>
                        <option class="text-neutral-800 text-foreground" value="AutoCAD" >AutoCAD</option>
                        <option class="text-neutral-800 text-foreground" value="Photoshop" >Photoshop</option>
                    </select>
                    <InputError :message="errors.kursus" />
                </div>

                <div class="grid gap-2">
                    <Label for="paket">Pilihan Paket</Label>
                    <select
                        id="paket"
                        v-model="paket"
                        v-bind="paketProps"
                        class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                        :class="[
                            !paket ? 'text-muted-foreground' : '',
                            errors.paket ? 'border-red-500 focus-visible:ring-red-500' : ''
                        ]"
                    >
                        <option  class="text-neutral-800" value="" disabled selected>-- Pilih salah satu --</option>
                        <option value="Basic" class="text-neutral-800 text-foreground">Reguler (Basic)</option>
                        <option value="Pro" class="text-neutral-800 text-foreground">Privat (Pro)</option>
                        <option value="Ultimate" class="text-neutral-800 text-foreground">Ultimate</option>
                    </select>
                    <InputError :message="errors.paket" />
                </div>

                <Button
                    type="submit"
                    class="w-full mt-2"
                    :disabled="isSubmitting"
                >
                    <span v-if="isSubmitting">Memproses...</span>
                    <span v-else class="flex items-center gap-2">
                        Daftar via WhatsApp
                        </span>
                </Button>

                <div class="text-center text-sm">
                    Sudah punya akun?
                    <Link :href="route('login')" class="underline underline-offset-4 hover:text-primary">
                        Login disini
                    </Link>
                </div>
            </div>

            <div
                v-if="submitResult"
                class="rounded-md p-3 text-sm font-medium"
                :class="submitResult.startsWith('ERROR') ? 'bg-destructive/15 text-destructive' : 'bg-green-500/15 text-green-700 dark:text-green-400'"
            >
                {{ submitResult.replace('SUCCESS: ', '').replace('ERROR: ', '') }}
            </div>
        </form>
    </AuthBase>
</template>
