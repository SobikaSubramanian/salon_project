<?php
include ("config.php");

$sql = "SELECT * FROM service";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="row">
        <div class="col-3 bg-dark min-vh-100 overflow-hidden">
            <a class="text-decoration-none text-white position-absolute top-0 end-0 m-2" href="add_service.php"><input
                    class="btn bg-dark text-white" type="submit" value="Add_service"></a>

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

        <div class="col">

            <table class="m-5 p-3 mt-5 table table-striped table-hover">
                <tr>
                    <th>Id</th>
                    <th>Service_name</th>
                    <th>service_description</th>
                    <th>Action</th>
                    <th>Service_status</th>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $status = $row['service_status'] == 1 ? 'Active' : 'Inactive';

                    echo
                        "<tr>
                        <td>" . ($i + 1) . "</td>
                        <td>" . $row['service_name'] . "</td>
                        <td>" . $row['service_description'] . "</td>
                        <td> <a href = 'service_update.php ? id=" . $id . " '> Edit / </a> 
                                     <a href = 'service_delete.php ? id=" . $id . " '> Delete </a>
                                </td>
                        <td>" . $status . "</td>
                    </tr>";

                    $i++;

                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>