
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/stylelogg.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>

<div class="container">
<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php if(!empty($_GET['gagal'])){?>
      <?php if($_GET['gagal']=="userKosong"){?>
          <span class="text-danger">
            Maaf Username Tidak Boleh Kosong
          </span>
        <?php } else if($_GET['gagal']=="passKosong"){?>
          <span class="text-danger">
          Maaf Password Tidak Boleh Kosong
        </span>
        <?php } else {?>
          <span class="text-danger">
          Maaf Username dan Password Anda Salah
        </span>
        <?php }?>
        <?php }?>

        <?php if(!empty($_GET['notif'])){?>
            <?php if($_GET['notif']=="signupberhasil"){?>
                <span class="text-success">
                    Sign Up berhasil dilakukan, silahkan login untuk masuk ke dalam aplikasi!
                </span>
            <?php } elseif($_GET['notif']=="logoutberhasil"){?>
                <span class="text-success">
                    Anda berhasil logout!
                </span>
            <?php }?>
        <?php }?>

    <form action="index.php?include=konfirmasi-login" method="post">
 
        <div class="form-content">
        <div class="login-form">
            <div class="logo">
                <img src="assets/logo2.png" alt="">
            </div>
            <div class="title">
                <h1>Welcome back,</h1>
                <p>please login to your account</p>
            </div>
          
            <div class="input-boxes">
                <div class="input-box">
                    <h5>Username</h5>
                    <input id="text" type="text" name="username" placeholder="Enter your username" >
                </div>
<br>
                <div class="input-box">
                    <h5>Password</h5>
                    <input id="text" type="password" name="password" placeholder="Enter your password" >
                    <!-- <span class="eye" onclick="myFunction()">
                        <i id="hide1-login" class="fa fa-eye"></i>
                        <i id="hide2-login" class="fa fa-eye-slash"></i>
                    </span> -->
                </div>
<br>
                <div class="button-grup">
                    <div class="login">
                  <button type="submit" name= "login" value="login" class="form-create">Login</button>
                  </div>
                    <div class="create">
                        <button class="form-create">
                            <a href="index.php?include=signup"> Create Account</a>
                        </button>
                    </div>
                </div>
    
            </div>
        </div>  
    </form>
    <div class="form-content">
        <img src="assets/login.png" alt="">
    </div>
</div>

 

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.css"></script>
<script src="js/script.js"></script>

    
</body>
</html>