
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Laporan</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=laporan">Data Laporan</a></li>
              <li class="breadcrumb-item active">Tambah Laporan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Laporan</h3>
        <div class="card-tools">
          <a href="index.php?include=laporan" class="btn btn-sm btn-warning float-right">
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


      <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-laporan" enctype="multipart/form-data">
        <div class="card-body">
          <!-- <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori laporan</label>
            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="kategori_laporan">
              </select>
            </div>
          </div> -->

          <div class="form-group row">
            <label for="dana_tersampaikan" class="col-sm-3 col-form-label">Dana Tersampaikan</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="dana_tersampaikan" id="dana_tersampaikan" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="donatur" class="col-sm-3 col-form-label">Donatur</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="donatur" id="donatur" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="galang_dana" class="col-sm-3 col-form-label">Galang Dana</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="galang_dana" id="galang_dana" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="relawan" class="col-sm-3 col-form-label">Relawan</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="relawan" id="relawan" value="">
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