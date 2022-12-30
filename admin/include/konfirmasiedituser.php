<?php 
if(isset($_SESSION['id_user'])){
	$id_user = $_SESSION['id_user'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = mysqli_real_escape_string($koneksi, MD5($pass));
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file = $_FILES['foto']['name'];
	$direktori = 'foto/'.$nama_file;
  

    //get foto 
    $sql_f = "SELECT `foto` FROM `user` WHERE `id_user`='$id_user'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        //echo $foto;
    }

	if(empty($nama)){
		header("Location:index.php?include=edit-user&data=$id_user&notif=editkosong&jenis=nama");
	}else if(empty($email)){
		header("Location:index.php?include=edit-user&data=$id_user&notif=editkosong&jenis=email");
	}else if(empty($username)){
		header("Location:index.php?include=edit-user&data=$id_user&notif=editkosong&jenis=username");
	}else{
			$lokasi_file = $_FILES['foto']['tmp_name'];
			$nama_file = $_FILES['foto']['name'];
			$direktori = 'foto/'.$nama_file;
			if(move_uploaded_file($lokasi_file,$direktori)){
				if(!empty($foto)){
						unlink("foto/$foto");
				}
			$sql = "UPDATE `user` SET 
			`nama`='$nama', `email`='$email', 
			`username`='$username', `password`='$password', 
			`foto`='$nama_file' WHERE `id_user`='$id_user'";
		mysqli_query($koneksi,$sql);
			}else{ 
			$sql = "UPDATE `user` SET `nama`='$nama', 
			`email`='$email', `username`='$username', 
			`password`='$password' WHERE `id_user`='$id_user'";
					//echo $sql;
			mysqli_query($koneksi,$sql);
			}
		header("Location:index.php?include=user&notif=edituserberhasil");
		}
		}
?>