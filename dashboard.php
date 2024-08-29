<?php
include ("config.php");
session_start();

$sql = "SELECT id FROM employee_detail";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$product = "SELECT id FROM products";
$p_result = mysqli_query($conn, $product);
$p_row = mysqli_fetch_assoc($p_result);

$service = "SELECT id FROM service";
$s_result = mysqli_query($conn, $service);
$s_row = mysqli_fetch_assoc($s_result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        .bg-primary{
            font-size: 15px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-3 bg-dark min-vh-100">
                <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                        href="view.php">View
                        employee</a></div>
                <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                        href="products.php">Products</a></div>
                <div class="col h3 text-light text-center mt-5"><a class="text-white text-decoration-none"
                        href="service.php">Service</a>
                </div>
                <div class="position-absolute bottom-0 start-0 m-3"><a href="logout.php"><input class="btn bg-white text-black" type="submit" name="submit" value="Logout"></a></div>
            </div>

            <div class="col m-3 position-relative">
                <div class="col h1">Welcome, <?php echo $_SESSION['username']; ?></div>

                <div class="row w-100 min-vh-10">
                    <div class="col-3 bg-primary m-5 fw-bold h6 p-4">Total employee 
                        <span class="bg-light ms-5 rounded p-3"><?php echo $row['id'];?></span>
                    </div>
                    <div class="col-3 bg-primary m-5 fw-bold h6 p-4">Total products
                    <span class="bg-light ms-5 rounded p-3"><?php echo $p_row['id'];?></span>
                    </div>
                    <div class="col-3 bg-primary m-5 fw-bold h6 p-4">Total service
                    <span class="bg-light ms-5 rounded p-3"><?php echo $s_row['id'];?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>