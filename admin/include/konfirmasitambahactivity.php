<?php 
//if(isset($_SESSION['id_activity'])){
$id_campaign = $_POST['campaign'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$image_activity = $_POST['image_activity'];
$lokasi_file = $_FILES['image_activity']['tmp_name'];
$nama_file = $_FILES['image_activity']['name'];
$direktori = 'image_activity/'.$nama_file;


if(empty($id_campaign)){
	header("Location:index.php?include=tambah-activity&notif=tambahkosong&jenis=campaign");
}else if(empty($amount)){
	header("Location:index.php?include=tambah-activity&notif=tambahkosong&jenis=amount");
}else if(empty($description)){
	header("Location:index.php?include=tambah-activity&notif=tambahkosong&jenis=description");
}else if(!move_uploaded_file($lokasi_file,$direktori)){
	header("Location:index.php?include=tambah-activity&notif=tambahkosong&jenis=cover");
}else{
	$sql = "INSERT INTO `activity` (`id_campaign`, `amount`, `description`, `image_activity`) VALUES 
	('$id_campaign', '$amount', '$description', '$nama_file')";
	mysqli_query($koneksi,$sql);
	$id_activity = mysqli_insert_id($koneksi);
header("Location:index.php?include=activity&notif=tambahactivityberhasil");	
}
?>