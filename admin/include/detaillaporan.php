<?php 
  if(isset($_GET['data'])){
    $id_laporan = $_GET['data'];
    // $_SESSION['id_laporan'] = $id_laporan;
    // get laporan
    $sql = "SELECT `id_laporan`, `dana_tersampaikan`, `donatur`, `galang_dana`, `relawan` FROM `laporan` WHERE `id_laporan` = '$id_laporan'";
    $query = mysqli_query($koneksi, $sql);
    while($data = mysqli_fetch_row($query)){
      // $id_laporan = $data_kon[0];
    $id_laporan= $data[0];
    $dana_tersampaikan= $data[1];
    $donatur = $data[2];
    $galang_dana= $data[3];
    $relawan = $data[4];
    }
  }
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Laporan</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=laporan">Data Laporan</a></li>
              <li class="breadcrumb-item active">Detail Data Laporan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="index.php?include=laporan" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>                
                      <tr>
                        <td width="20%"><strong>Dana Tersampaikan<strong></td>
                        <td width="80%"><?php echo $dana_tersampaikan; ?></td>
                      </tr>

                      <tr>
                        <td width="20%"><strong>Donatur<strong></td>
                        <td width="80%"><?php echo $donatur; ?></td>
                      </tr>

                      <tr>
                        <td width="20%"><strong>Galang Dana<strong></td>
                        <td width="80%"><?php echo $galang_dana; ?></td>
                      </tr> 

                      <tr>
                        <td width="20%"><strong>Relawan<strong></td>
                        <td width="80%"><?php echo $relawan; ?></td>
                      </tr> 

                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
