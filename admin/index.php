<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if ($include == "konfirmasi-login") {
    include("include/konfirmasilogin.php");
  }
  else if ($include == "signout") {
    include("include/signout.php");
  }
  // else if ($include == "donasi") {
  //   include("include/donasi.php");
  // }
  else if ($include == "konfirmasi-tambah-kategori-berita") {
    include("include/konfirmasitambahkategoriberita.php");
  }
  else if ($include == "konfirmasi-edit-kategori-berita") {
    include("include/konfirmasieditkategoriberita.php");
  }
  else if ($include == "konfirmasi-tambah-tag") {
    include("include/konfirmasitambahtag.php");
  }
  else if ($include == "konfirmasi-edit-tag") {
    include("include/konfirmasiedittag.php");
  }
  else if ($include == "konfirmasi-tambah-berita") {
    include("include/konfirmasitambahberita.php");
  }
  else if ($include == "konfirmasi-edit-activity") {
    include("include/konfirmasieditactivity.php");
  }
  else if ($include == "konfirmasi-edit-profil") {
    include("include/konfirmasieditprofil.php");
  }
  else if($include=="konfirmasi-tambah-user"){
    include("include/konfirmasitambahuser.php");
  }
  else if($include=="konfirmasi-edit-user"){
    include("include/konfirmasiedituser.php");
  }
  else if($include=="konfirmasi-edit-donasi"){
    include("include/konfirmasieditdonasi.php");
  }
  else if($include=="konfirmasi-tambah-penerbit"){
    include("include/konfirmasitambahpenerbit.php");
  }
  else if($include=="konfirmasi-edit-berita"){
    include("include/konfirmasieditberita.php");
  }
  else if($include=="konfirmasi-edit-donations"){
    include("include/konfirmasieditdonations.php");
  }
  else if($include=="konfirmasi-edit-penerbit"){
    include("include/konfirmasieditpenerbit.php");  
  }
  else if($include=="konfirmasi-tambah-activity"){
    include("include/konfirmasitambahactivity.php");
  }
  else if($include=="konfirmasi-tambah-laporan"){
    include("include/konfirmasitambahlaporan.php");
  }
  else if($include=="konfirmasi-tambah-donasi"){
    include("include/konfirmasitambahdonasi.php");
  }
  else if($include=="konfirmasi-edit-activity"){
    include("include/konfirmasieditactivity.php");
  }
  else if($include=="konfirmasi-edit-laporan"){
    include("include/konfirmasieditlaporan.php");
  }
  else if($include=="konfirmasi-tambah-kategori-activity"){
    include("include/konfirmasitambahkategoriactivity.php");
  }
  else if($include=="konfirmasi-tambah-donations"){
    include("include/konfirmasitambahdonations.php");
  }
  else if($include=="konfirmasi-edit-kategori-activity"){
    include("include/konfirmasieditkategoriactivity.php");
  }
  else if($include=="konfirmasi-ubah-password"){
    include("include/konfirmasiubahpassword.php");
  }
  else if($include=="konfirmasi-edit-activity"){
    include("include/konfirmasieditactivity.php");
  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>
<?php
//cek ada get include
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  //cek apakah ada session id admin
  if (isset($_SESSION['id_user'])) {
?>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php
          if ($include == "kategori-berita") {
            include("include/kategoriberita.php");
          } else if ($include == "tambah-kategori-berita") {
            include("include/tambahkategoriberita.php");
          } else if ($include == "edit-kategori-berita") {
            include("include/editkategoriberita.php");
          } else if ($include == "tag") {
            include("include/tag.php");
          } else if ($include == "laporan") {
            include("include/laporan.php");
          } else if ($include == "tambah-tag") {
            include("include/tambahtag.php");
          } else if ($include == "tambah-donasi") {
            include("include/tambahdonasi.php");
          } else if ($include == "tambah-donations") {
            include("include/tambahdonations.php");
          } else if ($include == "tambah-laporan") {
            include("include/tambahlaporan.php");
          } else if ($include == "edit-tag") {
            include("include/edittag.php");
          } else if ($include == "edit-berita") {
            include("include/editberita.php");
          } else if ($include == "edit-donations") {
            include("include/editdonations.php");
          } else if ($include == "penerbit") {
            include("include/penerbit.php");
          } else if ($include == "donations") {
            include("include/donations.php");
          } else if ($include == "visimisi") {
            include("include/visimisi.php");
          } else if ($include == "berita") {
            include("include/berita.php");
          } else if ($include == "donasi") {
            include("include/donasi.php");
          } else if ($include == "tambah-berita") {
            include("include/tambahberita.php");
          } else if ($include == "edit-berita") {
            include("include/editberita.php");
          } else if ($include == "edit-laporan") {
            include("include/editlaporan.php");
          } else if ($include == "detail-berita") {
            include("include/detailberita.php");
          } else if ($include == "detail-laporan") {
            include("include/detaillaporan.php");
          } else if ($include == "edit-profil") {
            include("include/editprofil.php");
          } else if ($include == "user"){
            include("include/user.php");
          }else if($include=="tambah-user"){
          include("include/tambahuser.php");
          }else if($include=="edit-user"){
            include("include/edituser.php");
          }else if($include=="detail-user"){
            include("include/detailuser.php");
          }else if($include=="tambah-penerbit"){
            include("include/tambahpenerbit.php");
          }else if($include=="edit-penerbit"){
            include("include/editpenerbit.php");
          }else if($include=="detail-visimisi"){
            include("include/detailvisimisi.php");
          }elseif($include=="kategori-activity"){
            include("include/kategoriactivity.php");
          }else if($include=="tambah-kategori-activity"){
            include("include/tambahkategoriactivity.php");
          }else if($include=="edit-kategori-activity"){
            include("include/editkategoriactivity.php");
          }else if($include=="detail-kategori-activity"){
            include("include/editkategoriactivity.php");
          }else if($include=="activity"){
            include("include/activity.php");
          }else if($include=="tambah-activity"){
            include("include/tambahactivity.php");
          }else if($include=="edit-activity"){
            include("include/editactivity.php");
          }else if($include=="detail-activity"){
            include("include/detailactivity.php");   
          }else if($include=="ubah-password"){
            include("include/ubahpassword.php");
          }else if($include=="activity"){
            include("include/activity.php");
          }else if($include=="detail-activity"){
            include("include/detailactivity.php");
          }else if($include=="detail-donations"){
            include("include/detaildonations.php");
          }else if($include=="detail-donasi"){
            include("include/detaildonasi.php");
          }else if($include=="edit-donasi"){
            include("include/editdonasi.php");
          }else if($include=="edit-activity"){
            include("include/editactivity.php");
          }

          else {
            include("include/profil.php");
          }

          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
  <?php
  } else {
    //pemanggilan halaman form login
    include("include/login.php");
  }
} else {
  if (isset($_SESSION['id_user'])) {
    //pemanggilan ke halaman-halaman profil jika ada session
  ?>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php
          //pemanggilan profil
          include("include/profil.php");
          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
<?php
  } else {
    //pemanggilan halaman form login
    include("include/login.php");
  }
}
?>

</html>