<?php 
  if(isset($_GET['data'])){
    $id_user = $_GET['data'];
    // $_SESSION['id_user'] = $id_user;
    // get user
    $sql = "SELECT `id_user`, `foto`, `nama`, `email`, `username` FROM `user` WHERE `id_user` = '$id_user'";
    $query = mysqli_query($koneksi, $sql);
    while($data = mysqli_fetch_row($query)){
      // $id_user = $data_kon[0];
    $id_user= $data[0];
    $foto= $data[1];
    $nama = $data[2];
    $email= $data[3];
    $username = $data[4];
    }
  }
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=user">Data User</a></li>
              <li class="breadcrumb-item active">Detail Data user</li>
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
                  <a href="index.php?include=user" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>                
                      <tr>
                      <td><strong>Image<strong></td>
                      <td><img src="foto/<?php echo $foto;?>" 
                      class="img-fluid" width="200px;"></td>
                  </tr>  

                      <tr>
                        <td width="20%"><strong>Name<strong></td>
                        <td width="80%"><?php echo $nama; ?></td>
                      </tr>

                      <tr>
                        <td width="20%"><strong>Email<strong></td>
                        <td width="80%"><?php echo $email; ?></td>
                      </tr>

                      <tr>
                        <td width="20%"><strong>Username<strong></td>
                        <td width="80%"><?php echo $username; ?></td>
                      </tr> 
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
