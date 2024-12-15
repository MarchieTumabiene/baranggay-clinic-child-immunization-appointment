<?php 
    require __DIR__ . '../../function/config.php';

    if (isset($_SESSION['ID']) && isset($_SESSION['USERNAME'])) {
        header('location: https://www.madridejosbarangayimmunization.com/admin/dashboard.php');
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
    <link rel="stylesheet" href="../assets/fontawesome6/css/all.min.css"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body style="background: url('../assets/img/background.JPG') no-repeat center/cover;">

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="card my-3 rounded-0 shadow bg-transparent" style="width: 500px; backdrop-filter: blur(3px);">
            <div class="card-body p-3 text-light">
                <h3 class="text-center my-4">Barangay Child Immunization Appointment System</h3>
                <h5 class="mb-3">Login Account</h5>
                <form id="login-form" action="?login" method="post" onsubmit="return validateCaptcha();">
                    <label for="">Username</label>
                    <input type="text" name="uname" class="form-control my-2" placeholder="Enter Username">
                    
                    <label for="">Password</label>
                    <div class="position-relative">
                        <input type="password" class="form-control my-2" placeholder="********" name="password" required>
                        <i class="fa fa-eye position-absolute top-0 end-0 me-2" style="cursor: pointer; margin-top: 12px;" id="show-pass"></i>
                    </div>

                    <p><input type="checkbox" required name="terms" class="form-check-input me-2">  
                    <a class="text-light" href="terms.php" target="_blank" rel="noopener noreferrer">Terms and Condition</a></p>

                    <!-- reCAPTCHA widget -->
                    <div class="g-recaptcha" data-sitekey="6LfSEJwqAAAAAFN415xljK0VEjgqvSWZOTAcnI6p"></div>

                    <button type="submit" class="btn btn-primary w-100 my-3">Login</button>

                    <a href="admin/forgot-passwor.php">Forgot Password</a>
                    
                    <div id="error-message" class="text-danger mt-2" style="display:none;">You have exceeded the maximum attempts. Please try again in <span id="lockout-timer">3:00</span>.</div>

                    <?php if($error !== null): ?>
                        <p class="text-danger mt-2"><?= $error ?></p>
                    <?php endif; ?>
                    <?php if($success !== null): ?>
                        <p class="text-success mt-2"><?= $success ?></p>
                    <?php endif; ?>
                </form>
            </div>

            <div class="card-footer text-center">
                <a href="https://www.madridejosbarangayimmunization.com/admin/activate.php" class="mx-auto text-decoration-none">Cancel</a>
            </div>
        </div>
    </div>

    <script>
        let showPass = document.getElementById('show-pass');
        showPass.onclick = () => {
            let passwordInp = document.forms[0]['password'];
            if (passwordInp.getAttribute('type') == 'password') {
                showPass.classList.replace('fa-eye', 'fa-eye-slash');
                passwordInp.setAttribute('type', 'text');
            } else {
                showPass.classList.replace('fa-eye-slash', 'fa-eye');
                passwordInp.setAttribute('type', 'password');
            }
        }

        // Function to validate reCAPTCHA before submitting the form
        function validateCaptcha() {
            const recaptchaResponse = grecaptcha.getResponse();
            if (recaptchaResponse.length == 0) {
                alert("Please complete the reCAPTCHA verification.");
                return false;
            }
            return true; // Allow form submission if reCAPTCHA is valid
        }
    </script>
</body>
</html>
