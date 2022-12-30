<?php 

    if(isset($_POST["submit"])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(empty($nama)){
            header("Location:index.php?include=signup&notif=namakosong");
        }else if(empty($username)){
            header("Location:index.php?include=signup&notif=usernamekosong");
        }else if(empty($email)){
            header("Location:index.php?include=signup&notif=emailkosong");
        }else if(empty($pass)){
            header("Location:index.php?include=signup&notif=passwordkosong");
        }else if(empty($_FILES["foto"])) {
            header("Location:index.php?include=signup&notif=fotokosong");
        } else {

            $password = mysqli_real_escape_string($koneksi, MD5($pass));

            $lokasi_file = $_FILES['foto']['tmp_name'];
            $nama_file = $_FILES['foto']['name'];
            $direktori = 'foto/'.$nama_file;

            move_uploaded_file($lokasi_file, $direktori);

            $sql = "INSERT INTO `user` (`nama`, `email`, `username`, `password`, `foto`) 
            VALUES ('$nama', '$email', '$username', '$password', '$nama_file')";
            
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=login&notif=signupberhasil");	

        }
    }




?>