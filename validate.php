<?php
session_start();
include ("config.php");

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin_login";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_array($result)) {
        if ($row['admin_name'] == $name && $row['admin_password'] == $password) {
            $_SESSION['username'] = $name;
            echo "<script>
                window.location.href='dashboard.php';   
            </script>";
        }

        else {
            // echo "<script>
            //     alert('Please enter valid username and paasword');
            //     window.location.href='index.php';  
            // </script>";
             echo "Error";
        }
    }
} else {
    echo "Error", $conn->connect_error;
}

?>