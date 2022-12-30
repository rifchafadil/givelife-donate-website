<?php include("koneksi/koneksi.php");?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Programs</title>
    <link rel="stylesheet" href="css/styleprograms.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body style="background-color: #F9F5E8;">
<?php include 'includes/header.php'; ?>

<!-- berita terkini section starts -->


<section class="berita">
    <div class="heading-title"> Berita Terkini </div>

    <div class="container">
        
<?php
    $sql_k = "SELECT `title`, `description`, `link`, `image_news`FROM `news`";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $title = $data_k[0];
        $description = $data_k[1];
        $link = $data_k[2];
        $image_news = $data_k[3];
?>
        <div class="artikel">
            <div class="card">
            <div class="thumb" style="background-image: url(admin/image_news/<?php echo $image_news ?>)"></div>
                    <article>
                        <h2>
                            <?php echo $title?>
                        </h2>
                        <p>
                            <?php echo $description?>
                        </p>
                        <span><a href="<?php echo $link ?>" target="_blank">See more</a></span>
                    </article>
                </div>
            </div>
    <?php } ?>

    </div>
</section>
<!-- berita terkini section ends -->

<!-- galang dana section starts -->
<section class="aktivitas">
    <h1 class="heading-title"> Program Galang Dana </h1>
    <div class="box-container">
    <?php
    $sql_k = "SELECT `title`, `description`, `note`, `amount` FROM `campaign` WHERE `id_campaign`=4";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $title = $data_k[0];
        $description = $data_k[1];
        $note = $data_k[2];
        $amount = $data_k[3];
?>

        <div class="box">
            <img src="assets/news1.jpeg" alt="">
            <h2> <?php echo $title?></h2>
            <svg data-testid="progressBarFiller" width="95%" height="10">
                <rect x="0" rx="3" width="100%" height="100%" fill="white"></rect>
                <rect x="0" rx="3" width="30%" height="100%" fill= "#185A4F"></rect>
            </svg>
            <span class="span-tersisa">
                <p>Tersisa</p>
            </span>
            <h5>Rp <?php echo $amount?></h5>
        </div>
        <div class="content-part">
                <h3>“<?php echo $note?>”</h3>
                <p><?php echo $description?>
                </p>
                <a href="index.php?include=donate">
                    <button class="button">Donate Now</button></a>
            </div>
    </div>
    <?php } ?>


    <div class="box-container">
    <?php
    $sql_k = "SELECT `title`, `description`, `note`, `amount` FROM `campaign` WHERE `id_campaign`=7";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $title = $data_k[0];
        $description = $data_k[1];
        $note = $data_k[2];
        $amount = $data_k[3];
?>

        <div class="box">
            <img src="assets/news5.jpeg" alt="">
            <h2> <?php echo $title?></h2>
            <svg data-testid="progressBarFiller" width="95%" height="10">
                <rect x="0" rx="3" width="100%" height="100%" fill="white"></rect>
                <rect x="0" rx="3" width="70%" height="100%" fill= "#185A4F"></rect>
            </svg>
            <span class="span-tersisa">
                <p>Tersisa</p>
            </span>
            <h5>Rp <?php echo $amount?></h5>
        </div>
        <div class="content-part">
                <h3>“<?php echo $note?>”</h3>
                <p><?php echo $description?>
                </p>
                <a href="index.php?include=donate" target="_blank">
                    <button class="button">Donate Now</button></a>
            </div>
    </div>
    <?php } ?>


    <div class="box-container">
    <?php
    $sql_k = "SELECT `title`, `description`, `note`, `amount` FROM `campaign` WHERE `id_campaign`=2";
    $query_k = mysqli_query($koneksi, $sql_k);
    while ($data_k = mysqli_fetch_row($query_k)) {
        $title = $data_k[0];
        $description = $data_k[1];
        $note = $data_k[2];
        $amount = $data_k[3];
?>

        <div class="box">
            <img src="assets/news6.jpeg" alt="">
            <h2> <?php echo $title?> </h2>
            <svg data-testid="progressBarFiller" width="95%" height="10">
                <rect x="0" rx="3" width="100%" height="100%" fill="white"></rect>
                <rect x="0" rx="3" width="50%" height="100%" fill= "#185A4F"></rect>
            </svg>
            <!-- <div class="progres-bar">
                <div class="style__Track-sc-__15i3suc-0 iPInFn" data-testid="progressBar">
                    <div class="style__Filler-sc-__sc-15i3suc-1 gRJhnV" color="green" data-testid="progressBarFiller"></div>
                </div>
            </div> -->
            <span class="span-tersisa">
                <p>Tersisa</p>
            </span>
            <h5>Rp <?php echo $amount?></h5>
        </div>
        <div class="content-part">
                <h3>“<?php echo $note?>”</h3>
                <p><?php echo $description?>
                </p>
                <a href="index.php?include=donate">
                    <button class="button">Donate Now</button></a>
            </div>
    </div>
    <?php } ?>


</section>
<!-- galang dana section ends -->

<!-- laporan section starts -->
<h1 class="heading-title"> Laporan Donasi </h1>
<section class="visi" style="background:url(assets/visimisi.png) no-repeat">
    
    <div class="box-container">
    <?php
        $jumlah = 0;
        $jumlah2 = 0;
        $jumlah3 = 0;
        $sql_k = "select * from  (select SUM(amount) from campaign where status= 'archived') as dana_tersampaikan,
        (select SUM(amount) from campaign where status= 'public') as dana_terkumpul,
        (select SUM(id_user) from user) as donatur;";
        $query_k = mysqli_query($koneksi, $sql_k);
        while ($data_k = mysqli_fetch_row($query_k)) {
        $amount = $data_k[0]; 
        $dana = $data_k[1];
        $donate = $data_k[2];     
        $jumlah += $amount;
        $jumlah2 += $dana;
        $jumlah3 += $donate;
        }
    ?>
        <div class="box">
            <img src="assets/donasiterkumpul.png" alt="">
            <h2 class= "donasi"><?php echo "Rp. " .$jumlah/1000000 ."Jt"; ?></h2>
            <h3>Donasi Tersampaikan</h3>
        </div>

        <div class="box">
            <img src="assets/donatur.png" alt="">
            <h2 class ="donatur"><?php echo $jumlah3 ." Org"; ?></h2>
            <h3>Donatur</h3>
        </div>

        <div class="box">
            <img src="assets/galangdana.png" alt="">
            <h2 class="galang_dana"><?php echo "Rp. " .$jumlah2/1000000 ."Jt"; ?></h2>
            <h3>Galang Dana</h3>        
        </div>

        <!-- <div class="box">
            <img src="assets/relawan.png" alt="">
            <h3>Relawan</h3>       
        </div> -->


    </div>
</section>
<!-- laporansection ends -->

<?php include 'includes/footer.php'; ?>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.css"></script>
<script src="js/script.js"></script>
</body>
</html>