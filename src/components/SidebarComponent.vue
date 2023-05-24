<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img
        src="../assets/img/logopolindra.png"
        alt="Polindra"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light">Senat Polindra</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img
            src="../assets/img/user2-160x160.jpg"
            class="img-circle elevation-2"
            alt="User Image"
          />
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input
            class="form-control form-control-sidebar"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <nav-item
            icon-class="fas fa-chart-pie"
            text="Beranda"
            :to="{ path: '/dashboard' }"
          >
          </nav-item>
          <nav-item
            icon-class="fas fa-book"
            text="Dokumen"
            :to="{ path: 'pages/dokumen' }"
          >
            <li class="nav-item">
              <router-link to="pages/dokumen/DokumenPleno.vue" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Dokumen Pleno</p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="pages/dokumen/DokumenSenat.vue" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Dokumen Senat</p>
              </router-link>
            </li>
          </nav-item>
          <nav-item
            icon-class="fas fa-sitemap"
            text="Struktur Organisasi"
            :to="{ path: 'pages/organisasi' }"
          >
            <li class="nav-item">
              <router-link to="pages/anggota.html" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Keanggotaan</p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="pages/kerja.html" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Fungsi Kerja</p>
              </router-link>
            </li>
          </nav-item>
          <nav-item
            icon-class="fas fa-newspaper"
            text="Berita"
            :to="{ path: '/berita' }"
          >
          </nav-item>
          <nav-item
            icon-class="fas fa-address-card"
            text="Profil"
            :to="{ path: '/profil' }"
          >
            <li class="nav-item">
              <router-link to="pages/senat.html" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Sambutan Ketua Senat</p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="pages/polindra.html" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Sejarah Polindra</p>
              </router-link>
            </li>
          </nav-item>
          <nav-item
            icon-class="fas fa-images"
            text="Galeri"
            :to="{ path: '/galeri' }"
          >
          </nav-item>
          <nav-item
            icon-class="fas fa-user"
            text="User"
            :to="{ path: '/user' }"
          >
          </nav-item>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>
<script>
import NavbarItem from "./sidebar/nav-item.vue";
export default {
  name: "SidebarComponent",
  components: {
    NavItem: NavbarItem,
  },
  methods: {
    handleItemClick() {
      this.$emit("item-click");
    },
  },
};
</script>
<style></style>
