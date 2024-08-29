<?php
include ("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM service WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

include ("config.php");
if (isset($_POST["update"])) {
    $service_name = $_POST['service_name'];
    $service_description = $_POST['service_description'];

    $update = "UPDATE service SET service_name = '$service_name', service_description = '$service_description' WHERE id = $id";
    mysqli_query($conn, $update);

    echo "
            <script>        
                window.location.href = 'service.php';
                alert('service updated successfully');
            </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service update</title>
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
                        class="btn bg-white text-black" type="submit" name="submit" value="Logout"></a>
            </div>
        </div>

        <form class="col form container" method="post" action="">

            <div class="row p-3">
                <div class="col-3">
                    <label for="name" class="form-label fs-3">Service Name</label>
                </div>
                <div class="col">
                    <input class="form-label" name="service_name" type="text"
                       value="<?php echo $row['service_name'] ?>">
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="rate" class="form-label fs-3">Service Description</label>
                </div>
                <div class="col">
                    <textarea name="service_description" id=""></textarea>
                </div>
            </div>

            <div class="row-5 p-3">
                <input type="submit" name="update" class="btn bg-primary" value="Update">
            </div>
        </form>
    </div>
</body>

</html>