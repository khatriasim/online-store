<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'components/connection.php';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if(isset($_POST['logout'])){
    session_destroy();
    header("location: login.php");
    exit;
}
$count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
$count_wishlist_items->execute([$user_id]);
$total_wishlist_items = $count_wishlist_items->rowCount();
$count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
$count_cart_items->execute([$user_id]);
$total_cart_items = $count_cart_items->rowCount();
?>

<header class="header"> 
    <div class="flex">
        <a href="home.php" class="logo"><img src="img/jc.jpg" width="60px "></a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="view_products.php">Products</a>
            <a href="order.php">Orders</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
        </nav>
        <div class="icons">
            <i class="bx bxs-user" id="user-btn"></i>
            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i></a>
            <a href="cart.php" class="cart-btn"><i class="bx bx-cart-download"></i></a>
            <i class="bx bx-list-plus" id="menu-btn" style="font-size: 2rem;"></i>
        </div>
        <div class="user-box">
            <?php if(isset($_SESSION['user_id'])): ?>
                <p>Username: <span><?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?></span></p>
                <p>Email: <span><?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?></span></p>
                <form method="post">
                    <button type="submit" name="logout" class="logout-btn">Log Out</button>
                </form>
            <?php else: ?>
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Register</a>
            <?php endif; ?>
        </div>
    </div>
</header>
