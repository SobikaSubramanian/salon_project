<?php
include("config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = "SELECT product_name, product_rate FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $product_name = $row['product_name'];
    $product_rate = $row['product_rate'];
    $status = 1;

    $insert = "INSERT INTO products_order (product_name, product_rate, status) VALUES('$product_name', '$product_rate', '$status')";
    mysqli_query($conn, $insert);

    echo "<script>
            window.location.href = 'buy.php';
        </script>";
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place order</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="row">
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
                        <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                                        href="buy.php">Buy</a>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-3"><a href="logout.php"><input
                                                class="btn bg-white text-black" type="submit" name="submit"
                                                value="Logout"></a>
                        </div>
                </div>

                <div class="col">
                        <table class="m-3 mt-5 table table-hover table-striped">
                                <tr>
                                        <th>Sno</th>
                                        <th>Product_name</th>
                                        <th>Product_rate</th>
                                        <th>Product_Quantity</th>
                                </tr>

                                <?php
                                     $i = 1;
                                     while($row = mysqli_fetch_assoc($result))   {
                                        echo "
                                        <tr>
                                            <td>".$i."</td>
                                            <td>" . $row['product_name'] . "</td>
                                            <td>" . $row['product_rate'] . "</td>
                                        </tr>
                                        ";
                                        $i++;
                                     }
                                ?>
                        </table>
                </div>
        </div>
</body>
</html> -->