<template>
  <section class="content">
    <div class="div container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <router-link to="/tambah-sambutan" class="btn btn-primary">
                  <i class="fas fa-plus mr-1"></i> Tambah Sambutan</router-link
                >
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table text-nowrap">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Sambutan Ketua Senat</td>
                    <td>Selamat Pagi bagi semua penonton</td>
                    <td><i class="fas fa-pen"></i></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
