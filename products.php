<?php
include ("config.php");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="row">
        <div class="col-3 bg-dark min-vh-100 overflow-hidden">
            <a class="text-decoration-none text-white position-absolute top-0 end-0 m-2" href="add_products.php"><input
                    class="btn bg-dark text-white" type="submit" value="Add_product"></a>

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
            <div class="col h3 text-light text-center mt-5 position-relative"><a class="text-white text-decoration-none"
                    href="buy.php">Buy</a>
                <p class="position-absolute bottom-0 end-0" id="total_cart">

                </p>
            </div>
            <div class="position-absolute bottom-0 start-0 m-3"><a href="logout.php"><input
                        class="btn bg-white text-black" type="submit" name="submit" value="Logout"></a></div>
        </div>

        <div class="col">
            <table class="m-3 mt-5 table table-hover table-striped">
                <tr>
                    <th>Id</th>
                    <th>Product_name</th>
                    <th>Product_rate</th>
                    <th>Product_expire</th>
                    <th>Product_description</th>
                    <th>Product_image</th>
                    <th>Action</th>
                    <th>Product_status</th>
                    <th>Purchase</th>
                    <!-- <th><a class="text-decoration-none text-white" href="add_products.php"><input
                                class="btn bg-dark text-white" type="submit" value="Add_products"></a></th> -->
                </tr>

                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $status = $row['product_status'] == 1 ? 'Available' : 'Out of stock';

                    echo "
                            <tr>
                                <td>" . ($i + 1) . "</td>
                                <td>" . $row['product_name'] . "</td>
                                <td>" . $row['product_rate'] . "</td>
                                <td>" . $row['product_expire'] . "</td>
                                <td>" . $row['product_description'] . "</td>
                                <td>" . $row['product_image'] . "</td>
                                <td> <a href = 'update_product.php ? id=" . $id . " '> Edit / </a> 
                                     <a href = 'product_delete.php ? id=" . $id . " '> Delete </a>
                                </td>
                                <td> " . $status . "</td>
                                <td> <a href = 'order.php ? id= " . $id . " '> <input type='button' value='Add to cart' class = 'btn bg-dark text-light' id='cart' onclick='addCart()'> </a> </td>
                            </tr>
                        ";

                    $i++;
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        let count = 1;
        function addCart() {
            var product_cart = document.getElementById('cart');
            var total_cart = document.getElementById('total_cart');
                total_cart.innerHTML = count;
                count += 1;
        }
    </script>
</body>

</html>