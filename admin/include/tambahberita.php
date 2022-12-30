
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Berita</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=berita">Data Berita</a></li>
              <li class="breadcrumb-item active">Tambah Berita</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Berita</h3>
        <div class="card-tools">
          <a href="index.php?include=berita" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <!-- <div class="col-sm-10">
      </div> -->

      <?php if(!empty($_GET['notif'])){?>
      <?php if($_GET['notif']=="tambahtitlekosong"){?>
      <div class="alert alert-danger" role="alert">
      Maaf data title wajib di isi</div>
      <?php }?>
      <?php if($_GET['notif']=="tambahedescriptionkosong"){?>
      <div class="alert alert-danger" role="alert">
      Maaf data description wajib di isi</div>
      <?php }?>
      <?php if($_GET['notif']=="tambahdatekosong"){?>
      <div class="alert alert-danger" role="alert">
      Maaf data date wajib di isi</div>
      <?php }?>
      <?php }?>


      <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-berita" enctype="multipart/form-data">
        <div class="card-body">
          <!-- <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori berita</label>
            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="kategori_berita">
              </select>
            </div>
          </div> -->

          <div class="form-group row">
            <label for="image_news" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image_news" id="image_news">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>

          <div class="form-group row">
            <label for="title" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="title" id="title" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="date" class="col-sm-3 col-form-label">Date</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="date" id="date" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="description" id="description" rows="6"></textarea>
            </div>
          </div>

          </div>
          <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
          </div>  
        </div>
        </div>

      </div>

        <!-- /.card-body -->
        
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>