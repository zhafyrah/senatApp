<script setup>
import { useUserStore } from "../../store/user-store"
import { useSnackbar } from "vue3-snackbar";
import { onMounted, watch, computed } from 'vue';
import Pagination from "../../components/Pagination.vue";
import { showConfirm } from "../../utils/notif-utils"
import { ucwords } from "../../utils/formating-utils"

const userStore = useUserStore()
const snackbar = useSnackbar()

const userData = computed(() => userStore.userData)
const page = computed(() => userStore.page)
const totalPage = computed(() => userStore.totalPage)
const lastNumberPage = computed(() => userStore.lastNoPage)

onMounted(() => {
  //userStore.$reset()
  userStore.getList()
})

watch(
  () => userStore.errorMessage,
  () => {
    if (userStore.errorMessage)
    {
      snackbar.add({
        type: 'error',
        text: userStore.errorMessage,
      })
    }
  }
)

watch(
  () => userStore.isSuccessSubmit,
  () => {
    if (userStore.isSuccessSubmit)
    {
      snackbar.add({
        type: 'success',
        text: "Data User Berhasil di Hapus",
      })
      userStore.getList()
    }
  }
)

watch(
  () => userStore.isSuccessUpdate,
  () => {
    if (userStore.isSuccessUpdate)
    {
      snackbar.add({
        type: 'success',
        text: "Data User Berhasil di Update",
      })
      userStore.getList()
    }
  }
)

watch(
  () => userStore.isSuccessDelete,
  () => {
    if (userStore.isSuccessDelete)
    {
      snackbar.add({
        type: 'success',
        text: "Data User Berhasil di Hapus",
      })
      userStore.getList()
    }
  }
)


function onCLickNext() {
  if (userStore.page < userStore.totalPage)
  {
    userStore.page++;
    userStore.getList()
  } else
  {
    snackbar.add({
      type: "warning",
      text: "Sudah Mencapai Halaman Maximum"
    })
  }
}

function onClickPrev() {
  if (userStore.page > 0)
  {
    userStore.page--;
    userStore.getList()
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
  userStore.page = number
  userStore.getList()
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
        userStore.deleteUser(e.target.id)
      }
    }
  )
}

function onChangeStatus(e) {
  const userId = e.target.getAttribute('data-id')
  const isActive = e.target.checked;
  userStore.updateUser(userId, {
    status: isActive ? 1 : 0
  })
}

</script>
<template>
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <router-link to="/tambah-user">
          <button class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i>Tambah User
          </button>
        </router-link>
        <div class="card-tools mt-2">
          <div class="input-group input-group-sm" style="width: 200px">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" />
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Role</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="userData.length == 0" class="text-center border">
              <td colspan="5">Data User Kosong</td>
            </tr>
            <tr v-for="(user, i) in userData" :key="i">
              <td class="text-center">{{ i+=lastNumberPage }}</td>
              <td>
                {{ user.nama }}
              </td>
              <td>{{ ucwords(user.role) }}</td>
              <td class="text-center">
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" :id="'customSwitch' + user.id" :checked="user.status == 1"
                      :data-id="user.id" @change="onChangeStatus"/>
                    <label class="custom-control-label" :for="'customSwitch' + user.id"></label>
                  </div>
                </div>
              </td>
              <td class="text-center">
                <a href="#" @click.prevent="confirmDelete">
                  <i :id="user.id" class="fas fa-trash"></i>
                </a>
                <router-link :to="{ name: 'DetailBerita', params: { id: user.id } }">
                  <i class="fas fa-pen ml-3"></i>
                </router-link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <Pagination :page="page" :total-page="totalPage" @click-prev="onClickPrev" @click-next="onCLickNext"
        @click-paginate="onClickPaginate" />
    </div>
  </div>
</template>