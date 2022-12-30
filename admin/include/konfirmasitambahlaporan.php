<?php 
//if(isset($_SESSION['id_laporan'])){
$dana_tersampaikan = $_POST['dana_tersampaikan'];
$donatur = $_POST['donatur'];
$galang_dana = $_POST['galang_dana'];
$relawan = $_POST['relawan'];

if(empty($dana_tersampaikan)){
	header("Location:index.php?include=tambah-laporan&notif=tambahkosong&jenis=danatersampaikan");
}else if(empty($donatur)){
	header("Location:index.php?include=tambah-laporan&notif=tambahkosong&jenis=donatur");
}else if(empty($galang_dana)){
	header("Location:index.php?include=tambah-laporan&notif=tambahkosong&jenis=galangdana");
}else if(empty($relawan)){
	header("Location:index.php?include=tambah-laporan&notif=tambahkosong&jenis=relawan");
}else{
	$sql = "INSERT INTO `laporan` (`dana_tersampaikan`, `donatur`, `galang_dana`, `relawan`) VALUES 
	('$dana_tersampaikan', '$donatur', '$galang_dana', '$relawan')";
	mysqli_query($koneksi,$sql);
	$id_laporan = mysqli_insert_id($koneksi);
header("Location:index.php?include=laporan&notif=tambahlaporanberhasil");	
}
?>