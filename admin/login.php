<?php 
    require __DIR__ . '../../function/config.php';
    if (isset($_SESSION['ID']) && isset($_SESSION['USERNAME'])) {
        header('location: index.php');
    }
    $error = "";
    $success = "";

    if (isset($_GET['login'])) {
        require __DIR__ . '/function/login.php';
    }

    // echo password_hash("kodiaAdmin@123", PASSWORD_DEFAULT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Child Immunization Appointment System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/fontawesome6/css/all.min.css"/>
</head>
<body  style="background: url('../assets/img/background.JPG') no-repeat center/cover; ">
    
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">

        <div class="card rounded-0 shadow bg-transparent" style="width: 500px; backdrop-filter: blur(3px);">
            <div class="card-body p-3 text-light">
                <h3 class="text-center my-4">Barangay Child Immunization Appointment System</h3>
                <h5 class="mb-3">Login Account</h5>
                <form action="?login" method="post">
                    <label for="">Username</label>
                    <input type="text" name="uname" class="form-control my-2" placeholder="Enter Username">
                    <label for="">Password</label>
                    <div class="position-relative">
                    <input type="password" class="form-control my-2" placeholder="********" name="password" required>
                    <i class="fa fa-eye position-absolute top-0 end-0 me-2" style="cursor: pointer; margin-top: 12px;" id="show-pass"></i>
                   </div>

                    <button type="submit" class="btn btn-primary w-100 my-3">Login</button>

                    <a href="forgot-password.php">Forgot Password</a>

                    <?php if($error !== null): ?>
                        <p class="text-danger mt-2"><?= $error ?></p>
                    <?php endif; ?>
                    <?php if($success !== null): ?>
                        <p class="text-success mt-2"><?= $success ?></p>
                    <?php endif; ?>
                </form>
            </div>

            
            <div class="card-footer text-center">
            <a href="admin/activate-user.php" class="mx-auto text-decoration-none">Cancel</a>
            </div>
        </div>

    </div>

    <script>
        let showPass = document.getElementById('show-pass');
        showPass.onclick = () => {
            let passwordInp = document.forms[0]['password'];
            if (passwordInp.getAttribute('type') == 'password') {
                showPass.classList.replace('fa-eye', 'fa-eye-slash')
                
                passwordInp.setAttribute('type', 'text')
            }else{
                showPass.classList.replace('fa-eye-slash', 'fa-eye')
                passwordInp.setAttribute('type', 'password')
            }
        }
    </script>

</body>
</html>