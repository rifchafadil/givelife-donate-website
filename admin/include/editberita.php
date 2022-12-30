<?php
if(isset($_GET['data'])){
	$id_news = $_GET['data'];
	$_SESSION['id_news']=$id_news;  

	$sql_d = "SELECT `title`, `description`, `date` FROM `news` WHERE `id_news` = '$id_news'";
    $query_d = mysqli_query($koneksi,$sql_d);
    while($data_d = mysqli_fetch_row($query_d)){
      $title = $data_d[0];
      $description = $data_d[1];
      $date = $data_d[2];
    }
}
?>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="fas fa-edit"></i> Edit Data Berita</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php?include=berita">Data Berita</a></li>
                <li class="breadcrumb-item active">Edit Data Berita</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Berita</h3>
            <div class="card-tools">
              <a href="index.php?include=berita" class="btn btn-sm btn-warning float-right">
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

          <form class="form-horizontal" method="POST" action="index.php?include=konfirmasi-edit-berita" method="post" enctype="multipart/form-data">
            <div class="card-body">
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
                <label for="title" class="col-sm-3 col-form-label"> Title </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" id="title" value="<?php echo $title ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="date" class="col-sm-3 col-form-label"> Date </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="date" id="date" value="<?php echo $date ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="description" id="description" rows="6"><?php echo $description ?></textarea>
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
