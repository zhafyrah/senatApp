<script setup>
import { useKeanggotaanStore } from "../store/keanggotaan-store"
import { useSnackbar } from "vue3-snackbar";
import { onMounted, watch, computed, ref } from 'vue';
import KeanggotaanField from "./KeanggotaanField.vue";

const form = ref({
    ketuaSenat: '',
    pendidikanKetuaSenat: '',
    sekertarisSenatName: '',
    pendidikanSekertarisSenat: '',
    ketuaKomisiA: '',
    pendidikanKetuaKomisiA: '',
    ketuaKomisiB: '',
    pendidikanKetuaKomisiB: '',
    ketuaKomisiC: '',
    pendidikanKetuaKomisiC: '',
    ketuaKomisiD: '',
    pendidikanKetuaKomisiD: '',
    anggotaKomisiA: '',
    pendidikanAnggotaKomisiA: '',
    anggotaKomisiB: '',
    pendidikanAnggotaKomisiB: '',
    anggotaKomisiC: '',
    pendidikanAnggotaKomisiC: '',
    anggotaKomisiD: '',
    pendidikanAnggotaKomisiD: '',
})

</script>
<template>
    <div class="d-flex flex-column my-5">
        <KeanggotaanField label-name="Ketua Senat" v-model:name="form.ketuaSenat"
            v-model:pendidikan="form.pendidikanKetuaSenat" />
        <div class="mt-3">
            <KeanggotaanField label-name="Sekertaris Senat" v-model:name="form.sekertarisSenatName"
                v-model:pendidikan="form.pendidikanSekertarisSenat" />
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <KeanggotaanField label-name="Ketua Komisi A" v-model:name="form.ketuaKomisiA"
                    v-model:pendidikan="form.pendidikanKetuaKomisiA" col-class="col-sm-6" show-border />
            </div>
            <div class="col-md-3">
                <KeanggotaanField label-name="Ketua Komisi B" v-model:name="form.ketuaKomisiB"
                    v-model:pendidikan="form.pendidikanKetuaKomisiB" col-class="col-sm-6" show-border />
            </div>
            <div class="col-md-3">
                <KeanggotaanField label-name="Ketua Komisi C" v-model:name="form.ketuaKomisiC"
                    v-model:pendidikan="form.pendidikanKetuaKomisiC" col-class="col-sm-6" show-border />
            </div>
            <div class="col-md-3">
                <KeanggotaanField label-name="Ketua Komisi D" v-model:name="form.ketuaKomisiD"
                    v-model:pendidikan="form.pendidikanKetuaKomisiD" col-class="col-sm-6" show-border />
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <KeanggotaanField label-name="Anggota Komisi A" v-model:name="form.anggotaKomisiA"
                    v-model:pendidikan="form.pendidikanAnggotaKomisiA" col-class="col-sm-6" show-border />
            </div>
            <div class="col-md-3">
                <KeanggotaanField label-name="Anggota Komisi B" v-model:name="form.anggotaKomisiB"
                    v-model:pendidikan="form.pendidikanAnggotaKomisiB" col-class="col-sm-6" show-border />
            </div>
            <div class="col-md-3">
                <KeanggotaanField label-name="Anggota Komisi C" v-model:name="form.anggotaKomisiC"
                    v-model:pendidikan="form.pendidikanAnggotaKomisiC" col-class="col-sm-6" show-border />
            </div>
            <div class="col-md-3">
                <KeanggotaanField label-name="Anggota Komisi D" v-model:name="form.anggotaKomisiD"
                    v-model:pendidikan="form.pendidikanAnggotaKomisiD" col-class="col-sm-6" show-border />
            </div>
        </div>
    </div>
</template>