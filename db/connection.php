<?php

// Database Connection

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "xephoria";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check Connection
if(!$conn){
    die("Connection Failed : " . mysqli_connect_error());
}

// Optional:
// echo "Database Connected Successfully";

?>