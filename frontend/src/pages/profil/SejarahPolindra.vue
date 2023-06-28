<script setup>
import { useSejarahStore } from "../../store/sejarah-store"
import { useSnackbar } from "vue3-snackbar";
import { onMounted, watch, computed } from 'vue';
import Pagination from "../../components/Pagination.vue";
import { showConfirm } from "../../utils/notif-utils"

const sejarahStore = useSejarahStore()
const snackbar = useSnackbar()

const sejarahData = computed(() => {
  return sejarahStore.sejarahData
})

const page = computed(() => {
  return sejarahStore.page
})

const totalPage = computed(() => {
  return sejarahStore.totalPage
})

onMounted(() => {
  sejarahStore.getList()
})

watch(
  () => sejarahStore.errorMessage,
  () => {
    if (sejarahStore.errorMessage)
    {
      snackbar.add({
        type: 'error',
        text: sejarahStore.errorMessage,
      })
    }
  }
)

watch(
  () => sejarahStore.isSuccessSubmit,
  () => {
    if (sejarahStore.isSuccessSubmit && sejarahStore.submitMessage)
    {
      snackbar.add({
        type: 'success',
        text: sejarahStore.submitMessage,
      })

      sejarahStore.getList()
    }
  }
)

function onCLickNext() {
  if (sejarahStore.page < sejarahStore.totalPage)
  {
    sejarahStore.page++;
    sejarahStore.getList()
  } else
  {
    snackbar.add({
      type: "warning",
      text: "Sudah Mencapai Halaman Maximum"
    })
  }
}

function onClickPrev() {
  if (sejarahStore.page > 0)
  {
    sejarahStore.page--;
    sejarahStore.getList()
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
  sejarahStore.page = number
  sejarahStore.getList()
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
        sejarahStore.deleteSejarah(e.target.id)
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
                <router-link to="/tambah-sejarah">
                  <button type="button" class="btn btn-block btn-primary">
                    <i class="fas fa-plus mr-2"></i>Tambah Sejarah
                  </button>
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
                    <td>Sejarah polindra</td>
                    <td>Berdiri pada tahun ...</td>
                    <td><i class="fas fa-pen"></i></td>
                  </tr> -->
                  <tr v-if="sejarahData.length == 0" class="text-center border">
                    <td colspan="3">Data Sejarah Kosong</td>
                  </tr>
                  <tr v-for="(gallery, i) in sejarahData" :key="i">
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
