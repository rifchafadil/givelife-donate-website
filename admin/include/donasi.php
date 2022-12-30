<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_campaign = $_GET['data'];
    //hapus kategori buku
    $sql = "DELETE FROM `campaign` 
		WHERE `id_campaign` = '$id_campaign'";
    mysqli_query($koneksi, $sql);
    $sql = "SELECT `image_campaign` FROM `campaign` WHERE `id_campaign`='$id_campaign'";
    $query = mysqli_query($koneksi,$sql);
    $jumlah = mysqli_num_rows($query);
    if($jumlah>0){
      while($data = mysqli_fetch_row($query)){
        $cover = $data[0];
        //menghapus cover
        unlink("image_campaign/$cover");
      }
    }

  }
}
if (isset($_POST["katakunci"])) {
  $katakunci_campaign = $_POST["katakunci"];
  $_SESSION['katakunci_campaign'] = $katakunci_campaign;
}
if (isset($_SESSION['katakunci_campaign'])) {
  $katakunci_campaign = $_SESSION['katakunci_campaign'];
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-file-alt"></i> Campaign</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Campaign</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Campaign</h3>
                <div class="card-tools">
                <a href="index.php?include=tambah-donasi" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah Campaign</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=donasi">
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
                <?php if($_GET['notif']=="tambahdonasiberhasil"){?>
                    <div class="alert alert-success" role="alert">
                    Data Berhasil Ditambahkan</div>
                <?php } else if($_GET['notif']=="editdonasiberhasil"){?>
                  <div class="alert alert-success" role="alert">
                  Data Berhasil Diubah</div>
                  <?php } else if($_GET['notif']=="hapusdonasiberhasil"){?>
                  <div class="alert alert-success" role="alert">
                  Data Berhasil Dihapus</div>
                <?php }?>
              <?php }?>

                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%"><center>No.<center></th>
                      <th width="10%">Title</th>
                      <th width="15%">Description</th>
                      <th width="5%">Status</th>
                      <th width="10%">Amount</th>
                      <th width="5%">Goal</th>
                      <th width="10%">Date End</th>
                      <th width="15%">Note</th>
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
                    $sql_kon = "SELECT `id_campaign`, `title`, `description`, `status`, `amount`, `goal`, `date_end`, `note` FROM `campaign` ";  
                    if (isset($_POST["katakunci"])){
                      $katakunci_campaign = $_POST["katakunci"];
                      $sql_kon .= " where `title` LIKE '%$katakunci_campaign%' OR 
                                  `description` LIKE '%$katakunci_campaign%' OR 
                                  `status` LIKE '%$katakunci_campaign%' OR
                                  `amount` LIKE '%$katakunci_campaign%' OR
                                  `goal` LIKE '%$katakunci_campaign%' OR
                                  `date_end` LIKE '%$katakunci_campaign%' OR
                                  `note` LIKE '%$katakunci_campaign%'";
                      }                      
                      $sql_kon .= " ORDER BY `title` limit $posisi, $batas";
                      $query_kon = mysqli_query($koneksi,$sql_kon); 
                      $posisi += 1; 
                      while($data_kon = mysqli_fetch_row($query_kon)){ 
                        $id_campaign = $data_kon[0]; 
                        $title = $data_kon[1]; 
                        $description = $data_kon[2];
                        $status = $data_kon[3];
                        $amount = $data_kon[4];
                        $goal = $data_kon[5];
                        $date_end = $data_kon[6];
                        $note = $data_kon[7];                    
                        ?>

                    <tr>
                    <td align="center"><?php echo $posisi;?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $description;?></td>
                    <td><?php echo $status;?></td>
                    <td><?php echo $amount;?></td>
                    <td><?php echo $goal;?></td>
                    <td><?php echo $date_end;?></td>
                    <td><?php echo $note;?></td>

                    <td align="center">
                      <a href="index.php?include=edit-donasi&data=<?php echo $id_campaign;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                      <a href="index.php?include=detail-donasi&data=<?php echo $id_campaign;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i> Detail</a>
                      <a href="javascript:if(confirm('Anda yakin ingin menghapus data campaign <?php echo $title; ?>?'))window.location.href='index.php?include=donasi&aksi=hapus&data=<?php echo $id_campaign;?>&notif=hapusdonasiberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  <?php $posisi++;
                  } ?> 
                  </tbody>
                </table>
              </div>


              <?php
              //hitung jumlah semua data 
              $sql_jum = "SELECT `id_campaign`, `title`, `description`, `status`, `amount`, `goal`, `date_end`, `note` FROM `campaign` ";
              if (!empty($katakunci_campaign)) {
                $sql_jum .= " where `title` LIKE '%$katakunci_campaign%'";
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
                      $katakunci_campaign = $_POST["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=donasi&katakunci=$katakunci_campaign&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=donasi&katakunci=$katakunci_campaign&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=donasi&katakunci=$katakunci_campaign&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'>
                          <a class='page-link' href='index.php?include=donasi&katakunci=$katakunci_campaign&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=donasi&katakunci=$katakunci_campaign&halaman=$jum_halaman'>Last</a></li>";
                      }
                  }else{
                    if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=donasi&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=donasi&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=donasi&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=donasi&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=donasi&halaman=$jum_halaman'>Last</a></li>";
                        }
                      }
                    }?>
              </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>

