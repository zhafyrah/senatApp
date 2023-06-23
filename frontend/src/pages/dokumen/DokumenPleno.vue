<script setup>
import { useDokPlenoStore } from "../../store/dokumen-pleno-store"
import { useSnackbar } from "vue3-snackbar";
import { onMounted, watch, computed } from 'vue';
import Pagination from "../../components/Pagination.vue";
import { showConfirm } from "../../utils/notif-utils"

const dokStore = useDokPlenoStore()
const snackbar = useSnackbar()

const data = computed(() => dokStore.dokData)
const page = computed(() => dokStore.page)
const totalPage = computed(() => dokStore.totalPage)
const lastNumberPage = computed(() => dokStore.lastNoPage)

</script>
<template>
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <router-link to="dokumen/tambah" class="btn btn-primary">
          <i class="fas fa-plus mr-1"></i>
          Unggah Dokumen
        </router-link>
        <div class="card-tools mt-2">
          <div class="input-group input-group-sm" style="width: 200px">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" />
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
              <th>No surat</th>
              <th>Dokumen</th>
              <th>Tanggal Unggah</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>183</td>
              <td>John Doe.pdf</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet.</td>
              <td><span class="badge bg-danger">Belum Disahkan</span></td>
              <td><i class="fas fa-trash"></i></td>
            </tr>
            <tr>
              <td>219</td>
              <td>Alexander Pierce</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet .</td>
              <td><span class="badge bg-primary">Dipertimbangkan</span></td>
              <td><i class="fas fa-trash"></i></td>
            </tr>
            <tr>
              <td>657</td>
              <td>Bob Doe</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet .</td>
              <td><span class="badge bg-success">Disahkan</span></td>
              <td><i class="fas fa-trash"></i></td>
            </tr>
            <tr>
              <td>175</td>
              <td>Mike Doe</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet .</td>
              <td><span class="badge bg-primary">Dipertimbangkan</span></td>
              <td><i class="fas fa-trash"></i></td>
            </tr>
            <tr>
              <td>134</td>
              <td>Jim Doe</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet .</td>
              <td><span class="badge bg-success">Disahkan</span></td>
              <td><i class="fas fa-trash"></i></td>
            </tr>
            <tr>
              <td>494</td>
              <td>Victoria Doe</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet .</td>
              <td><span class="badge bg-danger">Belum Disahkan</span></td>
              <td><i class="fas fa-trash"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
      <br />
      <div class="row">
        <div class="col-sm-12 col-md-7 ml-3">
          <div class="dataTables_paginate_numbers">
            <ul class="pagination">
              <li class="paginate_button page-item previous disabled" id="example2_previous">
                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
              </li>
              <li class="paginate_button page-item active">
                <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
              </li>
              <li class="paginate_button page-item">
                <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
              </li>
              <li class="paginate_button page-item next" id="example2_next">
                <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
