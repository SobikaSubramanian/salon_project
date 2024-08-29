<?php
include("config.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $status = 0;
    $sql = "UPDATE products_order SET status = '$status' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
}

$display = "SELECT * FROM products_order WHERE status = 1";
$res = mysqli_query($conn, $display);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase things</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        .total {
            font-weight: bold;
            font-size: 20px;
        }
    </style>
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
                        class="btn bg-white text-black" type="submit" name="submit" value="Logout"></a>
            </div>
        </div>

        <div class="col">
            <table class="m-3 mt-5 table table-hover table-striped">
                <tr>
                    <th>Sno</th>
                    <th>Product_name</th>
                    <th>Product_rate</th>
                    <th></th>
                </tr>

                <?php
                $total = 0;
                $i = 1;
                if ($res) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        // if (isset($row['id'])) {
                        //         $id = $row['id'];
                        //     } else {
                        //         echo "ID key not found in the row.<br>";
                        //     }
                        if ($row['status'] == 1) {
                            echo "
                                <tr>
                                <td> " . $i . " </td>
                                <td> " . $row['product_name'] . " </td>
                                <td> " . $row['product_rate'] . " </td>
                                </tr>";
                            $total += $row['product_rate'];
                        }

                        $i++;
                    }
                } else {
                    echo "Error" . mysqli_error($conn);
                }
                ?>
            </table>

            <!-- <div class="row total d-inline position-relative">
                <p class="text-dark m-3 d-inline">Total:</p>
                <p class="d-inline position-absolute text-success">
                    <?php
                    echo $total;
                    ?>
                </p>
            </div> -->
            <div class="row total d-inline position-relative">
                <p class="text-dark m-3 d-inline">Total:</p>
                <p class="d-inline position-absolute text-success">
                    <?php
                    echo $total;
                    ?>
                </p>
                <form method="post" action="purchase.php">
                    <input class="btn bg-dark text-white position-absolute m-2" type="submit" name="buy" value="BUY">
                </form>
            </div>
        </div>
    </div>
</body>

</html>