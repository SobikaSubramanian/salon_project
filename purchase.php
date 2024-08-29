<?php
include("config.php");

$sql = "SELECT product_name, product_rate FROM products_order WHERE status = 1";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        .total {
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="row shadow m-5">
        <div class="row">
            <div class="col">
                <div class="w-25 img-container ms-3">
                    <img src="https://c8.alamy.com/comp/2G6MBM5/hairdresser-logo-beauty-salon-logo-with-man-and-woman-silhouettes-vector-illustration-2G6MBM5.jpg"
                        alt="" class="img-fluid">
                </div>
            </div>
            <div class="col">
                <h1 class="p-5 text-align-center">LUXE LOCKS</h1>
            </div>
        </div>

        <div class="row">
            <table class="m-4 justify-content-center text-align-center">
                <tr>
                    <th>Sno</th>
                    <th>Product</th>
                    <th>Rate</th>
                    <th>Quantity</th>
                </tr>

                <?php
                    $i = 0;
                    $total = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                                <td>" . ($i + 1) . "</td>
                                <td>" . $row['product_name'] . "</td>
                                <td>" . $row['product_rate'] . "</td>
                                <td> 1". "</td>
                            </tr>
                        ";
                        $total += $row['product_rate'];

                    $i++;
                    }
                ?>
            </table>

            <div class="row total d-inline position-relative">
                <p class="text-dark m-3 d-inline">Total:</p>
                <p class="d-inline position-absolute text-success">
                    <?php
                    echo $total;
                    ?>
                </p>
            </div>
        </div>
    </div>
</body>

</html>