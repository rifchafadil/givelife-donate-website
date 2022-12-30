<?php
  if((isset($_GET['aksi']))&&(isset($_GET['data']))){
    if($_GET['aksi']=='hapus'){
      $id_visimisi = $_GET['data'];
      $sql_tg = "DELETE FROM `visimisi` WHERE `id_visimisi` = '$id_visimisi'";
      mysqli_query($koneksi,$sql_tg);
    }
  }
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-file-alt"></i> Visi Misi</h3>
    </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"> Visi Misi</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Visi Misi</h3>
    </div>
<!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form method="post" action="index.php?include=visimisi">
          <div class="row">
            <div class="col-md-4 bottom-10">
              <input type="text" class="form-control" id="kata_kunci" name="katakunci">
            </div>

            <div class="col-md-5 bottom-10">
              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
            </div>
          </div>
        </form>
      </div>
      <br>

      <div class="col-sm-12">
        <?php if(!empty($_GET['notif'])){?>
        <?php if($_GET['notif']=="tambahvisimisiberhasil"){?>
          <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
        <?php } else if($_GET['notif']=="editvisimisiberhasil"){?>
          <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
        <?php } else if($_GET['notif']=="hapusvisimisiberhasil"){?>
          <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
        <?php }?>
        <?php }?>

          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%"><center>No.<center></th>
                      <th width="10%">Title</th>
                      <th width="50%">Description</th>
                      <th width="5%"><center>Action</center></th>
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
                    $sql_kon = "SELECT `id_visimisi`,`title`,`description` FROM `visimisi` ";  
                    if (isset($_POST["katakunci"])){
                      $katakunci_up = $_POST["katakunci"];
                      $sql_kon .= " where `title` LIKE '%$katakunci_up%' OR 
                      `description` LIKE '%$katakunci_up%'";
                      }                      
                      $sql_kon .= " ORDER BY `title` limit $posisi, $batas";
                      $query_kon = mysqli_query($koneksi,$sql_kon); 
                      $posisi += 1; 
                      while($data_kon = mysqli_fetch_row($query_kon)){ 
                        $id_visimisi = $data_kon[0]; 
                        $title = $data_kon[1]; 
                        $description = $data_kon[2];
                    ?>

                    <tr>
                    <td align="center"><?php echo $posisi;?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $description;?></td>
                    <td align="center">
                      <!-- <a href="index.php?include=edit-visimisi&data=<?php echo $id_visimisi;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a> -->
                      <a href="index.php?include=detail-visimisi&data=<?php echo $id_visimisi;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i> Detail</a>
                      <!-- <a href="javascript:if(confirm('Anda yakin ingin menghapus visimisi <?php echo $title; ?>?'))window.location.href = 'index.php?include=visimisi&aksi=hapus&data=<?php echo $id_visimisi;?>&notif=hapusvisimisiberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="delete"></i> Delete</a>                        -->
                    </td>
                  </tr>

                  <?php $posisi++;
                  } ?> 
                  </tbody>
                </table>
              </div>
              <?php
              //hitung jumlah semua data 
              $sql_jum = "SELECT `id_visimisi`,`title`,`description` FROM `visimisi` ";
              if (!empty($katakunci_visimisi)) {
                $sql_jum .= " where `title` LIKE '%$katakunci_visimisi%'";
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
                      $katakunci_visimisi = $_POST["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=visimisi&katakunci=$katakunci_visimisi&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=visimisi&katakunci=$katakunci_visimisi&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=visimisi&katakunci=$katakunci_visimisi&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'>
                          <a class='page-link' href='index.php?include=visimisi&katakunci=$katakunci_visimisi&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=visimisi&katakunci=$katakunci_visimisi&halaman=$jum_halaman'>Last</a></li>";
                      }
                  }else{
                    if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=visimisi&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=visimisi&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=visimisi&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=visimisi&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=visimisi&halaman=$jum_halaman'>Last</a></li>";
                        }
                      }
                    }?>
                </ul>
              </div>
            </div>
</section>