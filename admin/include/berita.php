<?php
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_news = $_GET['data'];
		//hapus kategori buku
		$sql_tg = "DELETE FROM `news` WHERE `id_news` = '$id_news'";
		mysqli_query($koneksi,$sql_tg);
    //get foto
    $sql_f = "SELECT `image_news` FROM `news` WHERE `id_news`='$id_news'";
    $query_f = mysqli_query($koneksi,$sql_f);
    $jumlah_f = mysqli_num_rows($query_f);
    if($jumlah_f>0){
      while($data_f = mysqli_fetch_row($query_f)){
        $cover = $data_f[0];
        //menghapus cover
        unlink("image_news/$cover");
      }
    }
	}
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-file-alt"></i> Berita</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Berita</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Berita</h3>
                <div class="card-tools">
                <a href="index.php?include=tambah-berita" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah Berita</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=berita">
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
                <?php if($_GET['notif']=="tambahberitaberhasil"){?>
                    <div class="alert alert-success" role="alert">
                    Data Berhasil Ditambahkan</div>
                <?php } else if($_GET['notif']=="editberitaberhasil"){?>
                  <div class="alert alert-success" role="alert">
                  Data Berhasil Diubah</div>
                  <?php } else if($_GET['notif']=="hapusberitaberhasil"){?>
                  <div class="alert alert-success" role="alert">
                  Data Berhasil Dihapus</div>
                <?php }?>
              <?php }?>

                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%"><center>No.<center></th>
                      <th width="20%">Title</th>
                      <th width="30%">Description</th>
                      <th width="15%">Date</th>
                      <th width="15%"><center>Action</center></th>
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
                    $sql_kon = "SELECT `id_news`,`title`,`description`,`date` FROM `news` ";  
                    if (isset($_POST["katakunci"])){
                      $katakunci_up = $_POST["katakunci"];
                      $sql_kon .= " where `title` LIKE '%$katakunci_up%' OR 
                      `description` LIKE '%$katakunci_up%' OR 
                      `date` LIKE '%$katakunci_up%'";
                      }                      
                      $sql_kon .= " ORDER BY `title` limit $posisi, $batas";
                      $query_kon = mysqli_query($koneksi,$sql_kon); 
                      $posisi += 1; 
                      while($data_kon = mysqli_fetch_row($query_kon)){ 
                        $id_news = $data_kon[0]; 
                        $title = $data_kon[1]; 
                        $description = $data_kon[2];
                        $date = $data_kon[3]; 
                        // $image = $data_kon[4]; 
                    ?>

                    <tr>
                    <td align="center"><?php echo $posisi;?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $description;?></td>
                    <td><?php echo $date;?></td>
                    <td align="center">
                      <a href="index.php?include=edit-berita&data=<?php echo $id_news;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                      <a href="index.php?include=detail-berita&data=<?php echo $id_news;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i> Detail</a>
                      <a href="javascript:if(confirm('Anda yakin ingin menghapus berita <?php echo $title; ?>?'))window.location.href = 'index.php?include=berita&aksi=hapus&data=<?php echo $id_news;?>&notif=hapusberitaberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="delete"></i> Delete</a>                       
                    </td>
                  </tr>

                  <?php $posisi++;
                  } ?> 
                  </tbody>
                </table>
              </div>
              <?php
              //hitung jumlah semua data 
              $sql_jum = "SELECT `id_news`,`title`,`description`,`date` FROM `news` ";
              if (!empty($katakunci_news)) {
                $sql_jum .= " where `title` LIKE '%$katakunci_news%'";
              }
              $sql_jum .= " order by `title`";
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
                      $katakunci_berita = $_POST["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=berita&katakunci=$katakunci_berita&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=berita&katakunci=$katakunci_berita&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=berita&katakunci=$katakunci_berita&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'>
                          <a class='page-link' href='index.php?include=berita&katakunci=$katakunci_berita&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=berita&katakunci=$katakunci_berita&halaman=$jum_halaman'>Last</a></li>";
                      }
                  }else{
                    if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=berita&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=berita&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=berita&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=berita&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=berita&halaman=$jum_halaman'>Last</a></li>";
                        }
                      }
                    }?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>

