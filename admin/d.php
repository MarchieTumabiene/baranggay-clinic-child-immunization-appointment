<?php 
require './partials/header.php';
$brgy = "Mancilang";

$check = $conn->query("SELECT * FROM admin WHERE username = '$user'");

if ($check->num_rows > 0) {
    $get_tables = $conn->query("DELETE FROM admin WHERE user_brgy_locate = '$brgy'");
    echo "user removed";
}else{
   
}