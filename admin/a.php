<?php 
require './partials/header.php';
$brgy = "Kodia";
$user = "kodiaAdmin";
$password = "$2y$10$4mhjx3exe7wnsqJ5HXVEFOEI0qTcrEhEGutx4NX7F0B8RhmYTzeDq";
$email = "barangaykodai@gmail.com";

$get_tables = $conn->query("INSERT INTO admin(username,email,password,user_brgy_locate) VALUES('$user', '$email', '$password', '$brgy')");
$get_tables->close();