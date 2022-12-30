<?php 
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_campaign'])){
    $id_campaign = $_SESSION['id_campaign'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $amount = $_POST['amount'];
    $goal = $_POST['goal'];
    $date_end = $_POST['date_end'];
    $note = $_POST['note'];
    $lokasi_file = $_FILES['image_campaign']['tmp_name'];
    $nama_file = $_FILES['image_campaign']['name'];
    $direktori = 'image_campaign/'.$nama_file;
  
        //get image 
        $sql_f = "SELECT `image_campaign` FROM `campaign` WHERE `id_campaign`='$id_campaign'";
        $query_f = mysqli_query($koneksi,$sql_f);
        while($data_f = mysqli_fetch_row($query_f)){
            $image_campaign = $data_f[0];
            //echo $foto;
        }
  
    if(empty($title)){
	    header("Location:index.php?include=edit-donasi&data=$id_campaign&notif=editkosong&jenis=title");
	}else if(empty($description)){
	    header("Location:index.php?include=edit-donasi&data=$id_campaign&notif=editkosong&jenis=description");
    }else if(empty($status)){
        header("Location:index.php?include=edit-donasi&data=$id_campaign&notif=editkosong&jenis=status");
    }else if(empty($amount)){
        header("Location:index.php?include=edit-donasi&data=$id_campaign&notif=editkosong&jenis=amount");
    }else if(empty($goal)){
        header("Location:index.php?include=edit-donasi&data=$id_campaign&notif=editkosong&jenis=goal");    
    }else if(empty($date_end)){
        header("Location:index.php?include=edit-donasi&data=$id_campaign&notif=editkosong&jenis=dateend");    
    }else if(empty($note)){
        header("Location:index.php?include=edit-donasi&data=$id_campaign&notif=editkosong&jenis=note");    
	}else{
		$lokasi_file = $_FILES['image_campaign']['tmp_name'];
		$nama_file = $_FILES['image_campaign']['name'];
		$direktori = 'image_campaign/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($image_campaign)){
                unlink("image_campaign/$image_campaign");
            }
            $sql = "UPDATE `campaign` set 
            `id_campaign`='$id_campaign',`title`='$title',
            `description`='$description',`status`='$status',
            `amount`='$amount', `goal`='$goal', `date_end`='$date_end', `note`='$note',
            `image_campaign`='$nama_file'
            WHERE `id_campaign`='$id_campaign'";
        mysqli_query($koneksi,$sql); 
        }else{
        $sql = "UPDATE `campaign` set 
            `id_campaign`='$id_campaign',`title`='$title',
            `description`='$description',`status`='$status',
            `amount`='$amount', `goal`='$goal', `date_end`='$date_end', `note`='$note',
            WHERE `id_campaign`='$id_campaign'";
      mysqli_query($koneksi,$sql); 
    }    
header("Location:index.php?include=donasi&notif=editdonasiberhasil");
    }
}
?>
