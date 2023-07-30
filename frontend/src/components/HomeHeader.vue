<script setup>
import { useUserSession } from "../store/auth-store";
import { useRouter, useRoute, useLink } from "vue-router";

const router = useRouter()
const route = useRoute()
const session = useUserSession()

const user = session.user
</script>
<template>
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" to="/home">
                    <img src="" width="30" height="30" class="mr-3" />
                    Senat Polindra
                </a>
                <button class="navbar-toggler" type="button" data-bs-collapse="collapse" data-bs-target="homeNavbar"
                    aria-controls="homeNavbar" aria-expanded="false" aria-label="Toogle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex">
                    <div class="collapse navbar-collapse" id="homeNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <router-link class="nav-link" aria-current="page" to="/home">
                                    Beranda
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/home/keanggotaan" class="nav-link">
                                    Struktur Organisasi
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/home/berita" class="nav-link">
                                    Berita
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/home/dokumen" class="nav-link">
                                    Dokumen
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/home/galery" class="nav-link">
                                    Galeri
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/home/profil" class="nav-link">
                                    Profil
                                </router-link>
                            </li>
                        </ul>
                    </div>
                    <router-link to="/auth/login" class="btn btn-warning text-bold ml-0 ml-md-4 text-dark">
                        {{ user ? "Dashboard" : "Masuk" }}
                    </router-link>
                </div>
            </div>
        </nav>
    </header>
</template>
<style scoped lang="scss">
.header{
    background-color: rgb(53, 53, 116);
    color: white;

    a{
        color: white;
    }
}

.active{
    background-color: rgb(136, 136, 37);
    border-radius: 15px;
}
</style>