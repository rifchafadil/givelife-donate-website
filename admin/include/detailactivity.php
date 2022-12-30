<?php 
if(isset($_GET['data'])){
	$id_activity = $_GET['data'];
	//gat data activity
  $sql = "SELECT `b`.`id_activity`, `b`.`image_activity`, `k`.`title`, `b`.`amount`, `b`.`description` 
            FROM `activity` `b`
            INNER JOIN `campaign` `k` ON 
            `b`.`id_campaign`=`k`.`id_campaign`
            WHERE `b`.`id_activity`='$id_activity'";
    $query = mysqli_query($koneksi,$sql);
    while($data = mysqli_fetch_row($query)){
    $id_activity = $data[0];
    $image_activity = $data[1];
    $id_campaign = $data[2];
    $amount = $data[3];
    $description = $data[4];
  }
}
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Activity</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=activity">Data Activity</a></li>
              <li class="breadcrumb-item active">Detail Data Activity</li>
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
                  <a href="index.php?include=activity" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
                <tbody>                      
                    <tr>
                        <td><strong>Image<strong></td>
                        <td><img src="image_activity /<?php echo $image_activity;?>" 
                        class="img-fluid" width="200px;"></td>
                    </tr>               
                    <tr>
                        <td width="20%"><strong>Campaign<strong></td>
                        <td width="80%"><?php echo $id_campaign;?></td>
                    </tr>                 
                    <tr>
                        <td width="20%"><strong>Amount<strong></td>
                        <td width="80%"><?php echo $amount;?></td>
                    </tr>                 
                    <tr>
                        <td width="20%"><strong>Description<strong></td>
                        <td width="80%"><?php echo $description;?></td>
                    </tr>
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