<?php 
//if(isset($_SESSION['id_donasi'])){
$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];
$amount = $_POST['amount'];
$goal = $_POST['goal'];
$date_end = $_POST['date_end'];
$note = $_POST['note'];
$image_campaign = $_POST['image_campaign'];
$lokasi_file = $_FILES['image_campaign']['tmp_name'];
$nama_file = $_FILES['image_campaign']['name'];
$direktori = 'image_campaign/'.$nama_file;



if(empty($title)){
	header("Location:index.php?include=tambah-donasi&notif=tambahkosong&jenis=title");
}else if(empty($description)){
	header("Location:index.php?include=tambah-donasi&notif=tambahkosong&jenis=description");
}else if(empty($status)){
	header("Location:index.php?include=tambah-donasi&notif=tambahkosong&jenis=status");
}else if(empty($amount)){
	header("Location:index.php?include=tambah-donasi&notif=tambahkosong&jenis=amount");
}else if(empty($goal)){
	header("Location:index.php?include=tambah-donasi&notif=tambahkosong&jenis=goal");
}else if(empty($date_end)){
	header("Location:index.php?include=tambah-donasi&notif=tambahkosong&jenis=date_end");
}else if(empty($note)){
	header("Location:index.php?include=tambah-donasi&notif=tambahkosong&jenis=note");
}else if(!move_uploaded_file($lokasi_file,$direktori)){
	header("Location:index.php?include=tambah-donasi&notif=tambahkosong&jenis=cover");
}else{
	$sql = "INSERT INTO `campaign` (`title`, `description`, `status`, `amount`, `goal`, `date_end`, `note`, `image_campaign`) VALUES 
	('$title', '$description', '$status', '$amount', '$goal', '$date_end', '$note', '$nama_file')";
	mysqli_query($koneksi,$sql);
	$id_campaign = mysqli_insert_id($koneksi);
header("Location:index.php?include=donasi&notif=tambahdonasiberhasil");	
}
?>