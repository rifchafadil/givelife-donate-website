<?php 
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_activity'])){
    $id_activity = $_SESSION['id_activity'];
    $id_campaign = $_POST['campaign'];
    $amount = $_POST['amount'];
    $description = addslashes($_POST['description']);
    $lokasi_file = $_FILES['image_activity']['tmp_name'];
    $nama_file = $_FILES['image_activity']['name'];
    $direktori = 'image_activity/'.$nama_file;
 
    //get image 
    $sql_f = "SELECT `image_activity` FROM `activity` WHERE `id_activity`='$id_activity'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $image_activity = $data_f[0];
        //echo $foto;
    }
   
    if(empty($id_campaign)){
        header("Location:index.php?include=edit-activity&data=$id_activity&notif=editkosong&jenis=campaign");
	}else if(empty($amount)){
	    header("Location:index.php?include=edit-activity&data=$id_activity&notif=editkosong&jenis=amount");
	}else if(empty($description)){
	    header("Location:index.php?include=edit-activity&data=$id_activity&notif=editkosong&jenis=description");
	}else{
		$lokasi_file = $_FILES['image_activity']['tmp_name'];
		$nama_file = $_FILES['image_activity']['name'];
		$direktori = 'image_activity/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($image_activity)){
                unlink("image_activity/$image_activity");
            }
            $sql = "UPDATE `activity` set 
            `id_activity`='$id_activity',`id_campaign`='$id_campaign',
            `amount`='$amount',`description`='$description',
            `image_activity`='$nama_file'
            WHERE `id_activity`='$id_activity'";
        mysqli_query($koneksi,$sql);    
    }else{
        $sql = "UPDATE `activity` set 
        `id_activity`='$id_activity',`id_campaign`='$id_campaign',
        `amount`='$amount',`description`='$description' 
        WHERE `id_activity`='$id_activity'";
      mysqli_query($koneksi,$sql); 
    }    

header("Location:index.php?include=activity&notif=editactivityberhasil");
}
}
?>
