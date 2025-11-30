<script setup lang="ts">
import AppLayout from '@/layouts/AdminLayout.vue';
import { dashboard } from '@/routes/admin';
import { type BreadcrumbItem } from '@/types';
import UserCircle from '@/components/Icon/UserCircle.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Modul from '@/components/Icon/Modul.vue';
import Card from '@/components/admin/Card.vue';
import {Actifity ,MActivity} from '@/types/DashboardAdmin';

const page = usePage();
const user = page.props.auth.user;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
const props = defineProps<{
    users : number ,
    modul : number ,
    userActivity : Actifity[],
    moduleActivity : MActivity[]
}>();
console.log('Data userActifity:', props.userActivity);
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="flex flex-col gap-6 h-full">

                <Card class="flex flex-col justify-center h-32 rounded-xl px-8 shadow-lg">
                    <h1 class="font-montserrat text-3xl font-bold leading-relaxed">Selamat Datang, {{ user.name }}</h1>
                    <p class=" mt-4">Berikut adalah ringkasan aktivitas hari ini.</p>
                </Card>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <Card class="p-6 rounded-xl shadow-sm flex items-center justify-between">
                        <div>
                            <p class="font-mona text-sm">Total User</p>
                            <p class="text-4xl font-bold font-mona mt-1">{{ props.users }}</p>
                        </div>
                        <UserCircle class="w-12 h-12" />

                    </Card>

                    <Card class="p-6rounded-xl shadow-sm flex items-center justify-between">
                        <div>
                            <p class="font-mona text-sm">Total Modul</p>
                            <p class="text-4xl font-bold font-mona mt-1">{{ props.modul }}</p>
                        </div>
                            <Modul class="w-12 h-12" />
                    </Card>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 flex-1 min-h-0">

                    <Card class="rounded-xl border shadow-sm p-6 flex flex-col">
                        <h3 class="font-bold text-lg mb-4 font-montserrat">Pendaftar Terbaru :</h3>
                        <div class="bg-neutral-900 border border-neutral-800 rounded-sm transition hover:border-neutral-700"/>
                        <div class="flex flex-row justify-between">
                            <div class="flex items-center gap-3 flex-1 min-w-0 mr-4">
                                <p class="text-md my-2 font-montserrat">No</p>
                                <p class="text-md my-2 font-montserrat">Nama</p>
                            </div>
                            <p class="text-md my-2 font-montserrat">Email</p>
                        </div>

                        <div class="bg-neutral-900 border border-neutral-800 rounded-sm transition hover:border-neutral-700"/>
                        <div class="overflow-y-auto flex-1 space-y-3 pr-2 mt-2">
                            <div v-for="(actifity , index) in userActivity" :key="actifity.id" class="flex justify-between text-left py-2">
                                <div class="flex items-center gap-3 flex-1 min-w-0 mr-4">
                                    <span class="font-mono text-sm w-6 flex-shrink-0">
                                        {{ index + 1 }}.
                                    </span>
                                    <span class="font-medium" :title="actifity.name">
                                        {{ actifity.name }}
                                    </span>
                                </div>
                                <span>{{actifity.email}}</span>
                            </div>
                        </div>
                    </Card>

                    <Card class="rounded-xl shadow-sm p-6 flex flex-col">
                        <h3 class="font-bold text-lg mb-4 font-montserrat">Modul Terbaru :</h3>
                        <div class="bg-neutral-900 border border-neutral-800 rounded-sm transition hover:border-neutral-700"/>
                        <div class="flex flex-row justify-between">
                            <div class="flex items-center gap-3 flex-1 min-w-0 mr-4">
                                <p class="text-md my-2 font-montserrat">No</p>
                                <p class="text-md my-2 font-montserrat">Judul</p>
                            </div>
                            <p class="text-md my-2 font-montserrat">Status</p>
                        </div>
                        <div class="bg-neutral-900 border border-neutral-800 rounded-sm transition hover:border-neutral-700"/>
                        <div class="overflow-y-auto flex-1 space-y-3 pr-2 mt-2">
                            <div v-for="(module , index) in moduleActivity" :key="module.id" class="flex justify-between text-left  py-2">
                                <div class="flex items-center gap-3 flex-1 min-w-0 mr-4">
                                    <span class="font-mono text-sm w-6 flex-shrink-0">
                                        {{ index + 1 }}.
                                    </span>
                                    <span class="font-medium" :title="module.title">
                                        {{ module.title }}
                                    </span>
                                </div>
                                <span>{{module.status}}</span>
                            </div>
                        </div>
                    </Card>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
