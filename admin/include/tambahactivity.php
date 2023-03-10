
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Activity</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=activity">Data Activity</a></li>
              <li class="breadcrumb-item active">Tambah Activity</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Activity</h3>
        <div class="card-tools">
          <a href="index.php?include=activity" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>

      <div class="col-sm-10">
      <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
      <?php if($_GET['notif']=="tambahkosong"){?>
          <div class="alert alert-danger" role="alert">Maaf data 
          <?php echo $_GET['jenis'];?> wajib di isi</div>
      <?php }?>
    <?php }?>
      </div>
      
      <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-activity"  enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">

            <label for="campaign" class="col-sm-3 col-form-label">Campaign</label>
              <div class="col-sm-7">
              <select class="form-control" id="campaign" name="campaign">
              <option value="">- Pilih Campaign -</option>
              <?php 
              $sql_k = "SELECT `id_campaign`,`title` FROM `campaign` ORDER BY `title`";
              $query_k = mysqli_query($koneksi, $sql_k);
              while($data_k = mysqli_fetch_row($query_k)){
                    $id_campaign = $data_k[0];
                    $title = $data_k[1];
              ?>
                <option value="<?php echo $id_campaign;?>"><?php echo $title;?></option>
              <?php }?>
              </select>
              </div>
          </div>

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
            <label for="amount" class="col-sm-3 col-form-label">Amount</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="amount" id="amount" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="description" id="description" rows="6"></textarea>
            </div>
          </div>

          </div>
          <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
          </div>  
        </div>

        </div>

      </div>
        <!-- /.card-body -->
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>