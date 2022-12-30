<?php 
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_donations'])){
    $id_donations = $_SESSION['id_donations'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $nominal = $_POST['nominal'];
    $metode_pembayaran = $_POST['metode_pembayaran']; 
    $support = $_POST['support'];
    $status = $_POST['status'];
    $lokasi_file = $_FILES['image_payment']['tmp_name'];
    $nama_file = $_FILES['image_payment']['name'];
    $direktori = 'image_payment/'.$nama_file;

    //get image 
    $sql_f = "SELECT `image_payment` FROM `donations` WHERE `id_donations`='$id_donations'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $image_payment = $data_f[0];
        //echo $foto;
    }

    if(empty($nama)){
        header("Location:index.php?include=edit-donations&data=$id_donations&notif=editkosong&jenis=nama");
	}else if(empty($telp)){
	    header("Location:index.php?include=edit-donations&data=$id_donations&notif=editkosong&jenis=telp");
	}else if(empty($nominal)){
	    header("Location:index.php?include=edit-donations&data=$id_donations&notif=editkosong&jenis=nominal");
    }else if(empty($metode_pembayaran)){
        header("Location:index.php?include=edit-donations&data=$id_donations&notif=editkosong&jenis=metode_pembayaran");
    }else if(empty($support)){
        header("Location:index.php?include=edit-donations&data=$id_donations&notif=editkosong&jenis=support");    
    }else if(empty($status)){
        header("Location:index.php?include=edit-donations&data=$id_donations&notif=editkosong&jenis=status");    
    }else{
		$lokasi_file = $_FILES['image_payment']['tmp_name'];
		$nama_file = $_FILES['image_payment']['name'];
		$direktori = 'image_payment/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($image_payment)){
                unlink("image_payment/$image_payment");
            }
            $sql = "UPDATE `donations` set 
            `id_donations`='$id_donations', `nama` = '$nama', `telp` = '$telp', `metode_pembayaran` = '$metode_pembayaran',
            `support`='$support', `status`='$status',
            `image_payment`='$nama_file'
            WHERE `id_donations`='$id_donations'";
        mysqli_query($koneksi,$sql);    
    }else{
        $sql = "UPDATE `donations` set 
            `id_donations`='$id_donations', `nama` = '$nama', `telp` = '$telp', `metode_pembayaran` = '$metode_pembayaran',
            `support`='$support', `status`='$status'
            WHERE `id_donations`='$id_donations'";
      mysqli_query($koneksi,$sql); 
    }    
header("Location:index.php?include=donations&notif=editdonationsberhasil");
}
}
?>
