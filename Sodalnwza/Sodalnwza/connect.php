<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "Kissada";
//3307

$conn = mysqli_connect($host,$user,$pass,$db);

// Create connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//Check connection
// if ($mysqli_connect_errno()) {
//     echo "Failed to Connected to Mysql:" . mysqli_connect_error();
//     exit();
// }
?>