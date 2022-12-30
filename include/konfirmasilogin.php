<?php
    //akses file koneksi database
    // include('../koneksi/koneksi.php');

    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $username = mysqli_real_escape_string($koneksi, $user);
        $password = mysqli_real_escape_string($koneksi, MD5($pass));
        
        //cek username dan password
        $sql="SELECT `id_user` FROM `user` 
                WHERE `username` = '$user' AND `password`='$password'";

        $query = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($query);

        if(empty($user)){             
            header("Location:index.php?include=login&gagal=userKosong");
        }else if(empty($password)){           
            header("Location:index.php?include=login&gagal=passKosong");
        }else if($jumlah==0){
            header("Location:index.php?include=login&gagal=userpassSalah");
        }else{
            // session_start();
            //get data
            while($data = mysqli_fetch_row($query)){
                $id_user = $data[0]; //1
                // $level = $data[1]; //superadmin
                $_SESSION['id_user']=$id_user;
                header("Location:index.php?include=progams");
            }           
        }
    }
?>
