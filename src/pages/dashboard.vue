<template>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-12 mb-5">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Dokumen</span>
          <span class="info-box-number">1,410</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-success"
          ><i class="far fa-user"></i
        ></span>
        <div class="info-box-content">
          <span class="info-box-text">User</span>
          <span class="info-box-number">1,410</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-warning"
          ><i class="far fa-newspaper"></i
        ></span>
        <div class="info-box-content">
          <span class="info-box-text">Berita</span>
          <span class="info-box-number">1,410</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-danger"
          ><i class="far fa-images"></i
        ></span>
        <div class="info-box-content">
          <span class="info-box-text">Galeri</span>
          <span class="info-box-number">1,410</span>
        </div>
      </div>
    </div>
  </div>
  <!-- Main row -->
  <div class="row">
    <!-- left col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-12 connectedSortable">
      <!-- TO DO List -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            To Do List
          </h3>

          <div class="card-tools">
            <ul class="pagination pagination-sm">
              <li class="page-item">
                <a href="#" class="page-link">&laquo;</a>
              </li>
              <li class="page-item">
                <a href="#" class="page-link">1</a>
              </li>
              <li class="page-item">
                <a href="#" class="page-link">2</a>
              </li>
              <li class="page-item">
                <a href="#" class="page-link">3</a>
              </li>
              <li class="page-item">
                <a href="#" class="page-link">&raquo;</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <ul class="todo-list" data-widget="todo-list">
            <li>
              <!-- drag handle -->
              <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
              </span>
              <!-- checkbox -->
              <div class="icheck-primary d-inline ml-2">
                <input type="checkbox" value="" name="todo1" id="todoCheck1" />
                <label for="todoCheck1"></label>
              </div>
              <!-- todo text -->
              <span class="text">Design a nice theme</span>
              <!-- Emphasis label -->
              <small class="badge badge-danger"
                ><i class="far fa-clock"></i> 2 mins</small
              >
              <!-- General tools such as edit or delete-->
              <div class="tools">
                <i class="fas fa-edit"></i>
                <i class="fas fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
              </span>
              <div class="icheck-primary d-inline ml-2">
                <input
                  type="checkbox"
                  value=""
                  name="todo2"
                  id="todoCheck2"
                  checked
                />
                <label for="todoCheck2"></label>
              </div>
              <span class="text">Make the theme responsive</span>
              <small class="badge badge-info"
                ><i class="far fa-clock"></i> 4 hours</small
              >
              <div class="tools">
                <i class="fas fa-edit"></i>
                <i class="fas fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
              </span>
              <div class="icheck-primary d-inline ml-2">
                <input type="checkbox" value="" name="todo3" id="todoCheck3" />
                <label for="todoCheck3"></label>
              </div>
              <span class="text">Let theme shine like a star</span>
              <small class="badge badge-warning"
                ><i class="far fa-clock"></i> 1 day</small
              >
              <div class="tools">
                <i class="fas fa-edit"></i>
                <i class="fas fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
              </span>
              <div class="icheck-primary d-inline ml-2">
                <input type="checkbox" value="" name="todo4" id="todoCheck4" />
                <label for="todoCheck4"></label>
              </div>
              <span class="text">Let theme shine like a star</span>
              <small class="badge badge-success"
                ><i class="far fa-clock"></i> 3 days</small
              >
              <div class="tools">
                <i class="fas fa-edit"></i>
                <i class="fas fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
              </span>
              <div class="icheck-primary d-inline ml-2">
                <input type="checkbox" value="" name="todo5" id="todoCheck5" />
                <label for="todoCheck5"></label>
              </div>
              <span class="text">Check your messages</span>
              <small class="badge badge-primary"
                ><i class="far fa-clock"></i> 1 week</small
              >
              <div class="tools">
                <i class="fas fa-edit"></i>
                <i class="fas fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
              </span>
              <div class="icheck-primary d-inline ml-2">
                <input type="checkbox" value="" name="todo6" id="todoCheck6" />
                <label for="todoCheck6"></label>
              </div>
              <span class="text">Let theme shine like a star</span>
              <small class="badge badge-secondary"
                ><i class="far fa-clock"></i> 1 month</small
              >
              <div class="tools">
                <i class="fas fa-edit"></i>
                <i class="fas fa-trash-o"></i>
              </div>
            </li>
          </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <button type="button" class="btn btn-primary float-right">
            <i class="fas fa-plus"></i> Add item
          </button>
        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- left col -->
  </div>
</template>
<script>
export default {};
</script>
<style></style>
