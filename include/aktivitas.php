<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aktivitas</title>
    <link rel="stylesheet" href="css/aktivitas.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
<section class="aktivitas">
<?php
    $sql_k = "SELECT `title`, `description` FROM `visimisi` WHERE `id_visimisi`=4";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $title = $data_k[0];
        $description = $data_k[1];
?>

    <h1 class="heading-title"> <?php echo $title?> </h1>
    <p class="description"><?php echo $description?>
    </p>
    <?php } ?>


    <div class="box-container">
    <?php
    $sql_k = "SELECT `title`, `description`, `amount`, `image_campaign` FROM `campaign` WHERE `status`='archived'";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $title = $data_k[0];
        $description = $data_k[1];
        $amount = $data_k[2];
        $image_campaign = $data_k[3];
?>
        <div class="box">
            <img src="admin/image_campaign/<?php echo $image_campaign ?>" alt="">
            <h2> <?php echo $title?></h2>
            <p> <?php echo $description?>
            </p>
            <svg data-testid="progressBarFiller" width="95%" height="10">
                <rect x="0" rx="3" width="100%" height="100%" fill="white"></rect>
                <rect x="0" rx="3" width="100%" height="100%" fill= "#185A4F"></rect>
            </svg>
            <h4>
                Donasi Terkumpul
            </h4>
            <h5>Rp <?php echo $amount?></h5>
        </div>
        <?php } ?>


        <!-- <div class="box">
            <img src="assets/aktivitas2.jpg" alt="">
            <h2> <?php echo $title?> </h2>
            <p><?php echo $description?>

            </p>
            <svg data-testid="progressBarFiller" width="95%" height="10">
                <rect x="0" rx="3" width="100%" height="100%" fill="white"></rect>
                <rect x="0" rx="3" width="100%" height="100%" fill= "#185A4F"></rect>
            </svg>
            <h4>
                Donasi Terkumpul
            </h4>
            <h5>Rp <?php echo $amount?></h5>
        </div>

        <div class="box">
            <img src="assets/aktivitas3.jpg" alt="">
            <h2> <?php echo $title?> </h2>
            <p><?php echo $description?>
            
            </p>
            <svg data-testid="progressBarFiller" width="95%" height="10">
                <rect x="0" rx="3" width="100%" height="100%" fill="white"></rect>
                <rect x="0" rx="3" width="100%" height="100%" fill= "#185A4F"></rect>
            </svg>
            <h4>
                Donasi Terkumpul
            </h4>
            <h5>Rp <?php echo $amount?></h5>
        </div> -->

    </div>
</section>


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.css"></script>
<script src="js/script.js"></script>
    
</body>
</html>
