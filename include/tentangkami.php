<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>

<section class="tentang-kami">
    <div class="heading-title">
        Tentang Kami
    </div>
    <div class="tentang">
    <?php
    $sql_k = "SELECT `title`, `description` FROM `visimisi` WHERE `id_visimisi`=3";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $title = $data_k[0];
        $description = $data_k[1];
?>

        <div class="box">
            <img src="assets/tentangkami.png" alt="">
            <div class="text">
                <h1>“<?php echo $title?>”</h1>
                <h4><?php echo $description?>
                </h4>
            </div>
            <?php } ?>

        </div>
    </div>
</section>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.css"></script>
<script src="js/script.js"></script>    
</body>
</html>