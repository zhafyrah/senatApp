<script setup>
import BaseIcon from "../components/BaseIcon.vue";
import { mdiFacebook, mdiTwitter, mdiGoogle, mdiInstagram, mdiYoutube } from '@mdi/js';

</script>
<template>
    <footer id="sticky-footer" class="footer flex-shrink-0 mt-auto py-3 bg-body-tertiary">
        <div class="px-4 py-2">
            <div class="row gy-4 gx-5 text-white">
                <div class="col-md-6">
                    <h4 class="text-white text-bold">Kontak Kami</h4>
                    <table class="table table-borderless small">
                        <tr>
                            <td>Address</td>
                            <td>: &nbsp;</td>
                            <td>Jl. Raya LohBener Lama No. 08 Indramayu</td>
                        </tr>
                        <tr>
                            <td>Mail</td>
                            <td>: &nbsp;</td>
                            <td>example@mail.com</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>: &nbsp;</td>
                            <td>+628111000</td>
                        </tr>
                    </table>
                    <div class="mt-4">
                        <router-link to="/home" class="mr-2">
                            <BaseIcon :path="mdiFacebook" size="20" />
                        </router-link>
                        <router-link to="/home" class="mr-2">
                            <BaseIcon :path="mdiTwitter" size="20" />
                        </router-link>
                        <router-link to="/home" class="mr-2">
                            <BaseIcon :path="mdiGoogle" size="20" />
                        </router-link>
                        <router-link to="/home" class="mr-2">
                            <BaseIcon :path="mdiInstagram" size="20" />
                        </router-link>
                        <router-link to="/home" class="mr-2">
                            <BaseIcon :path="mdiYoutube" size="20" />
                        </router-link>
                    </div>
                </div>
                <div class="col-md-2 mt-4 mt-md-0 lh-lg">
                    <h4 class="text-white text-bold">Jurusan</h4>
                    <ul class="list-unstyled">
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                Teknik Mesin
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                Teknik Pendingin &amp; Tata Udara
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                Teknik Informatika
                            </router-link>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 mt-4 mt-md-0 lh-lg">
                    <h4 class="text-white text-bold">Pusat Aplikasi</h4>
                    <ul class="list-unstyled">
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                SIAKAD
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                E-Learning
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                Senat Polindra
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                Polindra
                            </router-link>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 mt-4 mt-md-0 lh-lg">
                    <h4 class="text-white text-bold">Unit Kegiatan Mahasiswa</h4>
                    <ul class="list-unstyled">
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                RPI
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                Kotak Pena
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                POPI
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                Sebura
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                Folafo
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                KOMPA
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                IMMAS
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/home" class="d-flex align-items-center">
                                <span class="text-warning mr-2">***</span>
                                Pramuka
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>
<style scoped lang="scss">
.footer {
    background-color: rgb(53, 53, 116);
}
.table{
    td{
        padding: 0 !important;
    }
}

a{
    color: white;
}
</style>