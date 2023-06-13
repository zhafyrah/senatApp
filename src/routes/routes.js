const routes = [
    //make
    {
        path: "/auth/login",
        name: "Login",
        component: () => import("../pages/auth/Login.vue"),
    },
    {
        path: "/",
        name: "Beranda",
        component: () => import("../pages/dashboard.vue"),
    },
    {
        path: "/dokumen-pleno",
        name: "Dokumen Pleno",
        component: () => import("../pages/dokumen/DokumenPleno.vue"),
    },
    {
        path: "/dokumen/tambah",
        name: "Tambah Dokumen",
        component: () => import('../pages/dokumen/FormAddDokumen.vue'),
    },
    {
        path: "/dokumen-komisi",
        name: "Dokumen Komisi",
        component: () => import("../pages/dokumen/DokumenKomisi.vue"),
    },
    {
        path: "/detail-1",
        name: "Dokumen",
        component: () => import("../pages/dokumen/DetailDokumen.vue")
    },
    {
        path: "/tambah-fungsi",
        name: "Tambah Fungsi Kerja",
        component: () => import("../pages/struktur-organisasi/FormAddStruktur.vue"),
    },
    {
        path: "/anggota",
        name: "Keanggotaan",
        component: () => import("../pages/struktur-organisasi/Keanggotaan.vue"),
    },
    {
        path: "/fungsi-kerja",
        name: "Fungsi Kerja",
        component: () => import("../pages/struktur-organisasi/FungsiKerja.vue"),
    },
    {
        path: "/berita",
        name: "Berita",
        component: () => import("../pages/news/News.vue"),
    },
    {
        path: "/tambah-berita",
        name: "Tambah Berita",
        component: () => import("../pages/news/FormAddNews.vue"),
    },
    {
        path: "/detail-berita",
        name: "Detail Berita",
        component: () => import("../pages/news/DetailNews.vue"),
    },
    {
        path: "/profil",
        name: "Sambutan Ketua Senat",
        component: () => import("../pages/profil/SambutanKetua.vue"),
    },
    {
        path: "/tambah-sambutan",
        name: "Tambah Sambutan Ketua Senat",
        component: () => import("../pages/profil/FormAddEditSambutan.vue"),
    },
    {
        path: "/sejarah",
        name: "Sejarah Polindra",
        component: () => import("../pages/profil/SejarahPolindra.vue"),
    },
    {
        path: "/tambah-sejarah",
        name: "Tambah Sejarah Polindra",
        component: () => import("../pages/profil/FormAddEditSejarah.vue"),
    },
    {
        path: "/galeri",
        name: "Galeri",
        component: () => import("../pages/gallery/Gallery.vue"),
    },
    {
        path: "/tambah-foto",
        name: "Tambah Foto",
        component: () => import("../pages/gallery/FormAddGallery.vue"),
    },
    {
        path: "/user",
        name: "User",
        component: () => import("../pages/user/User.vue"),
    },
    {
        path: "/tambah-user",
        name: "Tambah User",
        component: () => import("../pages/user/FormAddEditUser.vue"),
    },
    {
        //not-found paeg
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: () => import("../pages/NotFound.vue"),
    },
];

export default routes;