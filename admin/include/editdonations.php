<?php

if(isset($_GET['data'])){
	$id_donations = $_GET['data'];
	$_SESSION['id_donations']=$id_donations;
  
	$sql_d = "SELECT `b`.`id_donations`,`b`.`nama`, `b`.`telp`, `b`.`nominal`,`b`.`image_payment`,
  `b`.`metode_pembayaran`, `b`.`status`, `b`.`support` FROM `donations` `b` WHERE `id_donations` = '$id_donations'";
    $query_d = mysqli_query($koneksi,$sql_d);
    while($data_d = mysqli_fetch_row($query_d)){
        $id_donations = $data_d[0];
        $nama = $data_d[1];
        $telp = $data_d[2];
        $nominal = $data_d[3];
        $image_payment =  $data_d[4];
        $metode_pembayaran = $data_d[5]; 
        $support = $data_d[6];
        $status = $data_d[7];
    }
}
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Donasi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=donations">Data Donasi</a></li>
              <li class="breadcrumb-item active">Edit Data Donasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Donasi</h3>
        <div class="card-tools">
          <a href="index.php?include=donations" class="btn btn-sm btn-warning float-right">
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
            <?php echo $_GET['jenis'];?> wajib diisi</div>
          <?php }?>
        <?php }?>
      </div>
      
      <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-edit-donations"  enctype="multipart/form-data">
        <div class="card-body">

        <div class="form-group row">
              <label for="nama" class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" name="nama" id="nama" 
              value="<?php echo $nama;?>">
              </div>
          </div>

          <div class="form-group row">
              <label for="telp" class="col-sm-3 col-form-label">Telp</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" name="telp" id="telp" 
              value="<?php echo $telp;?>">
              </div>
          </div>

          <!-- <div class="form-group row">
              <label for="number_transaction" class="col-sm-3 col-form-label">No. Transaction</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" name="number_transaction" id="number_transaction" 
              value="<?php echo $number_transaction;?>">
              </div>
          </div> -->

          <div class="form-group row">
              <label for="nominal" class="col-sm-3 col-form-label">Nominal</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" name="nominal" id="nominal" 
              value="<?php echo $nominal;?>">
              </div>
          </div>

          <div class="form-group row">
              <label for="metode_pembayaran" class="col-sm-3 col-form-label">Metode Pembayaran</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" name="metode_pembayaran" id="metode_pembayaran" 
              value="<?php echo $metode_pembayaran;?>">
              </div>
          </div>

          <div class="form-group row">
            <label for="image_payment" class="col-sm-3 col-form-label"> Image </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image_payment" id="image_payment">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>

          
          <div class="form-group row">
              <label for="status" class="col-sm-3 col-form-label">Status</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" name="status" id="status" 
              value="<?php echo $status;?>">
              </div>
          </div>

          <div class="form-group row">
              <label for="support" class="col-sm-3 col-form-label">Support</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" name="support" id="support" 
              value="<?php echo $support;?>">
              </div>
          </div>


  
    <!-- /.card-footer -->
  <!-- </div> -->
  <div class="card-footer">
    <!-- <div class="col-sm-12"> -->
    <button type="submit" class="btn btn-info float-right"><i class="fas 
    fa-save"></i> Simpan</button>
    <!-- </div>   -->
    </div>

 </div>
 <!-- /.card-body -->
 
</form>

    </div>
    <!-- /.card -->

    </section>