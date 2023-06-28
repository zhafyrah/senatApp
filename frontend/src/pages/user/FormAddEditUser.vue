<script setup>
import { useUserStore } from "../../store/user-store"
import { useMstStore } from "../../store/mst-store"
import { useSnackbar } from "vue3-snackbar";
import { onMounted, ref, watch, computed } from 'vue';
import { useRouter } from "vue-router";
import { ucwords } from "../../utils/formating-utils"

const userStore = useUserStore()
const mstStore = useMstStore()
const snackbar = useSnackbar()
const router = useRouter()

const roleData = computed(() => mstStore.roleData)

onMounted(() => {
  mstStore.getRoles()
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
        text: "User Berhasil di Simpan",
      })

      router.back()
    }
  }
)

const userForm = ref({
  nama: '',
  role: 0,
  status: 0,
  email: '',
  password: ''
});

function onChangeStatus(e) {
  userForm.value.status = e.target.checked
}

function onClickSubmit(e) {
  e.preventDefault();
  userStore.saveUser(userForm.value)
}


</script>
<template>
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Silahkan Tambahkan User</h5>
    </div>
    <form class="form-user" @submit.prevet="onClickSubmit">
      <div class="card-body">
        <div class="form-group">
          <label for="inputEmail">Nama</label>
          <div class="form">
            <input type="text" class="form-control" placeholder="Silahkan Isi Nama" v-model="userForm.nama" required />
          </div>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select class="form-control" v-model="userForm.role" required>
            <option selected disabled value="0">Silahkan Pilih Role</option>
            <option v-for="item in roleData" :value="item.id">{{ ucwords(item.role) }}</option>
          </select>
        </div>
        <!--  <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
          <div class="custom-control custom-switch ml-2">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" @change="onChangeStatus"/>
            <label class="custom-control-label" for="customSwitch1"></label>
          </div>
        </div> -->
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <div class="form">
            <input type="email" class="form-control" placeholder="Silahkan Isi Email" v-model="userForm.email" required />
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3">Password</label>
          <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
            v-model="userForm.password" required />
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary w-100">Submit</button>
      </div>
    </form>
  </div>
</template>
