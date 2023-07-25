<template>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
          <div class="row"></div>
          <div class="row">
            <div class="col-12">
              <h4>Surat nomor: 123</h4>
              <div class="row">
                <p>
                  <a href="#" class="link-black text-sm"
                    ><i class="fas fa-link mr-1"></i> Tampilan File PDF</a>
                </p>
              </div>
              <div class="post mt-5">
                <h4>Komentar</h4>
                <div class="user">
                  <span class="username">
                    <a href="#">Jonathan Burke Jr.</a>
                  </span>
                </div>
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore.
                </p>

                <p>
                  <a href="#" class="link-black text-sm">
                    <i class="fas fa-link mr-1"></i> tampilan foto</a>
                </p>
              </div>

              <div class="post clearfix">
                <div class="user">
                  <span class="username">
                    <a href="#">Sarah Ross</a>
                  </span>
                </div>
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore.
                </p>
                <p>
                  <a href="#" class="link-black text-sm">
                    <i class="fas fa-link mr-1"></i> tampilan foto</a>
                </p>
              </div>

              <div class="post">
                <div class="user">
                  <span class="username">
                    <a href="#">Jonathan Burke Jr.</a>
                  </span>
                </div>
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore.
                </p>

                <p>
                  <a href="#" class="link-black text-sm">
                    <i class="fas fa-link mr-1"></i> tampilan foto</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
          <h4 class="text-block">Keterangan</h4>
          <p class="text-muted">
            Raw denim you probably haven't heard of them jean shorts Austin.
            Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher
            synth. Cosby sweater eu banh mi, qui irure terr.
          </p>
          <br />
          <div class="text-muted">
            <p class="text-sm">
              Tanggal Unggah
              <b class="d-block">23 Juni 2023</b>
            </p>
            <!-- status bisa diupdate disini -->
            <p class="text-sm">
              Status
              <div class="form-group">
                <select
            class="form-control select"
            style="width: 100%"
            placeholder="Silahkan Pilih Status"
          >
            <option selected disabled>Silahkan Pilih Status</option>
            <option select-id="1">Belum Disahkan</option>
            <option select-id="2">Dipertimbangkan</option>
            <option select-id="3">Disahkan</option>
          </select>
        </div>
            </p>
          </div>
          <router-link to="dokumen" class="btn btn-primary">
        Simpan Update</router-link
        >
        </div>
      </div>
    </div>
  </div>
</template>
