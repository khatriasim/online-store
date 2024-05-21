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

    <title>juice shop-home page</title>

</head>
<body>
    <?php include 'components/header.php'; ?>
    
    <div class="main">
        <section class="home-section">
         <div class="slider">
            <div class="slider_slider slide1">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>hello</h1>
                    <P> Please Have a Fresh Drink.</p>
                <a href="view_products.php" class="btn">shop now</a>
                </div> 
<div class="hero-dec-top"></div>
<div class="hero-dec-bottom"></div>
</div>

<div class="slider_slider slide2">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>hello</h1>
                    <P> Please Have a Fresh Drink.</p>
                <a href="view_products.php" class="btn">shop now</a>
                </div> 
<div class="hero-dec-top"></div>
<div class="hero-dec-bottom"></div>
</div>
<div class="slider_slider slide3">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>hello</h1>
                    <P> Please Have a Fresh Drink.</p>
                <a href="view_products.php" class="btn">shop now</a>
                </div> 
<div class="hero-dec-top"></div>
<div class="hero-dec-bottom"></div>
</div>
<div class="slider_slider slide4">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>hello</h1>
                    <P> Please Have a Fresh Drink.</p>
                <a href="view_products.php" class="btn">shop now</a>
                </div> 
<div class="hero-dec-top"></div>
<div class="hero-dec-bottom"></div>
</div>
<div class="slider_slider slide5">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>hello</h1>
                    <P> Please Have a Fresh Drink.</p>
                <a href="view_products.php" class="btn">shop now</a>
                </div> 
<div class="hero-dec-top"></div>
<div class="hero-dec-bottom"></div>
</div>
<div class="left-arrow">
    <i class="bx bxs-left-arrow"></i>
</div>
<div class="right-arrow">
    <i class="bx bxs-right-arrow"></i>
</div>
</div>
</section>

<section class="thumb">
    <div class="box-container">
        <div class="box">
            <img src="img/green.jpg">
            <h3>green juice</h3>
            <p>thi is good green juice.</p>
            <i class="bx bx-chevron-right"></i>
        </div>
        <div class="box">
            <img src="img/apple.jpg">
            <h3>red juice</h3>
            <p>thi is good green juice.</p>
            <i class="bx bx-chevron-right"></i>
        </div>
        <div class="box">
            <img src="img/mango.jpg">
            <h3>yellow juice</h3>
            <p>thi is good green juice.</p>
            <i class="bx bx-chevron-right"></i>
        </div>
        <div class="box">
            <img src="img/orange.jpg">
            <h3>orange juice</h3>
            <p>thi is good green juice.</p>
            <i class="bx bx-chevron-right"></i>
        </div>
    </div>
</section>
<section class="container">
    <div class="box-container">
        <div class="box">
            <img src="img/dis4.jpg">
            </div>
            <div class="box">
            <span>healthy drink</span>
            <h1>save up to 50% off</h1>
            <P> save your monry on this product with 50% off on the today sale</p>
    </div>
</div>
</section>
<section class="shop">
    <div class="title">
        <img src="img/jc.jpg" width="50px">
        <h1>Trending Products</h1>
    </div>
    <div class="row">
        <img src="img/slong.jpg" height="380px" width="250px">
        <div class="row-detail">
               <img src="img/long.jpg" height="200px" width="700px">
               <div class="top-footer">
                <h1>a cup of fresh juice make you fresh</h1>
        </div>
    </div>
</div>
    <div class="box-container">
        <div class="box">
             <img src="img/apple2.jpg">
             <a href="view_products.php" class="btn">shop now</a>
        </div>
        <div class="box">
             <img src="img/orange5.jpg" >
             <a href="view_products.php" class="btn">shop now</a>
        </div>
        <div class="box">
             <img src="img/pine5.jpg">
             <a href="view_products.php" class="btn">shop now</a>
        </div>
        <div class="box">
             <img src="img/str8.jpg">
             <a href="view_products.php" class="btn">shop now</a>
        </div>
        <div class="box">
             <img src="img/guava5.jpg">
             <a href="view_products.php" class="btn">shop now</a>
        </div>
        <div class="box">
             <img src="img/ba2.jpg">
             <a href="view_products.php" class="btn">shop now</a>
        </div>
    </div>
</section>
<section class="shop-category">
    <div class="box-container">
        <div class="box">
            <img src="img/ext2.jpg">
            <div class="detail">
                <span>BIG OFFERS</span>
                <h1>Extra 15% off</h1>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
        </div>
        <div class="box">
            <img src="img/ext3.jpg">
            <div class="detail">
                <span>new in taste</span>
                <h1>juice house</h1>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
        </div>
    </div>
</section>
<section class="services">
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

<?php include 'components/footer.php'; ?>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>