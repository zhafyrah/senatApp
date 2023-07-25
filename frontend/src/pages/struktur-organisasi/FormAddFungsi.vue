<script setup>
import { useFungsiKerjaStore } from "../../store/fungsi-kerja-store";
import { useSnackbar } from "vue3-snackbar";
import { onMounted, ref, watch, computed } from "vue";
import { useRouter } from "vue-router";

const fungsiKerjaStore = useFungsiKerjaStore();
const snackbar = useSnackbar();
const router = useRouter();

watch(
  () => fungsiKerjaStore.errorMessage,
  () => {
    if (fungsiKerjaStore.errorMessage) {
      snackbar.add({
        type: "error",
        text: fungsiKerjaStore.errorMessage,
      });
    }
  }
);

watch(
  () => fungsiKerjaStore.isSuccessSubmit,
  () => {
    if (fungsiKerjaStore.isSuccessSubmit) {
      snackbar.add({
        type: "success",
        text: "Data Fungsi Kerja Berhasil di Simpan",
      });

      router.back();
    }
  }
);

const fungsiKerjaForm = ref({
  komisi: "",
  ketuaKomisi: "",
  anggota1: "",
  anggota2: "",
  anggota3: "",
  fungsiKerja: "",
});

function onClickSubmit(e) {
  e.preventDefault();
  fungsiKerjaStore.saveFungsiKerja(fungsiKerjaForm.value);
}
</script>
<template>
  <div class="card">
    <form class="form" @submit.prevent="onClickSubmit">
      <div class="card-body">
        <div class="form-group">
          <label>Komisi</label>
          <select
            class="form-control"
            v-model="fungsiKerjaForm.komisi"
            required
          >
            <option selected disabled value="">Silahkan Pilih Komisi</option>
            <option value="Komisi A">Komisi A</option>
            <option value="Komisi B">Komisi B</option>
            <option value="Komisi C">Komisi C</option>
            <option value="Komisi D">Komsisi D</option>
          </select>
        </div>
        <div class="form-group">
          <label for="inputEmail">Ketua Komisi</label>
          <div class="form">
            <input
              type="text"
              class="form-control"
              placeholder="Ketua Komisi"
              v-model="fungsiKerjaForm.ketuaKomisi"
              required
            />
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail">Anggota 1</label>
          <div class="form">
            <input
              type="text"
              class="form-control"
              placeholder="Nama Anggota 1"
              v-model="fungsiKerjaForm.anggota1"
            />
          </div>
        </div>
        <div class="form-group">
          <label for="inputName">Anggota 2</label>
          <input
            type="text"
            class="form-control"
            placeholder="Nama Anggota 2"
            v-model="fungsiKerjaForm.anggota2"
          />
        </div>
        <div class="form-group">
          <label for="input">Anggota 3</label>
          <input
            type="text"
            class="form-control"
            placeholder="Nama Anggota 3"
            v-model="fungsiKerjaForm.anggota3"
          />
        </div>
        <div class="form-group">
          <label for="inputContent">Fungsi Kerja</label>
          <textarea
            class="form-control"
            rows="3"
            placeholder="Fungsi Kerja"
            v-model="fungsiKerjaForm.fungsiKerja"
          ></textarea>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary w-100">Kirim</button>
      </div>
    </form>
  </div>
</template>
