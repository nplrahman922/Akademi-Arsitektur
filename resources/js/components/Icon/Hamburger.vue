<template>
    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none" viewBox="0 0 24 24"
         :width="size" :height="size"
         stroke-width="1.5"
         :stroke="color"
         class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
    </svg>
</template>

<script setup lang="ts">
defineProps({
    size: {
        type: String,
        default: '24'
    },
    color: {
        type: String,
        default: 'white'
    }
})
</script>
