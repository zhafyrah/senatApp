<script setup>
import { useBeritaStore } from "../../store/berita-store"
import { onMounted, watch, computed, ref } from 'vue';
import { useRouter, useRoute } from "vue-router";
import { storeToRefs } from "pinia";
import { generateFotoUrl } from "../../utils/formating-utils.js"
import { formatDateTimeFromServer } from "../../utils/date-utils.js"

const beritaStore = useBeritaStore()
const router = useRouter()
const route = useRoute()

const { beritaSingleData } = storeToRefs(beritaStore)

onMounted(() => {
    beritaStore.getBeritaById(route.params.id)
})

</script>
<template>
    <div>
        <div class="container py-4">
        </div>
    </div>
</template>