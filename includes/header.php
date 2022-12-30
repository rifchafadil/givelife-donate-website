<!-- <?php
// if(isset($_GET['data'])){
//     $id_user = $_GET['data'];
// }
?> -->

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

<!-- header section starts -->
<section class="header">
    <img class="logo" src="assets/logo.png" alt="">

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="index.php?include=programs">Our Programs</a>
        <a href="index.php?include=login" id="headlog" class="link-btn">Login/SignUp</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!-- header section ends -->



<script src="https://unpkg.com/swiper@7/swiper-bundle.min.css"></script>
<script src="js/script.js"></script>    
</body>
</html>