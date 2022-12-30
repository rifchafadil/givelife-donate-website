<?php 
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_activity = $_GET['data'];
		//hapus kategori buku
		$sql_tg = "DELETE FROM `activity` WHERE `id_activity` = '$id_activity'";
		mysqli_query($koneksi,$sql_tg);
    //get image
    $sql_f = "SELECT `image_activity` FROM `activity` WHERE `id_activity`='$id_activity'";
    $query_f = mysqli_query($koneksi,$sql_f);
    $jumlah_f = mysqli_num_rows($query_f);
    if($jumlah_f>0){
      while($data_f = mysqli_fetch_row($query_f)){
        $cover = $data_f[0];
        //menghapus cover
        unlink("image_activity/$cover");
      }
    }
	}
}
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fab fa-activityger"></i> Activity</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Activity</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Activity</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-activity" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah  Activity</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="POST" action="index.php?include=activity">
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
                  <?php if($_GET['notif']=="tambahactivityberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Ditambahkan</div>
                  <?php } else if($_GET['notif']=="editactivityberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Diubah</div>
                  <?php } else if($_GET['notif']=="hapusactivityberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Dihapus</div>
                  <?php }?>
                    <?php }?>
        

              <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%"><center>No.<center></th>
                        <th width="15%">Campaign</th>
                        <th width="15%">Amount</th>
                        <th width="30%">Description</th>
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
                    $sql_k = "SELECT `b`.`id_activity`,`k`.`title`,`b`.`amount`, `b`.`description` 
                                FROM `activity` `b` INNER JOIN `campaign` `k` 
                                ON `b`.`id_campaign` = `k`.`id_campaign`";
                    if (isset($_POST["katakunci"])) {
                        $katakunci_activity = $_POST["katakunci"];
                        $sql_k .= " WHERE `b`.`amount` LIKE '%$katakunci_activity%' 
                                    OR `k`.`title` LIKE '%$katakunci_activity%' 
                                    OR `b`.`description` LIKE '%$katakunci_activity%'";
                        } 
                        $sql_k .= " ORDER BY `b`.`amount` limit $posisi,$batas";
                        $query_k = mysqli_query($koneksi, $sql_k);
                        $posisi += 1;
                        while($data_k = mysqli_fetch_row($query_k)){
                            $id_activity = $data_k[0];
                            $title = $data_k[1];
                            $amount = $data_k[2];
                            $description = $data_k[3];
                          ?>
                          
                    <tr>
                      <td align="center"><?php echo $posisi;?></td>
                      <td><?php echo $title;?></td>
                      <td><?php echo $amount;?></td>
                      <td><?php echo $description;?></td>
                      <td align="center">
                        <a href="index.php?include=edit-activity&data=<?php echo $id_activity;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="index.php?include=detail-activity&data=<?php echo $id_activity;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i> Detail</a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data activity <?php echo $title; ?>?'))window.location.href='index.php?include=activity&aksi=hapus&data=<?php echo $id_activity;?>&notif=hapusactivityberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>

                  <?php $posisi++;}?>
                    </tbody>
                  </table>  
              </div>

              <!-- /.card-body -->
              <?php 
              //hitung jumlah semua data 
              $sql_jum = "SELECT `b`.`id_activity`, `k`.`title`, `b`.`amount`, 
                          `b`.`description` FROM `activity` `b` INNER JOIN `campaign` `k` 
                          ON `b`.`id_campaign` = `k`.`id_campaign`";
              if (!empty($katakunci_activity)) {
                $sql_jum .= " WHERE `b`.`amount` LIKE '%$katakunci_activity%'";
              }
              $sql_jum .= " order by `b`.`amount`";
              $query_jum = mysqli_query($koneksi,$sql_jum);
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
                      $katakunci_activity = $_POST["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=activity&katakunci=$katakunci_activity&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=activity&katakunci=$katakunci_activity&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=activity&katakunci=$katakunci_activity&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'>
                          <a class='page-link' href='index.php?include=activity&katakunci=$katakunci_activity&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=activity&katakunci=$katakunci_activity&halaman=$jum_halaman'>Last</a></li>";
                      }
                  }else{
                    if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=activity&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=activity&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=activity&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=activity&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=activity&halaman=$jum_halaman'>Last</a></li>";
                        }
                      }
                    }?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
