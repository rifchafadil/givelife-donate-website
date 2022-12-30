<?php

if(isset($_GET['data'])){
	$id_campaign = $_GET['data'];
	$_SESSION['id_campaign']=$id_campaign;
  
	$sql_d = "SELECT `id_campaign`, `title`, `description`, `status`, `amount`, `goal`, `date_end`, `note` from `campaign` where `id_campaign` = '$id_campaign'";
    $query_d = mysqli_query($koneksi,$sql_d);
    while($data_d = mysqli_fetch_row($query_d)){
        $id_campaign = $data_d[0];
        $title = $data_d[1];
        $description = $data_d[2];
        $status = $data_d[3];
        $amount = $data_d[4];
        $goal = $data_d[5];  
        $date_end = $data_d[6];
        $note = $data_d[7];
    }
}
?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="fas fa-edit"></i> Edit Data Campaign</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php?include=donasi">Data Campaign</a></li>
                <li class="breadcrumb-item active">Edit Data Campaign</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Campaign</h3>
            <div class="card-tools">
              <a href="index.php?include=donasi" class="btn btn-sm btn-warning float-right">
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
            <?php echo $_GET['jenis'];?> wajib di isi</div>
          <?php }?>
        <?php }?>
          </div>

          <form class="form-horizontal" method="POST" action="index.php?include=konfirmasi-edit-donasi" enctype="multipart/form-data">
            <div class="card-body">

            <div class="form-group row">
              <label for="image_campaign" class="col-sm-3 col-form-label">Image</label>
              <div class="col-sm-7">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image_campaign" id="image_campaign">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>  
              </div>
            </div>

              <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" id="title" value="<?php echo $title ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="description" id="description" rows="6"><?php echo $description ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="status" id="status" value="<?php echo $status ?>">                
                </div>
              </div>

              <div class="form-group row">
                <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $amount ?>">                
                </div>
              </div>

              <div class="form-group row">
                <label for="goal" class="col-sm-3 col-form-label">Goal</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="goal" id="goal" value="<?php echo $goal ?>">                
                </div>
              </div>

              <div class="form-group row">
                <label for="date_end" class="col-sm-3 col-form-label">Date End</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="date_end" id="date_end" value="<?php echo $date_end ?>">                
                </div>
              </div>

              <div class="form-group row">
                <label for="note" class="col-sm-3 col-form-label">Note</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="note" id="note" value="<?php echo $note ?>">                
                </div>
          </div>
    </div>


    <!-- /.card-body -->
    <div class="card-footer">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
      </div>
    </div>
    <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->

  </section>
  <!-- /.content -->
