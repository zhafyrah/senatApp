const constantRoutes = [
    {
        path: "/",
        name: "Beranda",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/dashboard.vue"),
    },
    {
        path: "/auth/login",
        name: "Login",
        meta: {
            layout: 'Guest',
        },
        component: () => import("../pages/auth/Login.vue"),
    },
    {
        path: "/dokumen-pleno",
        name: "Dokumen Pleno",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/dokumen/DokumenPleno.vue"),
    },
    {
        path: "/detail-dokumen-pleno/:id",
        name: "DetailDokumenPleno",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Dokumen Pleno',
                path: '/dokumen-pleno',
            }]
        },
        component: () => import("../pages/dokumen/DetailDokumenPleno.vue"),
    },
    {
        path: "/detail-dokumen-komisi/:id",
        name: "DetailDokumenKomisi",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Dokumen Komisi',
                path: '/dokumen-komisi',
            }]
        },
        component: () => import("../pages/dokumen/DetailDokumenKomisi.vue"),
    },
    {
        path: "/detail-dokumen-senat/:id",
        name: "DetailDokumenSenat",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Dokumen Senat',
                path: '/dokumen-senat',
            }]
        },
        component: () => import("../pages/dokumen/DetailDokumenSenat.vue"),
    },
    {
        path: "/dokumen-tambah-pleno/:id?",
        name: "TambahDokumenPleno",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Dokumen Pleno',
                path: '/dokumen-pleno',
            }]
        },
        component: () => import('../pages/dokumen/FormAddDokumenPleno.vue'),
    },
    {
        path: "/dokumen-tambah-komisi/:id?",
        name: "TambahDokumenKomisi",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Dokumen Komisi',
                path: '/dokumen-komisi',
            }]
        },
        component: () => import('../pages/dokumen/FormAddDokumenKomisi.vue'),
    },
    {
        path: "/dokumen-tambah-senat/:id?",
        name: "TambahDokumenSenat",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Dokumen Senat',
                path: '/dokumen-senat',
            }]
        },
        component: () => import('../pages/dokumen/FormAddDokumenSenat.vue'),
    },
]

const adminRoutes = [
    {
        path: "/dokumen-komisi",
        name: "Dokumen Komisi",
        meta: {
            layout: 'Authenticated',
            permission: ['dokumen komisi']
        },
        component: () => import("../pages/dokumen/DokumenKomisi.vue"),
    },
    {
        path: "/user",
        name: "User",
        meta: {
            layout: 'Authenticated',
            permission: ['user']
        },
        component: () => import("../pages/user/User.vue"),
    },
    {
        path: "/tambah-user/:id?",
        name: "TambahUser",
        meta: {
            layout: 'Authenticated',
            permission: ['user'],
            breadcrumb: [{
                label: 'User',
                path: '/user',
            }]
        },
        component: () => import("../pages/user/FormAddEditUser.vue"),
    },
]

const routes = [
    ...constantRoutes,
    ...adminRoutes,
    {
        path: "/dokumen-senat",
        name: "Dokumen Senat",
        meta: {
            layout: 'Authenticated',
            permission: ['dokumen senat']
        },
        component: () => import("../pages/dokumen/DokumenSenat.vue"),
    },
    {
        path: "/tambah-fungsi",
        name: "Tambah FungsiKerja",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/struktur-organisasi/FormAddStruktur.vue"),
    },
    {
        path: "/anggota",
        name: "Keanggotaan",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/struktur-organisasi/Keanggotaan.vue"),
    },
    {
        path: "/tambah-anggota",
        name: "TambahAnggota",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Keanggotaan',
                path: '/anggota',
            }]
        },
        component: () => import("../pages/struktur-organisasi/FormAddKeanggotaan.vue"),
    },
    {
        path: "/fungsi-kerja",
        name: "Fungsi Kerja",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/struktur-organisasi/FungsiKerja.vue"),
    },
    {
        path: "/berita",
        name: "Berita",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/news/News.vue"),
    },
    {
        path: "/tambah-berita",
        name: "TambahBerita",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Berita',
                path: '/berita',
            }]
        },
        component: () => import("../pages/news/FormAddNews.vue"),
    },
    {
        path: "/detail-berita/:id",
        name: "DetailBerita",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Berita',
                path: '/berita',
            }]
        },
        component: () => import("../pages/news/DetailNews.vue"),
    },
    {
        path: "/sambutan",
        name: "Sambutan Ketua Senat",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/profil/SambutanKetua.vue"),
    },
    {
        path: "/tambah-sambutan/:id?",
        name: "TambahSambutan",
        meta: {
            layout: 'Authenticated',
            permission: ['tambah sambutan']
        },
        component: () => import("../pages/profil/FormAddEditSambutan.vue"),
    },
    {
        path: "/sejarah",
        name: "Sejarah Polindra",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/profil/SejarahPolindra.vue"),
    },
    {
        path: "/tambah-sejarah",
        name: "Tambah Sejarah Polindra",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/profil/FormAddEditSejarah.vue"),
    },
    {
        path: "/galeri",
        name: "Galeri",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/gallery/Gallery.vue"),
    },
    {
        path: "/tambah-foto",
        name: "Tambah Foto",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/gallery/FormAddGallery.vue"),
    },
    {
        //not-found paeg
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/NotFound.vue"),
    },
];

export default routes;