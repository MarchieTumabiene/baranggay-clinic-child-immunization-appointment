<?php 
  require __DIR__ . '../../function/config.php';
  if (!isset($_SESSION['ID']) && !isset($_SESSION['USERNAME'])) {
    header('location: login.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Child Immunization Appointment System</title>
  <link rel="stylesheet" href="./assets/css/dataTable.css">
  <link rel="stylesheet" href="./assets/fontawesome6/css/all.min.css"/>
  <link rel="stylesheet" href="./assets/css/bootstrap.css" />
  <script src="./assets/js/sweet_alert.js"></script>
  <style>
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
      require __DIR__ . '../../function/create-appointment.php';
      require __DIR__ . '../../function/edit-appointment.php';
      require __DIR__ . '../../function/delete-appointment.php';
      require __DIR__ . '../../function/add-immunization.php';
      require __DIR__ . '../../function/logout.php';
    }
?>