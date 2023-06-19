<script setup>
import { Vue3Snackbar } from "vue3-snackbar";

const emit = defineEmits(['loading-emit'])


</script>
<template>
    <div class="p-0">
        <slot />
        <Vue3Snackbar bottom right :duration="10000"></Vue3Snackbar>
    </div>
</template>