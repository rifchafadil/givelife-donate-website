<!-- <?php
session_start();
    include("../koneksi/koneksi.php");
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/stylelogg.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>

<div class="container">
    <?php if(!empty($_GET['notif'])){?>
        <?php if($_GET['notif']=="namakosong"){?>
            <span class="text-danger">
                Maaf Nama Tidak Boleh Kosong
            </span>
        <?php } else if($_GET['notif']=="emailkosong"){?>
            <span class="text-danger">
                Maaf Email Tidak Boleh Kosong
            </span>
        <?php } else if($_GET['notif']=="usernamekosong"){?>
            <span class="text-danger">
                Maaf Username Tidak Boleh Kosong
            </span>
        <?php } else if($_GET['notif']=="passwordkosong"){?>
            <span class="text-danger">
                Maaf Password Tidak Boleh Kosong
            </span>
        <?php } else if($_GET['notif']=="fotokosong"){?>
            <span class="text-danger">
                Maaf Foto Tidak Boleh Kosong, Upload foto terlebih dahulu!
            </span>
        <?php }?>
    <?php }?>
    <form action="index.php?include=konfirmasi-signup" method="post" enctype="multipart/form-data">
    <div class="form-content">
        <div class="signup-form">
            <div class="logo">
                <img src="assets/logo2.png" alt="">
            </div>
            <div class="title">
                <h1>Welcome to GiveLife!</h1>
                <p>Create your account by filling the form <br> below.</p>
            </div>
            <div class="input-boxes">
                <div class="input-box">
                    <h5>Name</h5>
                    <input id="text" type="text" name="nama" placeholder="Enter your name" autocomplete="off" required>
                </div>
                <br>
                <div class="input-box">
                    <h5>Username</h5>
                    <input id="text" type="text" name="username" placeholder="Enter your username" autocomplete="off" required>
                </div>
                <br>
                <div class="input-box">
                    <h5>Email</h5>
                    <input id="text" type="text" name="email" placeholder="Enter your email" autocomplete="off" required>
                </div>
                <br>
                <div class="input-box">
                    <h5>Password</h5>
                    <input type="password" name="password" placeholder="Enter your password" autocomplete="off" required id="myInput">
                    <!-- <span class="eye" onclick="myFunction()">
                        <i id="hide1" class="fa fa-eye"></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
                    </span> -->
                </div>
                <br>
                <div class="input-box">
                    <h5>Foto</h5>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="foto">
                        <label class="custom-file-label" for="customFile"></label>
                    </div> 
                </div>
                
                <!-- <div class="button-grup">
                    <div class="button input-box">
                        <button button type="submit" value="Sign Up"></button>
                    </div>
                </div> -->
                <div class="login">
                    <button type="submit" class="form-create" name="submit">Sign Up</button>
                </div>

            </div>
        </div>
    </form>
    <div class="form-content">
        <img src="assets/login.png" alt="">
    </div>
</div>

    <!-- <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

            if(x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            }
            else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script> -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.css"></script>
<script src="js/script.js"></script>

    
</body>
</html>