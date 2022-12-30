<?php 
if(isset($_GET['data'])){
	$id_donations = $_GET['data'];
}
	//gat data donations
  $sql_kon =  "SELECT `b`.`id_donations`,`b`.`nama`, `b`.`telp`, `b`.`nominal`,`b`.`image_payment`,
  `b`.`metode_pembayaran`, `b`.`status`, `b`.`support` FROM `donations` `b` WHERE `id_donations` = '$id_donations'";
  $query_kon = mysqli_query($koneksi,$sql_kon);
  while($data_d = mysqli_fetch_row($query_kon)){
      $id_donations = $data_d[0];
      $nama = $data_d[1];
      $telp = $data_d[2];
      $nominal = $data_d[3];
      $image_payment =  $data_d[4];
      $metode_pembayaran = $data_d[5]; 
      $support = $data_d[6];
      $status = $data_d[7];
  }

?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Donasi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=donations">Data donations</a></li>
              <li class="breadcrumb-item active">Detail Data Donasi</li>
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
                  <a href="index.php?include=donations" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
                <tbody>   
                    <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama;?></td>
                    </tr> 

                    <tr>
                        <td width="20%"><strong>No. Telp<strong></td>
                        <td width="80%"><?php echo $telp;?></td>
                    </tr>  

                    <tr>
                        <td width="20%"><strong>Nominal<strong></td>
                        <td width="80%"><?php echo $nominal;?></td>
                    </tr>  

                    <tr>
                        <td><strong>Image<strong></td>
                        <td><img src="image_payment/<?php echo $image_payment;?>" 
                        class="img-fluid" width="200px;"></td>
                    </tr>  

                    <tr>
                        <td width="20%"><strong>Metode Pembayaran<strong></td>
                        <td width="80%"><?php echo $metode_pembayaran;?></td>
                    </tr>  


                    <tr>
                        <td width="20%"><strong>Support<strong></td>
                        <td width="80%"><?php echo $support;?></td>
                    </tr>  

                    <tr>
                        <td width="20%"><strong>Status<strong></td>
                        <td width="80%"><?php echo $status;?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->