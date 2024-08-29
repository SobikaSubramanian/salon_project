<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "test";
$port = 2023;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("". $conn->connect_error);
}

?>