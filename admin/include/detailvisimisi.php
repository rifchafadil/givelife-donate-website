<?php 
    if(isset($_GET['data'])){
        $id_visimisi = $_GET['data'];
        $sql = "SELECT `id_visimisi`, `title`, `description` FROM `visimisi` WHERE `id_visimisi` = '$id_visimisi'";
        $query = mysqli_query($koneksi, $sql);
        while($data = mysqli_fetch_row($query)){
        $id_visimisi= $data[0];
        $title= $data[1];
        $description = $data[2];
        }
    }
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Visi Misi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=visimisi">Data Visi Misi</a></li>
              <li class="breadcrumb-item active">Detail Data Visi Misi</li>
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
                  <a href="index.php?include=visimisi" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>                
                      <!-- <tr>
                      <td><strong>Image<strong></td>
                      <td><img src="image_news/<?php echo $image_news;?>" 
                      class="img-fluid" width="200px;"></td>
                  </tr>  
 -->
                      <tr>
                        <td width="20%"><strong>Title<strong></td>
                        <td width="80%"><?php echo $title; ?></td>
                      </tr>

                      <!-- <tr>
                        <td width="20%"><strong>Date<strong></td>
                        <td width="80%"><?php echo $date; ?></td>
                      </tr> -->

                      <tr>
                        <td width="20%"><strong>Description<strong></td>
                        <td width="80%"><?php echo $description; ?></td>
                      </tr> 
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
