<?php
include("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employee_detail WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}



include("config.php");
if(isset($_POST["update"])){
    // $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    $update = "UPDATE employee_detail SET employee_name = '$name', employee_email = '$email', gender = '$gender', phone = '$phone' WHERE id = $id";
    mysqli_query($conn, $update);

    echo " <script>
        alert('success');
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update employee</title>
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
            <div class="position-absolute bottom-0 start-0 m-3"><a href="logout.php"><input
                        class="btn bg-white text-black" type="submit" name="submit" value="Logout"></a>
            </div>
        </div>

        <form class="col form container" method="post" action="" enctype="multipart/form-data">
            <!-- <input type="hidden" name="id" value="<?php echo $row['id'] ?>"> -->
            <div class="row p-3">
                <div class="col-3">
                    <label for="name" class="form-label fs-3">Name</label>
                </div>
                <div class="col">
                    <input class="form-label" name="name" type="text" value="<?php echo $row['employee_name'] ?>">
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="mail" class="form-label fs-3">Mail</label>
                </div>
                <div class="col">
                    <input class="form-label" name="email" type="email" placeholder="Enter your mail" required value="<?php echo $row['employee_email']?>">
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="gender" class="form-label fs-3">Gender</label>
                </div>
                <div class="col">
                    <input type="radio" name="gender" value="0" <?php if($row['gender'] === '0') echo 'checked' ?>>Male
                    <input type="radio" name="gender" value="1" <?php if($row['gender'] === '1') echo 'checked' ?>>Female
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="name" class="form-label fs-3">Phone number</label>
                </div>
                <div class="col">
                    <input type="number" name="phone" placeholder="Enter your phone number" value="<?php echo $row['phone'] ?>">
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="img" class="form-label fs-3">Image</label>
                </div>
                <div class="col">
                    <img src="images/<?php echo $row['image'] ?>" width="200px" height="200px" alt="">
                </div>
            </div>

            <div class="row-5 p-3">
                <input type="submit" name="update" class="btn bg-primary" value="Update">
            </div>
        </form>
    </div>
</body>

</html>