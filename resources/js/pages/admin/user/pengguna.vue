<script setup lang="ts">
import AppLayout from '@/layouts/AdminLayout.vue';
import { dashboard } from '@/routes/admin';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { route } from 'ziggy-js'
import Card from '@/components/admin/Card.vue';
import { UsersAdmin } from '@/types/DashboardAdmin';
import Delete from '@/components/Icon/Delete.vue';
import Edit from '@/components/Icon/Edit.vue';
import { ref } from 'vue';
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogDescription,
    DialogFooter
} from '@/components/ui/dialog'
import Trashbin from '@/components/Icon/Trashbin.vue';
import Button from '@/components/admin/Button.vue'

const addPopup = ref(false)
const editPopup = ref(false);
const useredit = ref<UsersAdmin|null>(null);
const deletePopup = ref(false);
const userdelete = ref<UsersAdmin|null>(null);

const addForm = ref({
    name: "",
    email: "",
    password: "",
    role: "user",
    expired_at: ""
})

const openAdd = () => {
    addForm.value = {
        name: "",
        email: "",
        password: "",
        role: "user",
        expired_at: ""
    }
    addPopup.value = true
}

const addUser = () => {
    router.post(route('admin.users.store'), addForm.value, {
        onSuccess: () => addPopup.value = false
    })
}



const editForm = ref({
    name: "",
    email: ""
})

const confirmDelete = (user : UsersAdmin) => {
    userdelete.value = user;
    deletePopup.value = true;
};

const deleteUser = () => {
    router.delete(route('admin.users.delete', userdelete.value!.id), {
        onSuccess: () => {
            deletePopup.value = false;
        }
    });
};

const openEdit = (user: UsersAdmin) => {
    useredit.value = user

    editForm.value = {
        name: user.name,
        email: user.email
    }

    editPopup.value = true
}

const updateUser = () => {
    if (!useredit.value) return

    router.put(route('admin.users.update', useredit.value.id), editForm.value, {
        onSuccess: () => {
            editPopup.value = false
        }
    })
}

defineProps<{
    userlist: UsersAdmin[]
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
</script>

<template>
    <Head title="Users" />

    <AppLayout :breadcrumbs="breadcrumbs">

        <!-- Top Bar -->
        <div class="w-full h-auto px-6 py-4 flex justify-between items-center font-Montserrat shadow-sm">
            <div class="flex items-center gap-24">
                <p class="text-base font-medium">No</p>
                <p class="text-base font-medium">Nama</p>
            </div>

            <div class="flex items-center gap-6">
                <button
                    class="text-base font-medium hover:scale-105 cursor-pointer transition"
                    @click="openAdd"
                >
                    Tambah
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="flex flex-col gap-6 h-full">

            <Card class="h-full mx-5 mb-5 p-6 rounded-xl shadow-sm">

                <!-- Header Tabel -->
                <div class="grid grid-cols-12 font-semibold text-sm pb-3 border-b-2 border-b-neutral-600">
                    <div class="col-span-1">No</div>
                    <div class="col-span-4">Nama</div>
                    <div class="col-span-5">Email</div>
                    <div class="col-span-2 text-right">Aksi</div>
                </div>

                <!-- List User -->
                <div class="divide-y divide-neutral-400 mt-2">
                    <div
                        v-for="(user, index) in userlist"
                        :key="user.id"
                        class="grid grid-cols-12 items-center py-3 text-sm"
                    >
                        <!-- No -->
                        <div class="col-span-1">
                            <span class="font-mono">{{ index + 1 }}.</span>
                        </div>

                        <!-- Nama -->
                        <div class="col-span-4 truncate">
                            <span class="font-medium" :title="user.name">
                                {{ user.name }}
                            </span>
                        </div>

                        <!-- Email -->
                        <div class="col-span-5 truncate">
                            <span :title="user.email">
                                {{ user.email }}
                            </span>
                        </div>

                        <!-- Aksi -->
                        <div class="col-span-2 flex items-center justify-end gap-4">
                            <Delete
                                size="size-4"
                                class="hover:scale-105 cursor-pointer transition"
                                @click="confirmDelete(user)"
                            />
                            <Edit
                                @click="openEdit(user)"
                                size="size-4" class="hover:scale-105 cursor-pointer transition" />
                        </div>
                    </div>
                </div>

            </Card>

            <!-- Delete Modal -->
            <Dialog v-model:open="deletePopup">
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle class="text-center">Hapus User</DialogTitle>
                        <DialogDescription>
                            <div class="flex flex-col items-center gap-2 mt-6">
                                <Trashbin class="w-20 h-20" />
                                <div class="mt-3 max-w-2xl">
                                    <p class="font-mono">Apakah kamu yakin ingin menghapus user:</p>
                                    <p class="font-bold font-md text-center font-Montserrat">{{ userdelete?.name }} ?</p>
                                </div>
                            </div>
                        </DialogDescription>
                    </DialogHeader>

                    <DialogFooter class="mx-auto mt-6">
                        <Button color="green"
                            @click="deletePopup = false"
                        >
                            Batal
                        </Button>

                        <Button color="red"
                            @click="deleteUser"
                        >
                            Hapus
                        </Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>
            <!-- Edit Modal -->
            <Dialog v-model:open="editPopup">
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Edit User</DialogTitle>
                        <DialogDescription>
                            Ubah data user sesuai kebutuhan.
                        </DialogDescription>
                    </DialogHeader>

                    <div class="flex flex-col gap-4 mt-2">
                        <div>
                            <label class="font-medium text-sm">Nama</label>
                            <input
                                type="text"
                                v-model="editForm.name"
                                class="w-full px-3 py-2 rounded border border-gray-300 bg-background text-foreground"
                            />
                        </div>

                        <div>
                            <label class="font-medium text-sm">Email</label>
                            <input
                                type="email"
                                v-model="editForm.email"
                                class="w-full px-3 py-2 rounded border border-gray-300 bg-background text-foreground"
                            />
                        </div>
                    </div>

                    <DialogFooter>
                        <Button
                            color="green"
                            @click="editPopup = false"
                        >
                            Batal
                        </Button>

                        <Button
                            color="cyan"
                            @click="updateUser"
                        >
                            Simpan Perubahan
                        </Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>
            <!-- Tambah User Modal -->
            <Dialog v-model:open="addPopup">
                <DialogContent class="sm:max-w-md">
                    <DialogHeader>
                        <DialogTitle class="text-md font-semibold font-Montserrat">
                            Tambah User Baru
                        </DialogTitle>
                    </DialogHeader>

                    <div class="space-y-4">

                        <!-- Nama -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-medium">Nama</label>
                            <input
                                v-model="addForm.name"
                                type="text"
                                class="input p-2 rounded-lg border border-gray-500 bg-background"
                                placeholder="Masukkan nama"
                            />
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-medium">Email</label>
                            <input
                                v-model="addForm.email"
                                type="email"
                                class="input p-2 rounded-lg border border-gray-500 bg-background"
                                placeholder="Masukkan email"
                            />
                        </div>

                        <!-- Password -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-medium">Password</label>
                            <input
                                v-model="addForm.password"
                                type="password"
                                class="input p-2 rounded-lg border border-gray-500 bg-background"
                                placeholder="Password minimal 6 karakter"
                            />
                        </div>

                        <!-- Role -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-medium">Role</label>
                            <select v-model="addForm.role" class="input bg-background p-2 rounded-lg border border-gray-500">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <!-- Expired -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-medium">Expired</label>
                            <input
                                v-model="addForm.expired_at"
                                type="date"
                                class="input p-2"
                            />
                        </div>
                    </div>

                    <DialogFooter>
                        <Button
                            color="green"
                            @click="addPopup = false"
                        >
                            Batal
                        </Button>
                        <Button
                            color="cyan"
                            @click="addUser"
                        >
                            Tambahkan
                        </Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>
        </div>
    </AppLayout>
</template>
<style scoped>
input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(1);
}
</style>
