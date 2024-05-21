<?php
include '../components/connection.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location: login.php');
    exit(); // Always exit after a redirect
}

if(isset($_POST['publish'])) {
    // Validation and sanitization
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);

    // Check if image is set and handle upload
    if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../image/'.$image;

        // Check for duplicate image name and size
        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ?");
        $select_image->execute([$image]);

        if ($select_image->rowCount() > 0) {
            $warning_msg[] = 'Image name already exists.';
        } elseif ($image_size > 20000000) {
            $warning_msg[] = 'Image size is too large.';
        } else {
            move_uploaded_file($image_tmp_name, $image_folder);
        }
    } else {
        $image = '';
    }

    // Insert product if no errors
    if (!isset($warning_msg)) {
        $id = unique_id();
        $status = 'active';

        $insert_product = $conn->prepare("INSERT INTO `products` (id, name, price, image, product_detail, status) VALUES(?,?,?,?,?,?)");
        $insert_product->execute([$id, $name, $price, $image, $content, $status]);
        $success_msg[] = 'Product inserted successfully!';
    }
}
if(isset($_POST['draft'])) {
    // Validation and sanitization
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);

    // Check if image is set and handle upload
    if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../image/'.$image;

        // Check for duplicate image name and size
        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ?");
        $select_image->execute([$image]);

        if ($select_image->rowCount() > 0) {
            $warning_msg[] = 'Image name already exists.';
        } elseif ($image_size > 20000000) {
            $warning_msg[] = 'Image size is too large.';
        } else {
            move_uploaded_file($image_tmp_name, $image_folder);
        }
    } else {
        $image = '';
    }

    // Insert product if no errors
    if (!isset($warning_msg)) {
        $id = unique_id();
        $status = 'deactive';

        $insert_product = $conn->prepare("INSERT INTO `products` (id, name, price, image, product_detail, status) VALUES(?,?,?,?,?,?)");
        $insert_product->execute([$id, $name, $price, $image, $content, $status]);
        $success_msg[] = 'Product saved as draft successfully!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="admin_style.css?v=<?php echo time(); ?>">
    <title>fresho admin-add_products page</title>
</head>
<body>

<?php include '../components/admin_header.php'; ?>
    <div class="main">
        <div class="banner">
     <h1>add products</h1>
        </div>
        <div class="title2">
            <a href="dashboard.php">dashboard</a><span>add products</span>
            </div>
            <section class="form-container">
                <h1 class="heading">add products</h1>
               <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <label>product name <sup>*</sup></label>
                    <input type="text" name="name" maxlength="100" required placeholder="add product name">
                </div>
                <div class="input-field">
                    <label>product price <sup>*</sup></label>
                    <input type="number" name="price" maxlength="100" required placeholder="add product price">
                </div>
                <div class="input-field">
                    <label>product detail <sup>*</sup></label>
                   <textarea name="content" required maxlength="10000" required placeholder="write product description"></textarea>
                </div>
                <div class="input-field">
                    <label>product image <sup>*</sup></label>
                    <input type="file" name="image" accept="image/*" required>
                </div>
                <div class="flex-btn">
                    <button type="submit" name="publish" class="btn">publish product</button>
                    <button type="submit" name="draft" class="btn">save as draft</button>
                </div>
               </form>
            </section>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript" src="script.js"></script>

    <?php include '../components/alert.php'; ?>
</body>
</html>
