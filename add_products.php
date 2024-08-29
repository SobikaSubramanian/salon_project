<?php
include ("config.php");

if (isset($_POST['submit'])) {
    $p_name = $_POST['product_name'];
    $p_rate = $_POST['product_rate'];
    $p_expire = $_POST['expire_date'];
    $p_description = $_POST['description'];
    $image_name = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $status = 1;

    $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
    $allowed_image_extension = array('png', 'jpg', 'jpeg');

    if (!in_array($image_extension, $allowed_image_extension)) {
        $error = "Please select a valid .jpg, .jpeg, or .png image file.";
    }

    $upload_directory = 'images/';
    $image_destination = $upload_directory . $image_name;

    if (move_uploaded_file($temp_name, $image_destination)) {
        echo "<script>  alert('Product added successfully')
            window.location.href = 'products.php' </script>";
    } else {
        echo 'failed';
    }


    $sql = "INSERT INTO products (product_name, product_rate, product_expire, product_description, product_image, product_status) VALUES ('$p_name', '$p_rate', '$p_expire', '$p_description', '$image_name', '$status') ";
    $result = mysqli_query($conn, $sql);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add products</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="row">
    <div class="col-3 bg-dark min-vh-100 overflow-hidden">
            <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                    href="dashboard.php">Home</a>
            </div>
            <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                    href="view.php">View employee</a></div>
            <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                    href="products.php">Products</a></div>
            <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                    href="service.php">Service</a>
            </div>
            <div class="position-absolute bottom-0 start-0 m-3"><a href="logout.php"><input
                        class="btn bg-white text-black" type="submit" name="submit" value="Logout"></a></div>
        </div>

        <form class="col form container" method="post" action="" enctype="multipart/form-data">

            <div class="row p-3">
                <div class="col-3">
                    <label for="name" class="form-label fs-3">Product Name</label>
                </div>
                <div class="col">
                    <input class="form-label" name="product_name" type="text" placeholder="Enter the product name" required>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="rate" class="form-label fs-3">Product Rate</label>
                </div>
                <div class="col">
                    <input class="form-label" name="product_rate" type="number" placeholder="Enter the product rate" required>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="expire_date" class="form-label fs-3">Product Expire Date</label>
                </div>
                <div class="col">
                    <input type="date" name="expire_date" placeholder="Enter the date">
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="description" class="form-label fs-3">Product Description</label>
                </div>
                <div class="col">
                    <textarea name="description"></textarea>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="img" class="form-label fs-3">Image</label>
                </div>
                <div class="col">
                    <input type="file" name="image">
                </div>
            </div>

            <div class="row-5 p-3">
                <input type="submit" name="submit" class="btn bg-primary" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>