<script setup>
import { useSambutanStore } from "../../store/sambutan-store";
import { useSnackbar } from "vue3-snackbar";
import { onMounted, ref, watch, computed } from "vue";
import { useRouter } from "vue-router";

const sambutanStore = useSambutanStore();
const snackbar = useSnackbar();
const router = useRouter();

watch(
  () => sambutanStore.errorMessage,
  () => {
    if (sambutanStore.errorMessage) {
      snackbar.add({
        type: "error",
        text: sambutanStore.errorMessage,
      });
    }
  }
);

watch(
  () => sambutanStore.isSuccessSubmit,
  () => {
    if (sambutanStore.isSuccessSubmit) {
      snackbar.add({
        type: "success",
        text: "Data Sambutan Berhasil di Simpan",
      });

      router.back();
    }
  }
);

const sambutanForm = ref({
  namaKetuaSenat: "",
  judul: "",
  isi: "",
});

const fotoFile = ref(null);

function onChangeFoto(e) {
  fotoFile.value = e.target.files[0];
}

function onClickSubmit(e) {
  e.preventDefault();
  sambutanStore.saveSambutan(sambutanForm.value, fotoFile.value);
}
</script>
<template>
  <form class="form" @submit.prevent="onClickSubmit">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="inputName">Nama Ketua Senat</label>
              <input
                type="text"
                id="name"
                class="form-control"
                placeholder="Isi Nama Ketua Senat"
                v-model="sambutanForm.namaKetuaSenat"
                required
              />
            </div>
            <div class="form-group">
              <label for="input">Judul</label>
              <input
                type="text"
                id="title"
                class="form-control"
                placeholder="Isi Judul Disini"
                v-model="sambutanForm.judul"
                required
              />
            </div>
          </div>
          <div class="form-group col-md-12">
            <label>Sambutan Ketua Senat</label>
            <textarea
              class="form-control"
              rows="4"
              placeholder="Isi Sambutan Ketua Senat"
              v-model="sambutanForm.isi"
            >
            </textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Foto</label>
          <div class="input-group">
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="exampleInputFile"
                @change="onChangeFoto"
              />
              <label class="custom-file-label" for="exampleInputFile">
                {{
                  fotoFile == null
                    ? "Temukan Foto dari Komputer Anda"
                    : fotoFile.name
                }}
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <input type="submit" class="btn btn-primary w-100" value="Kirim" />
      </div>
    </div>
  </form>
</template>
