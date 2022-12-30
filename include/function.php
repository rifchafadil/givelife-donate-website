<?php

function check_login($koneksi){
  if (isset($_SESSION['id_guest'])){
    $id = $_SESSION['id_guest'];
    $query = "select * from guest where id_guest = '$id' limit 1";

    $result = mysqli_query($koneksi, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $guest_data = mysqli_fetch_assoc($result);
        return $guest_data;
    }
  }

  //redirect to login
  header("Location: login.php");
  die;
}

?>