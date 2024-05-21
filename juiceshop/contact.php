<?php
include 'components/connection.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

if(isset($_POST['submit-btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    // Assuming $user_id is already defined in your session
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

    // Insert the form data into the database
    $insert_query = $conn->prepare("INSERT INTO `message` (user_id, name, email, number, message) VALUES (?, ?, ?, ?, ?)");
    $insert_query->execute([$user_id, $name, $email, $number, $message]);
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
        <div class="banner">
            <h1>contact us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>/ contact us</span>
        </div>

        <div class="form-container">
            <form method="post">
                <div class="title">
                    <img src="img/jc.jpg" class="logo">
                    <h1>leave a message</h1>
                </div>
                <div class="input-field">
                    <p>your name</p>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <p>your email</p>
                    <input type="email" name="email">
                </div>
                <div class="input-field">
                    <p>your number</p>
                    <input type="number" name="number">
                </div>
                <div class="input-field">
                    <p>your message</p>
                    <textarea name="message"></textarea>
                </div>
                <button type="submit" name="submit-btn" class="btn">send message</button>
            </form>
        </div>
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
