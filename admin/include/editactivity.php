<?php
if(isset($_GET['data'])){
	$id_activity = $_GET['data'];
	$_SESSION['id_activity']=$id_activity;  

	$sql_d = "SELECT `id_campaign`, `amount`, `description` FROM `activity` WHERE `id_activity` = '$id_activity'";
    $query_d = mysqli_query($koneksi,$sql_d);
    while($data_d = mysqli_fetch_row($query_d)){
      $id_campaign = $data_d[0];
      $amount = $data_d[1];
      $description = $data_d[2];
    }
}
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Activity</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=activity">Data Activity</a></li>
              <li class="breadcrumb-item active">Edit Data Activity</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data activity</h3>
        <div class="card-tools">
          <a href="index.php?include=activity" class="btn btn-sm btn-warning float-right">
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
      
      <form class="form-horizontal" action="index.php?include=konfirmasi-edit-activity" method="post" enctype="multipart/form-data">
        <div class="card-body">  
        <div class="form-group row">
            <label for="image_activity" class="col-sm-3 col-form-label"> Image </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image_activity" id="image_activity">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>

          <div class="form-group row">
          <label for="campaign" class="col-sm-3 col-form-label">Campaign</label>
              <div class="col-sm-7">
              <select class="form-control" id="campaign" name="campaign">
              <option value="">- Pilih Campaign -</option>
              <?php 
              $sql = "SELECT `id_campaign`,`title` FROM `campaign` ORDER BY `title`";
              $query = mysqli_query($koneksi, $sql);
              while($data = mysqli_fetch_row($query)){
                $id_camp = $data[0];
                $tit = $data[1];
          ?>
          <option value="<?php echo $id_camp;?>" 
          <?php if($id_camp==$id_campaign){?>
          selected <?php }?>><?php echo $tit;?></option>
          <?php }?>
          </select>
          </div>
      </div>
  

          <div class="form-group row">
              <label for="amount" class="col-sm-3 col-form-label">Amount</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" name="amount" id="amount" 
              value="<?php echo $amount;?>">
              </div>
          </div>

          <div class="form-group row">
              <label for="description" class="col-sm-3 col-form-
              label">Description</label>
              <div class="col-sm-7">
              <input type="text" class="form-control" name="description" 
              id="description" value="<?php echo $description;?>">
              </div>
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