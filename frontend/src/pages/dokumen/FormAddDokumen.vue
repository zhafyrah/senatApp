<template>
  <div class="card-body">
    <h5>Dokumen</h5>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="inputName">No Surat</label>
          <input type="text" id="nosurat" class="form-control" />
        </div>
        <div class="form-group">
          <label>Tanggal Unggah</label>
          <div
            class="input-group date"
            id="reservationdate"
            data-target-input="nearest"
          >
            <input
              type="text"
              class="form-control datetimepicker-input"
              data-target="#reservationdate"
            />
            <div
              class="input-group-append"
              data-target="#reservationdate"
              data-toggle="datetimepicker"
            >
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="inputEmail">Keterangan</label>
          <input type="text" id="keterangan" class="form-control" />
        </div>
        <div class="form-group">
          <label>Status</label>
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
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Unggah Dokumen</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="exampleInputFile" />
          <label class="custom-file-label" for="exampleInputFile"
            >Temukan Dokumen dari Komputer Anda</label
          >
        </div>
        <div class="input-group-append">
          <span class="input-group-text">Upload</span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Send message" />
    </div>
  </div>
</template>
