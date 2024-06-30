<?php 
    require __DIR__ . '/function/config.php';
    if (isset($_SESSION['ID']) && isset($_SESSION['USERNAME'])) {
        header('location: index.php');
    }
    $error = "";
    $success = "";

    if (isset($_GET['login'])) {
        require __DIR__ . '/function/login.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Child Immunization Appointment System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
</head>
<body>
    
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">

        <div class="card rounded-0 shadow" style="width: 500px;">
            <div class="card-body p-3">
                <h3 class="text-center my-4">Barangay Child Immunization Appointment System</h3>
                <h5 class="mb-3">Login Account</h5>
                <form action="?login" method="post">
                    <label for="">Username</label>
                    <input type="text" name="uname" class="form-control my-2" placeholder="Enter Username">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control my-2" placeholder="********">

                    <button type="submit" class="btn btn-primary w-100 my-3">Login</button>
                    <?php if($error !== null): ?>
                        <p class="text-danger"><?= $error ?></p>
                    <?php endif; ?>
                    <?php if($success !== null): ?>
                        <p class="text-success"><?= $success ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </div>

    </div>

</body>
</html>