const routes = [
    //make
    {
        path: "/auth/login",
        name: "Login",
        component: () => import("../pages/auth/Login.vue"),
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: () => import("../pages/dashboard.vue"),
    },
    {
        path: "/dokumen-pleno",
        name: "Dokumen Pleno",
        component: () => import("../pages/dokumen/DokumenPleno.vue"),
    },
    {
        path: "/dokumen-senat",
        name: "Dokumen Senat",
        component: () => import("../pages/dokumen/DokumenSenat.vue"),
    },
    // {
    //     path: "/struktur-organisasi",
    //     name: "Struktur Organisasi",
    //     component: () => import("../pages/"),
    // },
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
        path: "/profil",
        name: "Sambutan Ketua Senat",
        component: () => import("../pages/profil/SambutanKetua.vue"),
    },
    {
        path: "/galeri",
        name: "Galeri",
        component: () => import("../pages/gallery/Gallery.vue"),
    },
    // {
    //     path: "/user",
    //     name: "User",
    //     component: () => import("../pages/"),
    // },

    {
        //not-found paeg
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: () => import("../pages/NotFound.vue"),
    },
];

export default routes;