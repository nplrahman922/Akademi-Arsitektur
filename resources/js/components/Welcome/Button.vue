<script setup lang="ts">

    defineProps({
        color : {
            type: String,
            default: 'cyan'
        },
        size: {
            type: String,
            default: 'md'
        }
    })
</script>

<template>
    <button :class="[`btn` , `btn-${color}` , `btn-${size}`]">
        <slot />
    </button>
</template>

<style scoped>

    .btn {
        padding: 10px 20px;
        border-radius: 10px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s ease-in-out;
    }
    .btn:hover {
        transform: scale(1.05);
    }
    .btn-cyan {
        background: linear-gradient(
            to right,
            #06B6D4,
            #999999);

    }
    .btn-cyan:hover {
        background: linear-gradient(
            to left,
            #06B6D4,
            #999999);
    }

    .btn-green {
        background: linear-gradient(
            to right,
            #16A34A,
            #999999
        );

    }

    .btn-green:hover {
        background: linear-gradient(
            to left,
            #16A34A,
            #999999
        );
    }
</style>
