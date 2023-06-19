<template>
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Silahkan Tambahkan User</h5>
    </div>

    <form class="form-user">
      <div class="card-body">
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <div class="form">
            <input
              type="email"
              class="form-control"
              id="inputEmail3"
              placeholder="Silahkan Isi Email"
            />
          </div>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select class="form-control">
            <option selected disabled>Silahkan Pilih Role</option>
            <option>Ketua Senat</option>
            <option>Anggota Senat</option>
            <option>Komisi</option>
          </select>
        </div>
        <div class="form-group">
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="customSwitch1"
            />
            <label class="custom-control-label" for="customSwitch1"></label>
          </div>
        </div>
        <!-- optional -->
        <!-- <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >Password</label
          >
          <div class="col-sm-10">
            <input
              type="password"
              class="form-control"
              id="inputPassword3"
              placeholder="Password"
            />
          </div>
        </div> -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script></script>
