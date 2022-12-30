<?php 
$nama = $_POST['nama'];
$email = $_POST['email'];
$user = $_POST['username'];
$password = $_POST['password'];
$foto = $_POST['foto'];
$username = mysqli_real_escape_string($koneksi, $user);
$password = mysqli_real_escape_string($koneksi, MD5($pass));
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file = $_FILES['foto']['name'];
$direktori = 'foto/'.$nama_file;


if(empty($nama)){
	header("Location:index.php?include=tambah-user&notif=tambahnamakosong");
}else if(empty($email)){
	header("Location:index.php?include=tambah-user&notif=tambahemailkosong");
}else if(empty($user)){
	header("Location:index.php?include=tambah-user&notif=tambahusernamekosong");
}else if(empty($password)){
	header("Location:index.php?include=tambah-user&notif=tambahpasswordkosong");
}else if(!move_uploaded_file($lokasi_file,$direktori)){
	header("Location:index.php?include=tambah-berita&notif=tambahkosong&jenis=cover");
}else{
	$sql = "INSERT INTO `user` (`nama`, `email`, 
	`username`, `password`, `foto`) 
	VALUES ('$nama', '$email', '$user', 
	'$password', '$nama_file')";
	mysqli_query($koneksi,$sql);
header("Location:index.php?include=user&notif=tambahuserberhasil");	
}
?>