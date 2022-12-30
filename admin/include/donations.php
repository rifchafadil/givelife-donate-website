<?php 
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_donations = $_GET['data'];
		//hapus kategori buku
		$sql_tg = "DELETE FROM `donations` WHERE `id_donations` = '$id_donations'";
		mysqli_query($koneksi,$sql_tg);
    //get image
    $sql_f = "SELECT `image_payment` FROM `donations` WHERE `id_donations`='$id_donations'";
    $query_f = mysqli_query($koneksi,$sql_f);
    $jumlah_f = mysqli_num_rows($query_f);
    if($jumlah_f>0){
      while($data_f = mysqli_fetch_row($query_f)){
        $cover = $data_f[0];
        //menghapus cover
        unlink("image_payment/$cover");
      }
    }
	}
}
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-file-alt"></i> Donasi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Donasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Donasi</h3>
                <div class="card-tools">
                  <!-- <a href="index.php?include=tambah-donations" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah  Donasi</a> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="POST" action="index.php?include=donations">
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
                  <!-- <?php if($_GET['notif']=="tambahdonationsberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Ditambahkan</div> -->
                  <?php } if($_GET['notif']=="editdonationsberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Diubah</div>
                  <?php } else if($_GET['notif']=="hapusdonationsberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Dihapus</div>
                  <?php }?>
                    <?php }?>
        

              <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%"><center>No.<center></th>
                        <!-- <th width="10%">No. Transaction </th> -->
                        <th width="15%">Nominal</th>
                        <th width="5%">Metode Pembayaran</th>
                        <th width="10%">Status</th>
                        <th width="20%"><center>Action</center></th>
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
                    $sql_k = "SELECT `b`.`id_donations`, `b`.`nominal`,
                                `b`.`metode_pembayaran`, `b`.`status`
                                FROM `donations` `b`";
                    if (isset($_POST["katakunci"])){
                        $katakunci_donations = $_POST["katakunci"];
                        $sql_k .= " WHERE `k`.`nominal` LIKE '%$katakunci_donations%' 
                                    OR `b`.`metode_pembayaran` LIKE '%$katakunci_donations%'
                                    OR `b`.`status` LIKE '%$katakunci_donations%'";
                        } 
                        $sql_k .= " ORDER BY `b`.`status` limit $posisi,$batas";
                        $query_k = mysqli_query($koneksi, $sql_k);
                        $posisi += 1;
                        while($data_k = mysqli_fetch_row($query_k)){
                            $id_donations = $data_k[0];
                            // $number_transaction = $data_k[1];
                            $nominal = $data_k[1];
                            $metode_pembayaran = $data_k[2];
                            $status = $data_k[3];
                            
                          ?>
                          
                    <tr>
                      <td align="center"><?php echo $posisi;?></td>

                      <td><?php echo $nominal;?></td>
                      <td><?php echo $metode_pembayaran;?></td>
                      <td><?php echo $status;?></td>
                      <td align="center">
                        <a href="index.php?include=edit-donations&data=<?php echo $id_donations;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="index.php?include=detail-donations&data=<?php echo $id_donations;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i> Detail</a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data donasi <?php echo $title; ?>?'))window.location.href='index.php?include=donations&aksi=hapus&data=<?php echo $id_donations;?>&notif=hapusdonationsberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>

                  <?php $posisi++;}?>
                    </tbody>
                  </table>  
              </div>

              <!-- /.card-body -->
              <?php 
              //hitung jumlah semua data 
              $sql_jum ="SELECT `b`.`id_donations`, `b`.`nominal`,
              `b`.`metode_pembayaran`, `b`.`status`
              FROM `donations` `b`";
              if (!empty($katakunci_donations)) {
                $sql_jum .= " WHERE `k`.`nominal` LIKE '%$katakunci_donations%' 
                OR `b`.`metode_pembayaran` LIKE '%$katakunci_donations%'
                OR `b`.`status` LIKE '%$katakunci_donations%'";
              }
              $sql_jum .= " order by `b`.`status`";
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
                      $katakunci_donations = $_POST["katakunci"];
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=donations&katakunci=$katakunci_donations&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=donations&katakunci=$katakunci_donations&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=donations&katakunci=$katakunci_donations&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'>
                          <a class='page-link' href='index.php?include=donations&katakunci=$katakunci_donations&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=donations&katakunci=$katakunci_donations&halaman=$jum_halaman'>Last</a></li>";
                      }
                  }else{
                    if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=donations&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=donations&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=donations&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                      }

                      if($halaman!=$jum_halaman){
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=donations&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=donations&halaman=$jum_halaman'>Last</a></li>";
                        }
                      }
                    }?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
