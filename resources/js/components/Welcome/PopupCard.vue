<script setup lang="ts">
// (Perbaikan ESLint) Terima prop 'show' dari induk
defineProps<{
    show: boolean
}>()

// Tentukan event 'close' yang bisa dipancarkan
const emit = defineEmits(['close']);

// Fungsi untuk memancarkan event 'close'
function close() {
    emit('close');
}
</script>

<template>
    <Transition
        enter-active-class="transition-opacity duration-300 ease-out"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-opacity duration-200 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="show"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/70"
            @click.self="close"
        >
            <div
                class="relative w-full max-w-2xl p-6 mx-4 bg-neutral-800 rounded-lg shadow-xl"
            >
                <button
                    class="absolute top-4 right-4 text-gray-400 transition-colors hover:text-white"
                    @click="close"
                    aria-label="Tutup popup"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>

                <slot></slot>

            </div>
        </div>
    </Transition>
</template>
