<script setup lang="ts">

</script>

<template>
    <div class="background-waves">
        <slot />
    </div>
</template>

<style scoped>
.background-waves {
    background: linear-gradient(
        45deg,
        #262626,
        #171717,
        #0a0a0a
    );
    background-size: 400% 400%;
    animation: gradientWave 10s ease infinite;

    /* Opsional: pastikan wrapper mengisi setidaknya seluruh layar */
    min-height: 100vh;
}

@keyframes gradientWave {
    0% { background-position: 0 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0 50%; }
}
</style>
