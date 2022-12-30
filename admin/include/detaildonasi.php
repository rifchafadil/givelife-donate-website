<?php 
  if(isset($_GET['data'])){
    $id_campaign = $_GET['data'];
    $_SESSION['id_campaign'] = $id_campaign;
  }
  $sql_kon = "SELECT `id_campaign`, `image_campaign`, `title`, `description`, `status`, `amount`, `goal`, `date_end`, `note` FROM `campaign` WHERE `id_campaign` = '$id_campaign'";
  $query_kon = mysqli_query($koneksi, $sql_kon);
  while($data_kon = mysqli_fetch_array($query_kon)){
    $id_campaign = $data_kon[0];
    $image_campaign = $data_kon[1];
    $title = $data_kon[2];
    $description = $data_kon[3];
    $status = $data_kon[4];
    $amount = $data_kon[5];
    $goal = $data_kon[6];  
    $date_end = $data_kon[7];
    $note = $data_kon[8];
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Campaign</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=campaign">Data Campaign</a></li>
              <li class="breadcrumb-item active">Detail Data Campaign</li>
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
                  <a href="index.php?include=donasi" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody> 
                      <tr>
                          <td><strong>Image<strong></td>
                          <td><img src="image_campaign/<?php echo $image_campaign;?>" 
                          class="img-fluid" width="200px;"></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Title<strong></td>
                        <td width="80%"><?php echo $title; ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Description<strong></td>
                        <td width="80%"><?php echo $description; ?></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Status<strong></td>
                        <td width="80%"><?php echo $status; ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Amount<strong></td>
                        <td width="80%"><?php echo $amount; ?></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Goal<strong></td>
                        <td width="80%"><?php echo $goal; ?></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Date End<strong></td>
                        <td width="80%"><?php echo $date_end; ?></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Note<strong></td>
                        <td width="80%"><?php echo $note; ?></td>
                      </tr>  
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
