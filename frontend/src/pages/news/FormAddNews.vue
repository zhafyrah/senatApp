<script setup>
import { useBeritaStore } from "../../store/berita-store";
import { useSnackbar } from "vue3-snackbar";
import { onMounted, ref, watch, computed } from "vue";
import Datepicker from "vue3-datepicker";
import { useRouter, useRoute } from "vue-router";

const beritaStore = useBeritaStore();
const snackbar = useSnackbar();
const router = useRouter();
const route = useRoute();

onMounted(() => {
  //beritaStore.$reset()
});

watch(
  () => beritaStore.errorMessage,
  () => {
    if (beritaStore.errorMessage) {
      snackbar.add({
        type: "error",
        text: beritaStore.errorMessage,
      });
    }
  }
);

watch(
  () => beritaStore.isSuccessSubmit,
  () => {
    if (beritaStore.isSuccessSubmit) {
      snackbar.add({
        type: "success",
        text: "Data Berita Berhasil di Simpan",
      });

      router.back();
    }
  }
);

const beritaForm = ref({
  judul: "",
  tanggal_unggah: new Date(),
  isi: "",
});

const fotoFile = ref(null);

function onChangeFoto(e) {
  fotoFile.value = e.target.files[0];
}

function onSubmit(e) {
  e.preventDefault();
  beritaStore.saveBerita(beritaForm.value, fotoFile.value);
}
</script>
<template>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Silahkan Tambahkan Berita</h4>
      </div>
    </div>
    <form @submit.prevent="onSubmit">
      <div class="card-body">
        <div class="form-group">
          <label for="inputNews">Judul Berita</label>
          <input
            v-model="beritaForm.judul"
            type="text"
            class="form-control"
            id="news"
            placeholder="Judul Berita"
            required
          />
        </div>
        <div class="form-group">
          <label>Tanggal Unggah</label>
          <Datepicker
            v-model="beritaForm.tanggal_unggah"
            placeholder="Tanggal Unggah"
            class="form-control"
            required
          />
        </div>
        <div class="form-group">
          <label for="inputContent">Isi Berita</label>
          <textarea
            v-model="beritaForm.isi"
            class="form-control"
            rows="3"
            placeholder="Isi berita"
            required
          ></textarea>
        </div>
        <div class="form-group">
          <label for="inputPhoto">Foto</label>
          <div class="input-group">
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                accept="image/*"
                @change="onChangeFoto"
                required
              />
              <label class="custom-file-label" for="inputPhoto">
                {{
                  fotoFile == null ? "Pilih foto dari perangkat" : fotoFile.name
                }}
              </label>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>
