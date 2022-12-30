
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Form Donate </title>
    <link rel="stylesheet" href="css/stylelogg.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>



<div class="container">
    <div class="col-sm-10">
      <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
      <?php if($_GET['notif']=="tambahkosong"){?>
          <div class="alert alert-danger" role="alert">Maaf data 
          <?php echo $_GET['jenis'];?> wajib di isi</div>
      <?php }?>
    <?php }?>

    <form action="index.php?include=konfirmasi-donate" method="post" enctype="multipart/form-data">
        <div class="form-content">
        <div class="donate-form">

            <!-- <div class="logo">
                <img src="assets/logo2.png" alt="">
            </div> -->
            <div class="title">
                <h1>Donasi Sekarang!</h1>
                <!-- <p>Create your account by filling the form below.</p> -->
            </div>
            <div class="input-boxes">
                <div class="input-box">
                    <h5>Name</h5>
                    <input id="nama" type="text" name="nama" value="" autocomplete="off" required>
                </div>
                <br>
                <div class="input-box">
                    <h5>No telepon</h5>
                    <input type="tel" id="telp" name="telp" value="" autocomplete="off" required>
                    <!-- pattern="[0-9]{1}-[0-9]{2}-[0-9]{3}" -->
                </div>
                <br>
                <div class="input-box">
                    <h5>Nominal Donasi</h5>
                    <input type="text" id= "rupiah2" name="rupiah2" class="form-control" autocomplete="off" required>
                </div>
                <br>
                <div class="input-box">
                    <h5>Keterangan Donasi</h5>
                    <input type="text" id= "support" name="support" autocomplete="off"  value=""required >
                </div>
                <br>
                <div class="input-box">
                    <h5>Metode Pembayaran</h5>
                    <input type="name" id= "metode_pembayaran" name="metode_pembayaran" autocomplete="off" required >
                </div>
                <br>
                <div class="input-box">
                    <h5>Upload Bukti Pembayaran</h5>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image_payment" id="image_payment">
                        <label class="custom-file-label" for="customFile"></label>
                    </div> 
                </div>
                <br>
                
                <div class="button-grup">
                    <div class="donate">
                        <button type="submit"  class="form-create">Donate Now</button>
                        </a>
                  </div>
                </div>
            </div>
        </div>
    </form>
    <div class="form-content">
        <img src="assets/Transfer.png" alt="">
    </div>

</div>



<script src="https://unpkg.com/swiper@7/swiper-bundle.min.css"></script>
<script src="js/main.js"></script>
    
</body>

</html>