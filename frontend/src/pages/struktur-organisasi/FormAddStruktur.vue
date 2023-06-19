<template>
  <div class="card">
    <!-- <div class="card-header">
      <h5 class="card-title">Silahkan Tambahkan User</h5>
    </div> -->

    <form class="form">
      <div class="card-body">
        <div class="form-group">
          <label>Komisi</label>
          <select class="form-control">
            <option selected disabled>Silahkan Pilih Komisi</option>
            <option>Komisi A</option>
            <option>Komisi B</option>
            <option>Komisi C</option>
            <option>Komsisi D</option>
          </select>
        </div>
        <div class="form-group">
          <label for="inputEmail">Anggota 1</label>
          <div class="form">
            <input
              type="text"
              class="form-control"
              placeholder="Nama Anggota 1"
            />
          </div>
        </div>
        <div class="form-group">
          <label for="inputName">Anggota 2</label>
          <input
            type="text"
            class="form-control"
            placeholder="Nama Anggota 2"
          />
        </div>
        <div class="form-group">
          <label for="input">Anggota 3</label>
          <input
            type="text"
            class="form-control"
            placeholder="Nama Anggota 3"
          />
          <div class="form-group">
            <label for="inputContent">Fungsi Kerja</label>
            <textarea
              class="form-control"
              rows="3"
              placeholder="Fungsi Kerja"
            ></textarea>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script></script>
