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
<section class="visi" style="background:url(assets/visimisi.png) no-repeat">
    <h1 class="heading-title"> Visi Misi </h1>
    <div class="box-container">
    <?php
    $sql_k = "SELECT `description` FROM `visimisi` WHERE `id_visimisi`=1";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $description = $data_k[0];
    ?>

        <div class="box">
            <img src="assets/visi1.png" alt="">
            <h3><?php echo $description ?></h3>
        </div>
    <?php } ?>

    <?php
    $sql_k = "SELECT `description` FROM `visimisi` WHERE `id_visimisi`=2";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $description = $data_k[0];
    ?>
        <div class="box">
            <img src="assets/visi2.png" alt="">
            <h3><?php echo $description ?></h3>
        </div>
        <?php } ?>

        <?php
    $sql_k = "SELECT `description` FROM `visimisi` WHERE `id_visimisi`=5";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $description = $data_k[0];
    ?>

        <div class="box">
            <img src="assets/visi3.png" alt="">
            <h3><?php echo $description ?></h3>
        </div>
        <?php } ?>


    </div>
</section>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.css"></script>
<script src="js/script.js"></script>    
</body>
</html>