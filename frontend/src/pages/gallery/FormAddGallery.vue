<script setup>
import { useGalleryStore } from "../../store/gallery-store";
import { useSnackbar } from "vue3-snackbar";
import { onMounted, ref, watch, computed } from "vue";
import { useRouter } from "vue-router";

const galleryStore = useGalleryStore();
const snackbar = useSnackbar();
const router = useRouter();

watch(
  () => galleryStore.errorMessage,
  () => {
    if (galleryStore.errorMessage) {
      snackbar.add({
        type: "error",
        text: galleryStore.errorMessage,
      });
    }
  }
);

watch(
  () => galleryStore.isSuccessSubmit,
  () => {
    if (galleryStore.isSuccessSubmit) {
      snackbar.add({
        type: "success",
        text: "Foto Berhasil di Simpan",
      });

      router.back();
    }
  }
);

const galleryForm = ref({
  keterangan: "",
});

const fotoFile = ref(null);

function onChangeFoto(e) {
  fotoFile.value = e.target.files[0];
}

function onClickSubmit(e) {
  e.preventDefault();
  galleryStore.saveGallery(galleryForm.value, fotoFile.value);
}
</script>
<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Silahkan Tambahkan Foto</h4>
    </div>
    <form @submit.prevent="onClickSubmit">
      <div class="card-body">
        <div class="form-group">
          <label for="input">Keterangan</label>
          <input
            type="text"
            class="form-control"
            id="photo"
            placeholder="Keterangan Foto"
            v-model="galleryForm.keterangan"
            required
          />
        </div>
        <div class="form-group">
          <label for="inputPhoto">Foto</label>
          <div class="input-group">
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="exampleInputFile"
                @change="onChangeFoto"
              />
              <label class="custom-file-label" for="exampleInputFile">{{
                fotoFile == null
                  ? "Temukan Foto dari Komputer Anda"
                  : fotoFile.name
              }}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary w-100">Unggah</button>
      </div>
    </form>
  </div>
</template>
