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

    // echo password_hash("tugasAdmin@123", PASSWORD_DEFAULT);
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
                   <p><input type="checkbox" required name="terms" class="form-check-input me-2">  <a class="text-light" href="#" data-bs-toggle="modal" data-bs-target="#modal" rel="noopener noreferrer">Terms and Condition</a></p>
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

    <div class="modal modal-fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>By accessing and using this Child Immunization Appointment System (the "System"), you agree to the following terms and conditions. If you do not agree, please refrain from logging in or using the System. This System is designed to facilitate the scheduling and management of child immunization appointments. It is intended for use by parents, guardians, and authorized healthcare professionals. Users must provide accurate, current, and complete information during registration and appointment scheduling.</p>

                <p>Users are responsible for ensuring timely attendance at scheduled appointments. It is the user's responsibility to update any changes to personal or contact information to ensure proper communication. Personal information, including your child’s health and immunization data, will be collected and stored securely in compliance with applicable privacy laws. Information will only be used for managing appointments and related immunization services.</p>

                <p>Users must keep their login credentials confidential and notify the system administrator immediately of any unauthorized access or suspected security breach. Sharing login credentials with others is prohibited.</p>

                <h5>Prohibited Activities</h5>
                <ul>
                    <li>Entering false information or impersonating another individual.</li>
                    <li>Attempting to gain unauthorized access to the System.</li>
                    <li>Disrupting the operation of the System through malicious actions such as hacking or introducing harmful software.</li>
                </ul>

                <p>The System is provided on an "as-is" basis. While we strive for accuracy, we do not guarantee error-free operation or uninterrupted access. Immunization information provided within the System is not a substitute for professional medical advice. Always consult a healthcare provider for medical concerns. Missed appointments must be rescheduled by the user through the System. Late arrivals may result in appointment cancellation or rescheduling based on availability.</p>

                <p>We reserve the right to terminate or suspend access to the System without notice if these terms are violated or for security reasons. We may update these terms periodically. Users will be notified of significant changes, and continued use of the System indicates acceptance of the updated terms.</p>

                <p>By logging in, you acknowledge that you have read, understood, and agree to abide by these terms and conditions.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">I Agree</button>
            </div>
        </div>
    </div>
</div>


    <script src="./assets/js/bootstrap.js"></script>
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
