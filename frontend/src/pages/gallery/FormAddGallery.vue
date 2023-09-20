<script setup>
import { useGalleryStore } from "../../store/gallery-store";
import { useSnackbar } from "vue3-snackbar";
import { onMounted, ref, watch, computed } from "vue";
import { useRouter, useRoute } from "vue-router";

const galleryStore = useGalleryStore();
const snackbar = useSnackbar();
const router = useRouter();
const route = useRoute();
const isEdit = computed(() => route.params.id !== null);

onMounted(() => {
  if (route.params.id) {
    galleryStore.getGalleryById(route.params.id);
    galleryForm.value = galleryStore.singleData;
  } else {
    // galleryStore.clearForm();
  }
});

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

const galleryForm = ref({
  keterangan: "",
});

const fotoFile = ref(null);
const fotoUrl = ref("");
const fotoName = ref("");

watch(
  () => galleryStore.singleData,
  () => {
    const data = galleryStore.singleData;
    galleryForm.value = data;
    fotoUrl.value = data.foto_path;
    fotoName.value = data.foto_name;
  }
);

watch(
  () => galleryStore.isSuccessSubmit,
  () => {
    if (galleryStore.isSuccessSubmit) {
      snackbar.add({
        type: "success",
        text: "Foto Berhasil Disimpan",
      });

      router.back();
    }
  }
);

function onChangeFoto(e) {
  fotoFile.value = e.target.files[0];
}

function onClickSubmit(e) {
  e.preventDefault();
  if (route.params.id) {
    galleryStore.updateGallery(
      route.params.id,
      galleryForm.value, // Pastikan ini memiliki nilai yang sesuai
      fotoFile.value // Pastikan ini memiliki nilai yang sesuai
    );
  } else {
    galleryStore.saveGallery(galleryForm.value, fotoFile.value);
  }
}
</script>
<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">
        Silahkan {{ isEdit ? "Perbarui" : "Tambah" }} Foto
      </h4>
    </div>
    <form @submit.prevent="onClickSubmit" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label for="input">Keterangan</label>
          <input
            type="text"
            class="form-control"
            id="photo"
            placeholder="Isi Keterangan Foto"
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
          <div v-if="route.params.id">
            <img :src="fotoUrl" alt="" />
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary w-100">Unggah</button>
      </div>
    </form>
  </div>
</template>
