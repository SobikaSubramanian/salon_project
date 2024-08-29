<?php
include("config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "UPDATE service SET service_status = 0 WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    echo "<script>
            window.location.href = 'service.php';
            alert('service deleted successfully');
          </script>";
}
?>