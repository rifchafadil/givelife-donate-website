<?php 
// if(isset($_SESSION['id_news'])){
    // $id_news = $_POST['id_news'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
	$image_news = $_POST['image_news'];
	$lokasi_file = $_FILES['image_news']['tmp_name'];
    $nama_file = $_FILES['image_news']['name'];
    $direktori = 'image_news/'.$nama_file;
// }

// $id_news = $_SESSION['id_news'];
// kurang user
// $id_campaign = $_POST['id_campaign'];
// $id_news = $_SESSION['']
// $title = $_POST['title'];
// $description = $_POST['description'];
// $date = $_POST['date'];
// $image = $_POST['image'];


if(empty($title)){
	header("Location:index.php?include=tambah-berita&notif=tambahtitlekosong");
}else if(empty($description)){
	header("Location:index.php?include=tambah-berita&notif=tambahdescriptionkosong");
}else if(empty($date)){
	header("Location:index.php?include=tambah-berita&notif=tambahdatekosong");
}else if(!move_uploaded_file($lokasi_file,$direktori)){
	header("Location:index.php?include=tambah-berita&notif=tambahkosong&jenis=cover");
// }else if(empty($image)){
// 	header("Location:index.php?include=tambah-berita&notif=tambahimagekosong");
}else{
	$sql = "INSERT INTO `news` (`title`, `description`, `date`, `image_news`) 
    VALUES ('$title', '$description', '$date', '$nama_file')";
	mysqli_query($koneksi,$sql);
header("Location:index.php?include=berita&notif=tambahberitaberhasil");	

}
?>