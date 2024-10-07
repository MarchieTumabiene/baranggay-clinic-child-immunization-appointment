<?php 
require './partials/header.php';
$brgy = "Mancilang";
$user = "mancilangAdmin";
$password = "$2y$10$XcuyYXhY.u5QfJE3YJm5SeZUukw3HzvoN8zI292U04lnUaCwrZlZS";
$email = "barangaymanclilang@gmail.com";

$check = $conn->query("SELECT * FROM admin WHERE username = '$user'");

if ($check->num_rows > 0) {
    echo "exist";
}else{
    $get_tables = $conn->query("INSERT INTO admin(username,email,password,user_brgy_locate) VALUES('$user', '$email', '$password', '$brgy')");
    echo "added new user";
}