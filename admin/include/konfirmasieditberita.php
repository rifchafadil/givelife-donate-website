<?php 
if(isset($_SESSION['id_news'])){
  $id_news = $_SESSION['id_news'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $date = $_POST['date'];
  $lokasi_file = $_FILES['image_news']['tmp_name'];
  $nama_file = $_FILES['image_news']['name'];
  $direktori = 'image_news/'.$nama_file;

      //get image 
      $sql_f = "SELECT `image_news` FROM `news` WHERE `id_news`='$id_news'";
      $query_f = mysqli_query($koneksi,$sql_f);
      while($data_f = mysqli_fetch_row($query_f)){
          $image_news = $data_f[0];
          //echo $foto;
      }
  

  if(empty($title)){
    header("Location:index.php?include=edit-berita&data=$id_news&notif=editkosong&jenis=title");
  }else if(empty($description)){
    header("Location:index.php?include=edit-berita&data=$id_news&notif=editkosong&jenis=description");
	}else{
		$lokasi_file = $_FILES['image_news']['tmp_name'];
		$nama_file = $_FILES['image_news']['name'];
		$direktori = 'image_news/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($image_news)){
                unlink("image_news/$image_news");
            }
            $sql = "UPDATE `news` set 
            `id_news`='$id_news',`title`='$title',
            `description`='$description',
            `image_news`='$nama_file'
            WHERE `id_news`='$id_news'";
        mysqli_query($koneksi,$sql);    
    }else{
        $sql = "UPDATE `news` set 
        `id_news`='$id_news',`title`='$title',
        `description`='$description' 
        WHERE `id_news`='$id_news'";
      mysqli_query($koneksi,$sql); 
    }    

header("Location:index.php?include=berita&notif=editberitaberhasil");
}
}
?>
