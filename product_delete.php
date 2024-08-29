<?php
include("config.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "UPDATE products SET product_status = 0 WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>
                
                window.location.href = 'products.php';
              </script>  ";
    }

    else{
        echo mysqli_error($conn);
    }
}
?>