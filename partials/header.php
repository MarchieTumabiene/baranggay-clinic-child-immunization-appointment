<?php 
  require __DIR__ . '../../function/config.php';

  $isActive = isset($_SESSION['REFERENCE_ID']) ? true : false;

  $get_settings = $conn->query("SELECT * FROM settings");
  $settings = $get_settings->fetch_assoc();

  if (!$isActive) {
    header('location: login.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Child Immunization Appointment System</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="./assets/css/dataTable.css">
  <link rel="stylesheet" href="./assets/fontawesome6/css/all.min.css"/>
  <link rel="stylesheet" href="./assets/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="./assets/js/sweet_alert.js"></script>
  
  <style>
    *{
      font-family: Arial, Helvetica, sans-serif;
    }
    body{
      background: hsl(0, 0%, 90%) !important;
    }
    @media print{
      .dont-print{
        display: none !important;
      }
      .card{
        box-shadow: none !important;
        border: none !important;
      }

    }
  </style>
</head>
<body>

<?php 
    if (isset($_GET['action'])) {
      // require __DIR__ . '../../function/create-appointment.php';
      // require __DIR__ . '../../function/edit-appointment.php';
      // require __DIR__ . '../../function/delete-appointment.php';
      // require __DIR__ . '../../function/add-immunization.php';
      // require __DIR__ . '../../function/update-immunization.php';
      // require __DIR__ . '../../function/logout.php';
    }
?>