<?php
include("config.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    // $status = $_GET['status'];
    $sql = " UPDATE employee_detail SET status = 0 WHERE id= $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo " <script> alert('Employee Deleted successfully'); 
                window.location.href = 'view.php';
                </script> ";
    }
    else{
        echo "Not updated" . mysqli_error($db);
    }
}
else{
    echo "id not found" ;
}

?>