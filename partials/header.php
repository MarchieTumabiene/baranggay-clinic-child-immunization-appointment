<?php 
  require __DIR__ . '../../function/config.php';
  if (!isset($_SESSION['ID']) && !isset($_SESSION['USERNAME'])) {
    header('location: login.php');
  }
  if (isset($_GET['action'])) {
    require __DIR__ . '../../function/create-appointment.php';
    require __DIR__ . '../../function/edit-appointment.php';
    require __DIR__ . '../../function/delete-appointment.php';
    require __DIR__ . '../../function/logout.php';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Child Immunization Appointment System</title>
  <link rel="stylesheet" href="./assets/css/dataTable.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
  <style>
    body{
      background: #fdfdfd;
    }
  </style>
</head>
<body>