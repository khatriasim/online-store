<?php 
include 'components/connection.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

if(isset($_POST['logout'])){
    session_destroy();
    header("location: login.php");
}
?>
<style type="text/css">
        <?php include 'style.css'; ?>
    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>juice shop-about us</title>
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
       <div class="banner">
        <h1>about us</h1>
       </div>
<div class="title2">
    <a href="home.php">home</a><span>/ about</span>
</div>
<div class="about-category">
    <div class="box">
    <div class="detail">
        <span>juice</span>
        <h1>orange juice</h1>
        <a href="view_products.php" class="btn">shop now</a>
</div>
<img src="img/juice0.jpg">
</div>
<div class="box">
<div class="detail">

        <span>juice</span>
        <h1>strawberry juice</h1>
        <a href="view_products.php" class="btn">shop now</a>
</div>
<img src="img/straw9.jpg">
</div>
<div class="box">
<div class="detail">

        <span>juice</span>
        <h1>pineappple juice</h1>
        <a href="view_products.php" class="btn">shop now</a>
</div>
<img src="img/pinee2.jpg">
</div>
<div class="box">
<div class="detail">
 
        <span>juice</span>
        <h1>guava juice</h1>
        <a href="view_products.php" class="btn">shop now</a>
</div>
<img src="img/guava5.jpg">
</div>
</div>
<section class="services">
    <div class="title">
        <img src="img/jc.jpg" class="logo">
       <h1>why choose us</h1>
       <P>We Have all Types Of Services with great offers !!!</p>
    </div>
    <div class="box-container">
        <div class="box">
           <img src="img/icon2.png">
           <div class="detail">
            <h1>great saving</h1>
            <p>save a big order</p>
           </div>
        </div>
        <div class="box">
           <img src="img/icon1.png">
           <div class="detail">
            <h1>24*7 support</h1>
            <p>on-on-one support</p>
           </div>
        </div>
        <div class="box">
           <img src="img/icon0.png">
           <div class="detail">
            <h1>gift voucher</h1>
            <p>vouchers on every festivals</p>
           </div>
        </div>
        <div class="box">
           <img src="img/icon.png">
           <div class="detail">
            <h1>all over ktm delivery</h1>
            <p>5 chain outlets</p>
           </div>
        </div>
    </div>
</section>
<div class="about-section">
            <div class="row">
                <div class="img-box">
                    <img src="img/vi2.jpg">
                </div>
                <div class="detail">
                    <h1>visit our shop!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, pariatur?</p>
                <a href="view_products.php" class="btn">visit us</a>
                </div>
            </div>
        </div>
<?php include 'components/footer.php'; ?>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>
