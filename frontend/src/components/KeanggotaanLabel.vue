<script setup>
import { useKeanggotaanStore } from "../store/keanggotaan-store"
import { onMounted, watch, computed } from 'vue';
import { storeToRefs } from "pinia";

const keanggotaanStore = useKeanggotaanStore()
const { keanggotaanData } = storeToRefs(keanggotaanStore)

onMounted(async () => {
    await keanggotaanStore.getList()
})

</script>
<template>
    <div>
        <div class="d-flex flex-column my-5">
            <div class="d-flex flex-grow-1 flex-column align-items-center justify-content-center">
                <span class="mb-2">Ketua Senat</span>
                <img src="../assets/img/icon/user.png" width="40" height="40" />
                <span>Nama : </span>
                <span>Pend : </span>
            </div>
            <div class="d-flex align-self-stretch flex-column align-items-center justify-content-center mt-5">
                <span class="mb-2">Sekertaris Senat</span>
                <img src="../assets/img/icon/user.png" width="40" height="40" />
                <span>Nama : </span>
                <span>Pend : </span>
            </div>
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <span class="mb-2">Ketua Komisi A</span>
                        <img src="../assets/img/icon/user.png" width="40" height="40" />
                        <span>Nama :</span>
                        <span>Pend : </span>
                        <div class="row mt-3 p-2">
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <span class="mb-2">Ketua Komisi B</span>
                        <img src="../assets/img/icon/user.png" width="40" height="40" />
                        <span>Nama :</span>
                        <span>Pend : </span>
                        <div class="row mt-3 p-2">
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <span class="mb-2">Ketua Komisi C</span>
                        <img src="../assets/img/icon/user.png" width="40" height="40" />
                        <span>Nama :</span>
                        <span>Pend : </span>
                        <div class="row mt-3 p-2">
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <span class="mb-2">Ketua Komisi D</span>
                        <img src="../assets/img/icon/user.png" width="40" height="40" />
                        <span>Nama :</span>
                        <span>Pend : </span>
                        <div class="row mt-3 p-2">
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="mb-2">Anggota</span>
                                    <img src="../assets/img/icon/user.png" width="40" height="40" />
                                    <span>Nama : </span>
                                    <span>Pend :</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
span {
    font-size: 0.8rem;
}
</style>