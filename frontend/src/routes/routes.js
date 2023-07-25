const constantRoutes = [{
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
        path: "/lupa-sandi",
        name: "Lupa Kata Sandi",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/auth/LupaSandi.vue"),
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
        path: "/detail-dokumen/:id",
        name: "Detail Dokumen",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Dokumen Pleno',
                path: '/dokumen-pleno',
            }]
        },
        component: () => import("../pages/dokumen/DokumenPleno.vue"),
    },
    {
        path: "/dokumen-tambah/:type",
        name: "TambahDokumen",
        meta: {
            layout: 'Authenticated',
            breadcrumb: [{
                label: 'Dokumen Pleno',
                path: '/dokumen-pleno',
            }]
        },
        component: () => import('../pages/dokumen/FormAddDokumen.vue'),
    },
]

const adminRoutes = [{
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
        path: "/tambah-user",
        name: "Tambah User",
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
        path: "/detail-1",
        name: "Dokumen",
        component: () => import("../pages/dokumen/DetailDokumen.vue")
    },
    {
        path: "/tambah-fungsi",
        name: "Tambah FungsiKerja",
        meta: {
            layout: 'Authenticated',
        },
        component: () => import("../pages/struktur-organisasi/FormAddFungsi.vue"),
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
        path: "/tambah-sambutan",
        name: "Tambah Sambutan Ketua Senat",
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