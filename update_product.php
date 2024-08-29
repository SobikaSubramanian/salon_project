<?php
include("config.php");
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
}

include ("config.php");
if (isset($_POST["update"])) {
        $product_name = $_POST["product_name"];
        $product_rate = $_POST["product_rate"];
        $expire_date = $_POST['expire_date'];
        $description = $_POST['description'];

        $update = "UPDATE products SET product_name = '$product_name', product_rate = '$product_rate', product_expire = '$expire_date', product_description = '$description' WHERE id = $id";
        mysqli_query($conn, $update);

       echo "
             <script>
                window.location.href = 'products.php';
                alert('product updated successfully');
             </script>   ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Edit</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
        <div class="row overflow-hidden">
                <div class="col-3 bg-dark min-vh-100 overflow-hidden">
                        <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                                        href="dashboard.php">Home</a></div>
                        <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                                        href="view.php">View employee</a></div>
                        <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                                        href="products.php">Products</a></div>
                        <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                                        href="service.php">Service</a>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-3"><a href="logout.php"><input
                                                class="btn bg-white text-black" type="submit" name="submit"
                                                value="Logout"></a>
                        </div>
                </div>

                <div class="col mt-5">
                        <form class="col form container" method="post" action="" enctype="multipart/form-data">

                                <div class="row p-3">
                                        <div class="col-3">
                                                <label for="name" class="form-label fs-3">Product Name</label>
                                        </div>
                                        <div class="col">
                                                <input class="form-label" name="product_name" type="text"
                                                        value="<?php echo $row['product_name'] ?>">
                                        </div>
                                </div>

                                <div class="row p-3">
                                        <div class="col-3">
                                                <label for="rate" class="form-label fs-3">Product Rate</label>
                                        </div>
                                        <div class="col">
                                                <input class="form-label" name="product_rate" type="number"
                                                        value="<?php echo $row['product_rate'] ?>">
                                        </div>
                                </div>

                                <div class="row p-3">
                                        <div class="col-3">
                                                <label for="expire_date" class="form-label fs-3">Product Expire
                                                        Date</label>
                                        </div>
                                        <div class="col">
                                                <input type="date" name="expire_date"
                                                        value="<?php echo $row['product_expire'] ?>">
                                        </div>
                                </div>

                                <div class="row p-3">
                                        <div class="col-3">
                                                <label for="description" class="form-label fs-3">Product
                                                        Description</label>
                                        </div>
                                        <div class="col">
                                                <textarea name="description"
                                                        value="<?php echo $row['product_description'] ?>"></textarea>
                                        </div>
                                </div>

                                <div class="row p-3">
                                        <div class="col-3">
                                                <label for="img" class="form-label fs-3">Image</label>
                                        </div>
                                        <div class="col">
                                                <img src="images/<?php echo $row['product_image'] ?>" width="200px"
                                                        height="200px" alt="">
                                        </div>
                                </div>

                                <div class="row-5 p-3">
                                        <input type="submit" name="update" class="btn bg-primary" value="Update">
                                </div>
                        </form>
                </div>
        </div>
</body>

</html>