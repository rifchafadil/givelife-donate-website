
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Galang Dana</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=donasi">Data Galang Dana</a></li>
              <li class="breadcrumb-item active">Tambah Galang Dana</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Galang Dana</h3>
        <div class="card-tools">
          <a href="index.php?include=donasi" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <!-- <div class="col-sm-10">
      </div> -->

      <div class="col-sm-10">
      <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
      <?php if($_GET['notif']=="tambahkosong"){?>
          <div class="alert alert-danger" role="alert">Maaf data 
          <?php echo $_GET['jenis'];?> wajib di isi</div>
      <?php }?>
    <?php }?>
      </div>

      <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-donasi" enctype="multipart/form-data">
        <div class="card-body">
          <!-- <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Galang Dana</label>
            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="kategori_Galang Dana">
              </select>
            </div>
          </div> -->
<!-- 
          <div class="form-group row">
            <label for="image_news" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image_news" id="image_news">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div> -->

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
              <input type="text" class="form-control" name="title" id="title" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="description" id="description" rows="6"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="status" id="status" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label">Amount</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="amount" id="amount" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="goal" class="col-sm-3 col-form-label">Goal</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="goal" id="goal" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="date_end" class="col-sm-3 col-form-label">Date End</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="date_end" id="date_end" value="">
            </div>
          </div>

          <div class="form-group row">
            <label for="note" class="col-sm-3 col-form-label">Note</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="note" id="note" value="">
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