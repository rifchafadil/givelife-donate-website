<?php
if(isset($_GET['data'])){
	$id_laporan = $_GET['data'];
	$_SESSION['id_laporan']=$id_laporan;  

	$sql_d = "SELECT `dana_tersampaikan`, `donatur`, `galang_dana`, `relawan` FROM `laporan` WHERE `id_laporan` = '$id_laporan'";
    $query_d = mysqli_query($koneksi,$sql_d);
    while($data_d = mysqli_fetch_row($query_d)){
      $dana_tersampaikan = $data_d[0];
      $donatur = $data_d[1];
      $galang_dana = $data_d[2];
      $relawan = $data_d[3];
    }
}
?>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="fas fa-edit"></i> Edit Data Laporan</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php?include=laporan">Data Laporan</a></li>
                <li class="breadcrumb-item active">Edit Data Laporan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Laporan</h3>
            <div class="card-tools">
              <a href="index.php?include=laporan" class="btn btn-sm btn-warning float-right">
                <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
          </br></br>
          <div class="col-sm-10">
          <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
          <?php if($_GET['notif']=="editkosong"){?>
            <div class="alert alert-danger" role="alert">Maaf data 
            <?php echo $_GET['jenis'];?> wajib di isi</div>
          <?php }?>
        <?php }?>
          </div>

          <form class="form-horizontal" method="POST" action="index.php?include=konfirmasi-edit-laporan" method="post" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group row">
                <label for="dana" class="col-sm-3 col-form-label"> Dana Tersampaikan </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="dana" id="dana" value="<?php echo $dana_tersampaikan ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="donatur" class="col-sm-3 col-form-label"> Donatur </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="donatur" id="donatur" value="<?php echo $donatur ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="galang" class="col-sm-3 col-form-label"> Galang Dana </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="galang" id="galang" value="<?php echo $galang_dana ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="relawan" class="col-sm-3 col-form-label"> Relawan </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="relawan" id="relawan" value="<?php echo $relawan ?>">
                </div>
              </div>
            </div>  
          <!-- /.card-body -->

          <div class="card-footer">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
