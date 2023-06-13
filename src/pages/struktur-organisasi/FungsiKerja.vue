<template>
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="/tambah">
          <button class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i>Tambah Fungsi
          </button></a
        >
        <div class="card-tools mt-2">
          <div class="input-group input-group-sm" style="width: 200px">
            <input
              type="text"
              name="table_search"
              class="form-control float-right"
              placeholder="Search"
            />
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="card-body table-responsive p-0" style="height: 300px">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Komisi</th>
              <th>Fungsi Kerja Anggota</th>
              <th>Anggota</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Komisi A</td>
              <td>isinya Fungsi</td>
              <td>
                1. Robert <br />
                2. Rian
              </td>
              <td>
                <i class="fas fa-trash"></i>
                <i class="fas fa-pen ml-2"></i>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Komisi B</td>
              <td>isinya Fungsi</td>
              <td>
                1. Robert <br />
                2. Rian
              </td>
              <td>
                <i class="fas fa-trash"></i>
                <i class="fas fa-pen ml-2"></i>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Komisi C</td>
              <td>isinya Fungsi</td>
              <td>
                1. Robert <br />
                2. Rian
              </td>
              <td>
                <i class="fas fa-trash"></i>
                <i class="fas fa-pen ml-2"></i>
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>Komisi D</td>
              <td>isinya Fungsi</td>
              <td>
                1. Robert <br />
                2. Rian
              </td>
              <td>
                <i class="fas fa-trash"></i>
                <i class="fas fa-pen ml-2"></i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <br />
      <div class="row">
        <div class="col-sm-12 col-md-7 ml-3">
          <div class="dataTables_paginate_numbers">
            <ul class="pagination">
              <li
                class="paginate_button page-item previous disabled"
                id="example_previous"
              >
                <a
                  href="#"
                  aria-controls="example2"
                  data-dt-idx="0"
                  tabindex="0"
                  class="page-link"
                  >Previous</a
                >
              </li>
              <li class="paginate_button page-item active">
                <a
                  href="#"
                  aria-controls="example"
                  tabindex="0"
                  class="page-link"
                  >1</a
                >
              </li>
              <li class="paginate_button page-item">
                <a
                  href="#"
                  aria-controls="example"
                  tabindex="0"
                  class="page-link"
                  >2</a
                >
              </li>
              <li class="paginate_button page-item next" id="example2_next">
                <a
                  href="#"
                  aria-controls="example"
                  tabindex="0"
                  class="page-link"
                  >Next</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
