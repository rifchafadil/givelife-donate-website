<?php 
if(isset($_SESSION['id_laporan'])){
  $id_laporan = $_SESSION['id_laporan'];
  $dana_tersampaikan = $_POST['dana_tersampaikan'];
  $donatur = $_POST['donatur'];
  $galang_dana = $_POST['galang_dana'];
  $relawan = $_POST['relawan'];


if(empty($dana_tersampaikan)){
    header("Location:index.php?include=edit-laporan&data=$id_laporan&notif=editkosong&jenis=dana");
}else if(empty($relawan)){
    header("Location:index.php?include=edit-laporan&data=$id_laporan&notif=editkosong&jenis=relawan");
}else if(empty($galang_dana)){
    header("Location:index.php?include=edit-laporan&data=$id_laporan&notif=editkosong&jenis=galangdana");
}else if(empty($donatur)){
    header("Location:index.php?include=edit-laporan&data=$id_laporan&notif=editkosong&jenis=donatur");
}else{
        $sql = "UPDATE `laporan` set 
        `id_laporan`='$id_laporan', 
        `dana_tersampaikan`='$dana_tersampaikan',
        `donatur`='$donatur', `galang_dana`='$galang_dana', 
        `relawan`='$relawan'
        WHERE `id_laporan`='$id_laporan'";
      mysqli_query($koneksi,$sql); 
    

header("Location:index.php?include=laporan&notif=editlaporanberhasil");
}
}
?>
