<script setup>
import { Vue3Snackbar } from "vue3-snackbar";
import { onMounted } from "vue";
import HomeHeader from "../components/HomeHeader.vue"
import HomeFooter from "../components/HomeFooter.vue";

const emit = defineEmits(['loading-emit'])

onMounted(() => {
    //document.body.classList = "d-flex flex-column"
    //document.body.style.height = null
})

</script>
<template>
    <div class="d-flex flex-column vh-100">
        <HomeHeader />
        <main class="flex-grow-1">
            <slot />
        </main>
        <HomeFooter />
        <Vue3Snackbar bottom right :duration="10000"></Vue3Snackbar>
    </div>
</template>
<style lang="scss">
html{
    height: 100% !important;
    min-height: 100% !important;
}
</style>