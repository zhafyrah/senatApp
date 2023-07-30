<script setup>
import { useBeritaStore } from "../../store/berita-store"
import { useSnackbar } from "vue3-snackbar";
import { onMounted, watch, computed } from 'vue';
import Pagination from "../../components/Pagination.vue";
import { storeToRefs } from "pinia";
import { generateFotoUrl } from "../../utils/formating-utils.js"
import { formatDateTimeFromServer } from "../../utils/date-utils.js"

const beritaStore = useBeritaStore()
const snackbar = useSnackbar()

const { beritaData } = storeToRefs(beritaStore)
const page = computed(() => {
    return beritaStore.page
})
const totalPage = computed(() => {
    return beritaStore.totalPage
})
const lastNumberPage = computed(() => {
    return beritaStore.lastNoPage
})

function onCLickNext() {
    if (beritaStore.page < beritaStore.totalPage)
    {
        beritaStore.page++;
        beritaStore.getList()
    } else
    {
        snackbar.add({
            type: "warning",
            text: "Sudah Mencapai Halaman Maximum"
        })
    }
}

function onClickPrev() {
    if (beritaStore.page > 0)
    {
        beritaStore.page--;
        beritaStore.getList()
    }
    else
    {
        snackbar.add({
            type: "warning",
            message: "Sudah Mencapai Halaman Minimum"
        })
    }
}

function onClickPaginate(number) {
    beritaStore.page = number
    beritaStore.getList()
}

onMounted(async () => {
    //beritaStore.$reset()
    await beritaStore.getList()
})
</script>
<template>
    <div class="">
        <div v-if="beritaData?.length > 0" class="container py-4">
            <h1 class="text-bold pb-4">Berita</h1>
            <hr/>
            <div class="d-flex mt-4" v-for="(berita, i) in beritaData" :key="i">
                <img :src="generateFotoUrl(berita.foto_path)" alt="" class="img-fluid mr-4" width="150" height="150" />
                <div class="d-flex flex-column">
                    <h5 class="text-bold m-0"> {{ berita.judul }} </h5>
                    <span class="text-muted small"> {{ formatDateTimeFromServer(berita.created_at) }} </span>
                    <p class="mt-3">
                        {{ berita.isi}}
                    </p>
                    <!-- <router-link class="flex-grow-1 d-flex align-items-end mb-5" :to="{ name: 'HomeDetailBerita', params: { id: berita.id } }">
                        Selengkapnya >>>
                    </router-link> -->
                </div>
            </div>
            <Pagination :page="page" :total-page="totalPage" @click-prev="onClickPrev" @click-next="onCLickNext"
            @click-paginate="onClickPaginate" />
        </div>
        <div v-else class="d-flex justify-content-center align-items-center vh-100">
            <h3 class="text-center p-5">Tidak Ada Berita</h3>
        </div>
    </div>
</template>