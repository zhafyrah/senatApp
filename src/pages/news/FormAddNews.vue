<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Silahkan Tambahkan Berita</h4>
    </div>

    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="inputNews">Judul Berita</label>
          <input
            type="text"
            class="form-control"
            id="news"
            placeholder="Judul Berita"
          />
        </div>
        <div class="form-group">
          <label>Date:</label>
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
        <div class="form-group">
          <label for="inputContent">Isi Berita</label>
          <textarea
            class="form-control"
            rows="3"
            placeholder="Isi berita"
          ></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="exampleInputFile"
              />
              <label class="custom-file-label" for="exampleInputFile"
                >Choose file</label
              >
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Unggah</button>
      </div>
    </form>
  </div>
</template>
<script></script>
