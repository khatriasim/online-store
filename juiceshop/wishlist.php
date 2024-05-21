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
    exit;
}
if(isset($_POST['add_to_cart'])){
    $id = unique_id();
    $product_id = $_POST['product_id'];

    $qty = 1;
    $qty = filter_var($qty, FILTER_SANITIZE_STRING);

    $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND product_id = ?");
    $verify_cart->execute([$user_id, $product_id]);

    $max_cart_items= $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
    $max_cart_items->execute([$user_id]);

    if($verify_cart->rowCount() > 0){
        $warning_msg[] = 'Product already exists in your cart';
    }else if ($max_cart_items->rowCount() > 20){
        $warning_msg[] = 'Cart is full';
    }else{
        $select_price = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
        $select_price->execute([$product_id]);
        $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

        $insert_cart = $conn->prepare("INSERT INTO `cart` (id, user_id, product_id, price, qty) VALUES(?,?,?,?,?)");
        $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['price'], $qty]);
        $success_msg[] = 'Product added to cart successfully';
    }
}

if (isset($_POST['delete_item'])){
    $wishlist_id = $_POST['wishlist_id'];
    $wishlist_id = filter_var($wishlist_id, FILTER_SANITIZE_STRING);

    $verify_delete_items = $conn->prepare("SELECT * FROM `wishlist` WHERE  id =?");
    $verify_delete_items->execute([$wishlist_id]);

    if($verify_delete_items->rowcount()>0){
        $delete_wishlist_id = $conn->prepare("DELETE FROM `wishlist` WHERE id=?");
        $delete_wishlist_id->execute([$wishlist_id]);
        $success_msg[] = "wishlist item delete sucessfully";
    }else{
        $warning_msg[] = 'wishlist item already deleted';
    }
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
    <title>fresho-wishlist page</title>
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>my wishlist</h1>
        </div>
        <div class="title2">
            <a href="home.php">Home</a><span>/ wishlist</span>
        </div>
        <section class="products">
          <h1 class="title">products added in wishlist</h1>
          <div class="box-container">
            <?php
            $grand_total = 0;
            $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $select_wishlist->execute([$user_id]);
            if ($select_wishlist->rowCount()>0){
                while($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)){
                    $select_products = $conn->prepare("SELECT * FROM products WHERE id=?");
                    $select_products->execute([$fetch_wishlist['product_id']]);
                    if ($select_products->rowCount()> 0){
                    $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)
                   
            ?>
<!-- Inside the while loop where the wishlist items are displayed -->
<form method="post" action="" class="box">
    <input type="hidden" name="wishlist_id" value="<?= $fetch_wishlist['id']; ?>">
    <div class="wish">
        <img src="image/<?= $fetch_products['image']; ?>" style="max-width: 100%; max-height: 100%;" />
    </div>

    <div class="button-container">
        <div class="button-group">
            <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
            <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="bx bxs-show"></a>
            <button type="submit" name="delete_item" onclick="return confirm('Delete this item');"><i class="bx bx-x"></i></button>
        </div>
        <div class="button-group">
            <a href="checkout.php?get_id=<?= $fetch_products['id']; ?>" class="btn">Buy Now</a>
        </div>
    </div>

    <h3 class="name"><?= $fetch_products['name']; ?></h3>
    <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
    <div class="flex">
        <p class="price">Price Rs:<?= $fetch_products['price']; ?>/-</p>
    </div>
</form>


            <?php
            $grand_total+=$fetch_wishlist['price'];
             }
            }
        }else{
            echo '<p class="empty">No products added yet!</p>';
        }
            ?>
</div>
        </section>
        <?php include 'components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
    </body>
</html>