<script setup>
import { useDokPlenoStore } from "../../store/dokumen-pleno-store";
import { useSnackbar } from "vue3-snackbar";
import { onMounted, ref, watch, computed } from "vue";
import Datepicker from "vue3-datepicker";
import { useRouter, useRoute } from "vue-router";

const dokStore = useDokPlenoStore();
const snackbar = useSnackbar();
const router = useRouter();
const route = useRoute();

watch(
  () => dokStore.errorMessage,
  () => {
    if (dokStore.errorMessage) {
      snackbar.add({
        type: "error",
        text: dokStore.errorMessage,
      });
    }
  }
);

watch(
  () => dokStore.isSuccessSubmit,
  () => {
    if (dokStore.isSuccessSubmit) {
      snackbar.add({
        type: "success",
        text: "Dokumen Berhasil di Simpan",
      });

      router.back();
    }
  }
);

const dokForm = ref({
  noSurat: "",
  tanggal_unggah: new Date(),
  keterangan: "",
  status: "",
});

const dokFile = ref(null);

function onChangeDok(e) {
  dokFile.value = e.target.files[0];
}

function onSubmit(e) {
  e.preventDefault();
  dokStore.saveDokPleno(dokForm.value, dokFile.value);
}
</script>
<template>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h5>Dokumen</h5>
      </div>
    </div>
    <form @submit.prevent="onSubmit">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="inputName">No Surat</label>
              <input
                type="text"
                id="nosurat"
                class="form-control"
                v-model="dokForm.no_surat"
                required
              />
            </div>
            <div class="form-group">
              <label>Tanggal Unggah</label>
              <Datepicker
                v-model="dokForm.tanggal_unggah"
                placeholder="Tanggal Unggah"
                class="form-control"
                required
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="inputEmail">Keterangan</label>
              <input
                type="text"
                id="keterangan"
                class="form-control"
                v-model="dokForm.keterangan"
                required
              />
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" v-model="dokForm.status" required>
                <option selected disabled value="">
                  Silahkan Pilih Status
                </option>
                <option value="Belum Disahkan">Belum Disahkan</option>
                <option value="Dipertimbangkan">Dipertimbangkan</option>
                <option value="Disahkan">Disahkan</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Unggah Dokumen</label>
          <div class="input-group">
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="exampleInputFile"
                @change="onChangeDok"
              />
              <label class="custom-file-label" for="exampleInputFile">{{
                dokFile == null
                  ? "Temukan Dokumen dari Komputer Anda"
                  : dokFile.name
              }}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-primary w-100">Kirim</button>
      </div>
    </form>
  </div>
</template>
