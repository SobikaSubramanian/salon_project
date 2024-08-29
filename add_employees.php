<?php
include ("config.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
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
        echo "<script>  alert('Data inserted successfully');
            window.location.href = 'view.php' </script>";
    } else {
        echo 'failed';
    }


    $sql = "INSERT INTO employee_detail (employee_name, employee_email, gender, phone, image, status) VALUES ('$name', '$email', '$gender', '$phone', '$image_name', '$status') ";
    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
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
        </div>
        <form class="col form container" method="post" action="" enctype="multipart/form-data">

            <div class="row p-3">
                <div class="col-3">
                    <label for="name" class="form-label fs-3">Name</label>
                </div>
                <div class="col">
                    <input class="form-label" name="name" type="text" placeholder="Enter your name" required>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="mail" class="form-label fs-3">Mail</label>
                </div>
                <div class="col">
                    <input class="form-label" name="email" type="email" placeholder="Enter your mail" required>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="gender" class="form-label fs-3">Gender</label>
                </div>
                <div class="col">
                    <input type="radio" name="gender" value="0">Male
                    <input type="radio" name="gender" value="1">Female
                </div>
            </div>

            <div class="row p-3">
                <div class="col-3">
                    <label for="name" class="form-label fs-3">Phone number</label>
                </div>
                <div class="col">
                    <input type="number" name="phone" placeholder="Enter your phone number">
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