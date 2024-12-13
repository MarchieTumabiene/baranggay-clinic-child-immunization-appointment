<?php
session_start();

// Set initial session variables if not already set
if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0; // Track number of failed login attempts
    $_SESSION['lockout_time'] = 0; // Track time of lockout
}

$max_attempts = 3; // Maximum login attempts
$lockout_duration = 3 * 60; // 3 minutes lockout duration in seconds

// Get form data
$uname = $_POST['uname'];
$password = $_POST['password'];

// Check if the user is locked out
if ($_SESSION['attempts'] >= $max_attempts) {
    $time_left = $_SESSION['lockout_time'] - time();

    if ($time_left > 0) {
        // User is locked out, show lockout message and do not process login
        $error = "You have exceeded the maximum attempts. Please try again in " . gmdate("i:s", $time_left);
    } else {
        // Lockout time has expired, reset attempts and lockout time
        $_SESSION['attempts'] = 0;
        $_SESSION['lockout_time'] = 0;
    }
} else {
    // Check the username and password in the database
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param('s', $uname);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();

            // Validate password
            if (password_verify($password, $row['password'])) {
                // Successful login
                $_SESSION['ID'] = $row['id'];
                $_SESSION['USERNAME'] = $row['username'];
                $_SESSION['BARANGAY'] = $row['barangay'];
                $_SESSION['LOGO'] = $row['logo'];
                unset($_SESSION['attempts']); // Reset failed attempts
                header('refresh:3;url=https://www.madridejosbarangayimmunization.com/admin/dashboard.php');
                $success = "*Account logged in successfully, redirecting in 3 seconds";
            } else {
                // Incorrect password
                $_SESSION['attempts']++;
                if ($_SESSION['attempts'] >= $max_attempts) {
                    // Lockout the user after max attempts
                    $_SESSION['lockout_time'] = time() + $lockout_duration; // Set lockout time (3 minutes)
                    $error = "You have exceeded the maximum attempts. Please try again in 3 minutes.";
                } else {
                    $error = "*Incorrect username or password. You have " . ($max_attempts - $_SESSION['attempts']) . " attempts left.";
                }
            }
        } else {
            // Account does not exist
            $error = "*Account doesn't exist";
        }
    }
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
</head>
<body  style="background: url('../assets/img/background.JPG') no-repeat center/cover; ">
    
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="card rounded-0 shadow bg-transparent" style="width: 500px; backdrop-filter: blur(3px);">
            <div class="card-body p-3 text-light">
                <h3 class="text-center my-4">Barangay Child Immunization Appointment System</h3>
                <h5 class="mb-3">Login Account</h5>
                <form action="" method="post">
                    <label for="">Username</label>
                    <input type="text" name="uname" class="form-control my-2" placeholder="Enter Username" required>
                    <label for="">Password</label>
                    <div class="position-relative">
                    <input type="password" class="form-control my-2" placeholder="********" name="password" required>
                    <i class="fa fa-eye position-absolute top-0 end-0 me-2" style="cursor: pointer; margin-top: 12px;" id="show-pass"></i>
                   </div>
                   <p><input type="checkbox" required name="terms" class="form-check-input me-2">  <a class="text-light" href="https://www.madridejosbarangayimmunization.com/assets/pdf/Terms-And-Conditions.pdf" target="_blank" rel="noopener noreferrer">Terms and Condition</a></p>
                    <button type="submit" class="btn btn-primary w-100 my-3">Login</button>

                    <a href="admin/forgot-passwor.php">Forgot Password</a>

                    <?php if (isset($error)): ?>
                        <p class="text-danger mt-2"><?= $error ?></p>
                    <?php endif; ?>

                    <?php if (isset($success)): ?>
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
                showPass.classList.replace('fa-eye', 'fa-eye-slash')
                
                passwordInp.setAttribute('type', 'text')
            } else {
                showPass.classList.replace('fa-eye-slash', 'fa-eye')
                passwordInp.setAttribute('type', 'password')
            }
        }
    </script>
</body>
</html>
