<?php 
  require __DIR__ . '../../function/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Child Immunization Appointment System</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/dataTable.css">
  <link rel="stylesheet" href="../assets/fontawesome6/css/all.min.css"/>
  <link rel="stylesheet" href="../assets/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="../assets/js/sweet_alert.js"></script>
  
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <h1 class="navbar-brand">Barangay Immunization</h1>

            <ul class="navbar-nav gap-lg-4">
                <li class="nav-item">
                    <a href="" class="nav-link active">Home</a>
                </li>
        
                <li class="nav-item">
                    <a href="" class="nav-link">Appointments</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">Immunization</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">About</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">Contact</a>
                </li>

                <li class="nav-item">
                    <a href="../login.php" class="nav-link btn btn-light text-dark rounded-0 py-1"><i class="fa fa-sign-in"></i> Login</a>
                </li>
                
            </ul>

        </div>
    </nav>
    <script>
document.addEventListener("DOMContentLoaded", function(){
  const newUrl = '/';

// Change the URL without refreshing the page
history.pushState(null, '', newUrl);
})
</script>
</body>
</html>