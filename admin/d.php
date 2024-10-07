<?php 
require './partials/header.php';
$user = "maalatAdmin";

$check = $conn->query("SELECT * FROM admin WHERE username = '$user'");

if ($check->num_rows > 0) {
    $get_tables = $conn->query("DELETE FROM admin WHERE username = '$user'");
    echo "user removed";
}else{
   
}