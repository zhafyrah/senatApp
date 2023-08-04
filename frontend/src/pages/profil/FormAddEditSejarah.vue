<script setup>
import { useSejarahStore } from "../../store/sejarah-store";
import { useSnackbar } from "vue3-snackbar";
import { onMounted, ref, watch, computed } from "vue";
import { useRouter } from "vue-router";

const sejarahStore = useSejarahStore();
const snackbar = useSnackbar();
const router = useRouter();

watch(
  () => sejarahStore.errorMessage,
  () => {
    if (sejarahStore.errorMessage) {
      snackbar.add({
        type: "error",
        text: sejarahStore.errorMessage,
      });
    }
  }
);

watch(
  () => sejarahStore.isSuccessSubmit,
  () => {
    if (sejarahStore.isSuccessSubmit) {
      snackbar.add({
        type: "success",
        text: "Sejarah Berhasil Disimpan",
      });

      router.back();
    }
  }
);

const sejarahForm = ref({
  judul: "",
  isi: "",
});

const fotoFile = ref(null);

function onChangeFoto(e) {
  fotoFile.value = e.target.files[0];
}

function onClickSubmit(e) {
  e.preventDefault();
  sejarahStore.saveSejarah(sejarahForm.value, fotoFile.value);
}
</script>
<template>
  <form class="form" @submit.prevent="onClickSubmit">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="form-group col-md-12">
            <label for="input">Judul</label>
            <input
              type="text"
              id="title"
              class="form-control"
              placeholder="Isi Judul Disini"
              v-model="sejarahForm.judul"
              required
            />
          </div>
          <div class="form-group col-md-12">
            <label>Isi Sejarah Polindra</label>
            <textarea
              class="form-control"
              rows="4"
              placeholder="Isi Sambutan Ketua Senat"
              v-model="sejarahForm.isi"
              required
            ></textarea>
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
      <div class="form-group">
        <input type="submit" class="btn btn-primary w-100" value="Kirim" />
      </div>
    </div>
  </form>
</template>
