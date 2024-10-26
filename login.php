<?php 
    require './function/config.php';

echo "hello world";
    $isActive = isset($_SESSION['REFERENCE_ID']) ? true : false;

    if ($isActive) {
        header('location: index.php');
    }else{
        header('location: admin/login.php');
    }

    $error = "";
    $success = "";

    if (isset($_GET['login'])) {
        require './function/login.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Child Immunization Appointment System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/fontawesome6/css/all.min.css"/>
</head>
<body>
    
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">

        <div class="card rounded-0 shadow" style="width: 500px;">
            <div class="card-body p-3">
                <h3 class="text-center my-5">Barangay Child Immunization Appointment System</h3>
                <form action="?login" method="post">
                    <label for="">Reference ID</label>
                    <input type="text" name="reference_id" class="form-control my-2" placeholder="Enter Username">
                    <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
                    <?php if($error !== null): ?>
                        <p class="text-danger mt-2"><?= $error ?></p>
                    <?php endif; ?>
                    <?php if($success !== null): ?>
                        <p class="text-success mt-2"><?= $success ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
