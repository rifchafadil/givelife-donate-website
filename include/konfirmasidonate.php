<?php 
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$nominal = $_POST['rupiah2'];
$support = $_POST['support'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$lokasi_file = $_FILES['image_payment']['tmp_name'];
$nama_file = $_FILES['image_payment']['name'];
$direktori = 'image_payment/'.$nama_file;

$nominal = str_replace("Rp. ","",$nominal);
$nominal = str_replace(".","",$nominal);


if(empty($nama)){
	header("Location:index.php?include=donate&notif=tambahnamakosong");
}else if(empty($telp)){
	header("Location:index.php?include=donate&notif=tambahtelpkosong");
}else if(empty($nominal)){
	header("Location:index.php?include=donate&notif=tambahnominalkosong");
}else if(empty($support)){
	header("Location:index.php?include=donate&notif=tambahsupportkosong");
}else if(empty($metode_pembayaran)){
	header("Location:index.php?include=donate&notif=tambahmetodepembayarankosong");
}else if(empty($direktori)){
	header("Location:index.php?include=donate&notif=tambahkosong&jenis=pembayaran");
}else{
	$sql = "INSERT INTO `donations` (`nama`, `telp`, `nominal`, `support`, `metode_pembayaran`, `image_payment`) 
	VALUES ('$nama', '$telp', '$nominal', '$support', '$metode_pembayaran', '$nama_file')";
	mysqli_query($koneksi,$sql);
    $id_donations = mysqli_insert_id($koneksi);
header("Location:index.php?include=success");	
}
?>