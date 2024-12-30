<?php 
    require './function/config.php';
    $isActive = isset($_SESSION['REFERENCE_ID']) ? true : false;

    // if ($isActive) {
    //     header('location: index.php');
    // }else{
    //     header('location: admin/login.php');
    // }

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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body style="background: url('./assets/img/background.JPG') no-repeat center/cover;">

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="card rounded-0 shadow bg-transparent" style="width: 500px; backdrop-filter: blur(3px);">
            <div class="card-body p-3 text-light">
                <h3 class="text-center my-5">Barangay Child Immunization Appointment System</h3>
                <form id="login-form" action="?login" method="post" onsubmit="return validateCaptcha();">
                    <label for="">Reference ID</label>
                    <input type="text" name="reference_id" class="form-control my-2" placeholder="Enter Reference ID">
                    <p><input type="checkbox" required name="terms" class="form-check-input me-2">  
                    <a class="text-light" href="terms.php" target="_blank" rel="noopener noreferrer">Terms and Condition</a></p>

                    <!-- reCAPTCHA widget -->
                    <div class="g-recaptcha" id="recaptcha" data-sitekey="6LfSEJwqAAAAAFN415xljK0VEjgqvSWZOTAcnI6p"></div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>

                    <?php if($error !== null): ?>
                        <p class="text-danger mt-2"><?= $error ?></p>
                    <?php endif; ?>
                    <?php if($success !== null): ?>
                        <p class="text-success mt-2"><?= $success ?></p>
                    <?php endif; ?>
                </form>
            </div>

            <div class="card-footer text-center">
                <a href="activate.php" class="mx-auto text-decoration-none text-dark bg-warning">Other</a>
            </div>

        </div>
    </div>

    <script>
        // Function to validate reCAPTCHA before submitting the form
        function validateCaptcha() {
            const recaptchaResponse = grecaptcha.getResponse();
            const recaptchaElement = document.getElementById('recaptcha');

            // Check if the reCAPTCHA is empty (not solved)
            if (recaptchaResponse.length == 0) {
                // If not solved, add red border to the reCAPTCHA element
                // recaptchaElement.style.border = '2px solid red';
                alert("Please complete the reCAPTCHA verification.");
                return false; // Prevent form submission
            } else {
                // If solved, remove the red border
                recaptchaElement.style.border = '';
            }
            return true; // Allow form submission if reCAPTCHA is valid
        }
    </script>
</body>
</html>
