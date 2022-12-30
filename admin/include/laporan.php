<?php
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_laporan = $_GET['data'];
		//hapus kategori buku
		$sql_tg = "DELETE FROM `laporan` WHERE `id_laporan` = '$id_laporan'";
		mysqli_query($koneksi,$sql_tg);
	}
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-file-alt"></i> Laporan</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Laporan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Laporan</h3>
                <div class="card-tools">
                <a href="index.php?include=tambah-laporan" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah Laporan</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=laporan">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>

              <div class="col-sm-12">
              <?php if(!empty($_GET['notif'])){?>
                <?php if($_GET['notif']=="tambahlaporanberhasil"){?>
                    <div class="alert alert-success" role="alert">
                    Data Berhasil Ditambahkan</div>
                <?php } else if($_GET['notif']=="editlaporanberhasil"){?>
                  <div class="alert alert-success" role="alert">
                  Data Berhasil Diubah</div>
                  <?php } else if($_GET['notif']=="hapuslaporanberhasil"){?>
                  <div class="alert alert-success" role="alert">
                  Data Berhasil Dihapus</div>
                <?php }?>
              <?php }?>

                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%"><center>No.<center></th>
                      <th width="20%">Dana Tersampaikan</th>
                      <th width="20%">Galang Dana</th> 
                      <th width="15%">Donatur</th>
                               
                      <th width="40%"><center>Action</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  
                    $batas = 3; 
                    if(!isset($_GET['halaman'])){ 
                        $posisi = 0; 
                        $halaman = 1; 
                    }else{ 
                        $halaman = $_GET['halaman']; 
                         $posisi = ($halaman-1) * $batas; 
                    }
                    //query sql
                      $sql_kon = "select * from  (select SUM(amount) from campaign where status= 'archived') as dana_tersampaikan,
                      (select SUM(amount) from campaign where status= 'public') as dana_terkumpul,
                      (select SUM(id_user) from user) as donatur;";
                      $query_kon = mysqli_query($koneksi,$sql_kon); 
                      $posisi += 1; 
                      while($data_kon = mysqli_fetch_row($query_kon)){ 
                        $dana_tersampaikan = $data_kon[0]; 
                        $donatur = $data_kon[1];
                        $dana_terkumpul = $data_kon[2];
                    ?>

                    <tr>
                    <td align="center"><?php echo $posisi;?></td>
                    <td><?php echo $dana_tersampaikan;?></td>
                    <td><?php echo $donatur;?></td>
                    <td><?php echo $dana_terkumpul;?></td>
      
                   
                  
                    <td align="center">
                      <!-- <a href="index.php?include=edit-laporan&data=<?php echo $id_laporan;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a> -->
                      <a href="index.php?include=detail-laporan&data=<?php echo $id_laporan;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i> Detail</a>
                      <a href="javascript:if(confirm('Anda yakin ingin menghapus laporan <?php echo $galang_dana; ?>?'))window.location.href = 'index.php?include=laporan&aksi=hapus&data=<?php echo $id_laporan;?>&notif=hapuslaporanberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="delete"></i> Delete</a>                       
                    </td>
                  </tr>

                  <?php $posisi++; ?>
                  <?php } ?> 
                  </tbody>
                </table>
              </div>
              <?php
              //hitung jumlah semua data 
              $sql_jum = "SELECT `id_laporan`, `dana_tersampaikan`, `donatur`, `galang_dana`, `relawan` FROM `laporan` ";
              if (!empty($katakunci_laporan)) {
                $sql_jum .= " where `galang_dana` LIKE '%$katakunci_laporan%'";
              }
              $sql_jum .= " order by `galang_dana`";
              $query_jum = mysqli_query($koneksi, $sql_jum);
              $jum_data = mysqli_num_rows($query_jum);
              $jum_halaman = ceil($jum_data / $batas);
              ?>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <?php 
              if($jum_halaman==0){
                //tidak ada halaman
              }else if($jum_halaman==1){
                  echo "<li class='page-item'><a class='page-link'>1</a></li>";
              }else{
                  $sebelum = $halaman-1;
                  $setelah = $halaman+1;
                  if (isset($_POST["katakunci"])){
                      $katakunci_laporan = $_POST["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan&katakunci=$katakunci_laporan&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan&katakunci=$katakunci_laporan&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan&katakunci=$katakunci_laporan&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'>
                          <a class='page-link' href='index.php?include=laporan&katakunci=$katakunci_laporan&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan&katakunci=$katakunci_laporan&halaman=$jum_halaman'>Last</a></li>";
                      }
                  }else{
                    if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan&halaman=$jum_halaman'>Last</a></li>";
                        }
                      }
                    }?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>

