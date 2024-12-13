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
