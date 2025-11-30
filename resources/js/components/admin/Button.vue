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
    will-change: transform;
    transform: translateZ(0);
}
.btn:hover {
    transform: scale(1.05);
}
.btn-cyan {
    background: linear-gradient(
        to right,
        #06B6D4 0%,
        #1AC2DE 60%,
        #4CCFE4 80%,
        #8ADAE8 100%
    );
}

.btn-cyan:hover {
    background: linear-gradient(
        to left,
        #06B6D4 0%,
        #1AC2DE 60%,
        #4CCFE4 80%,
        #8ADAE8 100%
    );
}

.btn-green {
    background: linear-gradient(
        to right,
        #16A34A 0%,
        #1FB857 60%,
        #48C873 80%,
        #79D594 100%
    );
}

.btn-green:hover {
    background: linear-gradient(
        to left,
        #16A34A 0%,
        #1FB857 60%,
        #48C873 80%,
        #79D594 100%
    );
}

.btn-red {
    background: linear-gradient(
        to right,
        #E53E3E 0%,
        #F15454 60%,
        #F57A7A 80%,
        #F8A8A8 100%
    );
}

.btn-red:hover {
    background: linear-gradient(
        to left,
        #E53E3E 0%,
        #F15454 60%,
        #F57A7A 80%,
        #F8A8A8 100%
    );
}

</style>
