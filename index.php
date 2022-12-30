<?php include("koneksi/koneksi.php");
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if ($include == "konfirmasi-login") {
    include("include/konfirmasilogin.php");
  
  }
  // else if ($include == "signout") {
  //   include("include/signout.php");
  // }
  elseif($include == "konfirmasi-donate"){    
    include("include/konfirmasidonate.php");
  }
  elseif($include == "konfirmasi-signup"){    
    include("include/konfirmasisignup.php");
  }
}
?>
  
<!doctype html>
<html lang="en">
  <head>
  </head>
  <body>
 

    <?php 
    //pemanggilan konten halaman index
    if(isset($_GET["include"])){
      $include = $_GET["include"];
      if($include=="login"){
        include("include/login.php");
      }elseif($include=="programs"){    
        include("include/programs.php");
      }elseif($include=="donate"){    
        include("include/donate.php");
      }elseif($include=="success"){    
        include("include/success.php");
      }elseif($include=="signup"){    
        include("include/signup.php");
      }elseif($include=="logout"){    
        include("include/logout.php");
      }else{    
        include("include/index.php");
      }
    }else{
      include("include/index.php");
    }
    ?>

  

</body>
</html>