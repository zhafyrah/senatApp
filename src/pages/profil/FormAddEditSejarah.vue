<template>
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-12">
        <label for="input">Judul</label>
        <input
          type="text"
          id="title"
          class="form-control"
          placeholder="Isi Judul Disini"
        />
      </div>
      <div class="form-group col-md-12">
        <label>Isi Sejarah Polindra</label>
        <textarea
          class="form-control"
          rows="4"
          placeholder="Isi Sambutan Ketua Senat"
        ></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Unggah Foto</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="exampleInputFile" />
          <label class="custom-file-label" for="exampleInputFile"
            >Temukan Foto dari Komputer Anda</label
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
