<script setup>
import { useSambutanStore } from "../../store/sambutan-store"
import { useSnackbar } from "vue3-snackbar";
import { onMounted, watch, computed } from 'vue';
import Pagination from "../../components/Pagination.vue";
import { showConfirm } from "../../utils/notif-utils"

const sambutanStore = useSambutanStore()
const snackbar = useSnackbar()

const sambutanData = computed(() => {
  return sambutanStore.sambutanData
})

const page = computed(() => {
  return sambutanStore.page
})

const totalPage = computed(() => {
  return sambutanStore.totalPage
})

onMounted(() => {
  sambutanStore.getList()
})

watch(
  () => sambutanStore.errorMessage,
  () => {
    if (sambutanStore.errorMessage)
    {
      snackbar.add({
        type: 'error',
        text: sambutanStore.errorMessage,
      })
    }
  }
)

watch(
  () => sambutanStore.isSuccessSubmit,
  () => {
    if (sambutanStore.isSuccessSubmit && sambutanStore.submitMessage)
    {
      snackbar.add({
        type: 'success',
        text: sambutanStore.submitMessage,
      })

      sambutanStore.getList()
    }
  }
)

function onCLickNext() {
  if (sambutanStore.page < sambutanStore.totalPage)
  {
    sambutanStore.page++;
    sambutanStore.getList()
  } else
  {
    snackbar.add({
      type: "warning",
      text: "Sudah Mencapai Halaman Maximum"
    })
  }
}

function onClickPrev() {
  if (sambutanStore.page > 0)
  {
    sambutanStore.page--;
    sambutanStore.getList()
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
  sambutanStore.page = number
  sambutanStore.getList()
}

function confirmDelete(e) {
  e.preventDefault();
  showConfirm(
    "Konfirmasi",
    "Hapus Data?",
    "question",
    "Hapus",
    "Batal",
    (isConfirm) => {
      if (isConfirm)
      {
        sambutanStore.deleteSambutan(e.target.id)
      }
    }
  )
}
</script>
<template>
  <section class="content">
    <div class="div container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <router-link to="/tambah-sambutan" class="btn btn-primary">
                  <i class="fas fa-plus mr-1"></i> Tambah Sambutan
                </router-link>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table text-nowrap">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <!--  <tr>
                    <td>Sambutan Ketua Senat</td>
                    <td>Selamat Pagi bagi semua penonton</td>
                    <td><i class="fas fa-pen"></i></td>
                  </tr> -->
                  <tr v-if="sambutanData.length == 0" class="text-center border">
                    <td colspan="3">Data Sambutan Kosong</td>
                  </tr>
                  <tr v-for="(gallery, i) in sambutanData" :key="i">
                    <td>
                      {{ gallery.judul }}
                    </td>
                    <td>{{ gallery.isi }}</td>
                    <td class="text-center">
                      <a href="#" @click.prevent="confirmDelete">
                        <i :id="gallery.id" class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <Pagination :page="page" :total-page="totalPage" @click-prev="onClickPrev" @click-next="onCLickNext"
              @click-paginate="onClickPaginate" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
