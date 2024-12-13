<?php 
require '../partials/headers.php';
    require __DIR__ . '../../function/config.php';
    if (isset($_SESSION['ID']) && isset($_SESSION['USERNAME'])) {
        header('location: index.php');
    }
    $error = "";
    $success = "";

    if (isset($_GET['login'])) {
        require __DIR__ . '../../function/login.php';
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
    <script src="../assets/js/sweet_alert.js"></script>
</head>
<body>
    
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">

        <div class="card rounded-0 shadow" style="width: 500px;">
            <div class="card-body p-3">
                <!-- <h3 class="text-center my-4">Barangay Child Immunization Appointment System</h3> -->
                <h4 class="mb-3">Reset Password</h4>
                <form method="post">
                    <label for="">Verification</label>
                    <input type="text" name="verification" class="form-control my-2" placeholder="Enter Verification Code">

                    <label for="">New Password</label>
                    <div class="position-relative">
                        <input type="password" class="form-control my-2" placeholder="Enter new-password" name="new_pass">
                        <i class="fa fa-eye position-absolute top-0 end-0 me-2" style="cursor: pointer;margin-top: 12px;" id="show-pass1"></i>
                    </div>

                    <label for="">Confirm Password</label>
                    <div class="position-relative">
                        <input type="password" class="form-control my-2" placeholder="Re-enter new-password" name="confirm">
                        <i class="fa fa-eye position-absolute top-0 end-0 me-2" style="cursor: pointer;margin-top: 12px;" id="show-pass2"></i>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 my-2" name="submit">Submit</button>

                    <a href="login.php">Cancel</a>

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

    <script>
         let showPass1 = document.getElementById('show-pass1');
    showPass1.onclick = () => {
        let passwordInp = document.forms[0]['new_pass'];
        if (passwordInp.getAttribute('type') == 'password') {
            showPass1.classList.replace('fa-eye', 'fa-eye-slash')
            passwordInp.setAttribute('type', 'text')
        } else {
            showPass1.classList.replace('fa-eye-slash', 'fa-eye')
            passwordInp.setAttribute('type', 'password')
        }
    }

    let showPass2 = document.getElementById('show-pass2');
    showPass2.onclick = () => {
        let confirmInp = document.forms[0]['confirm'];
        if (confirmInp.getAttribute('type') == 'password') {
            showPass2.classList.replace('fa-eye', 'fa-eye-slash')
            confirmInp.setAttribute('type', 'text')
        } else {
            showPass2.classList.replace('fa-eye-slash', 'fa-eye')
            confirmInp.setAttribute('type', 'password')
        }
    }
    </script>

    <?php 
        if (isset($_POST['submit'])) {
            $verification = trim($_POST['verification']);
            $new = $_POST['new_pass'];
            $confirm = $_POST['confirm'];

            $q = $conn->query("SELECT * FROM admin WHERE verification = '$verification' LIMIT 1 ");
            $count = $q->num_rows;

            if($count > 0){

                if (strlen($new) < 8) {
                    $error = 'Password must be equal or greater than 8 characters';
                }else if ($new !== $confirm) {
                    $error = 'Password don\'t match';
                }else{
                    $hashed = password_hash($new, PASSWORD_DEFAULT);
                    $update = $conn->query("UPDATE admin SET password = '$hashed' WHERE verification = '$verification'");
                    if ($update) {
                        // $message = "Password changer successfully, Redirecting in 3seconds...";
                        ?>
                        <script>
                                Swal.fire({
                                  position: 'top-end',
                                  icon: 'success',
                                  title: "Password changed successfully",
                                  showConfirmButton: false,
                                  timer: 1500
                                }).then(() => {
                                  window.location.href = "login.php"
                                })
                              </script>
                        <?php
                    }
                }

            }else{
                ?>
                <script>
                        Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          title: "Incorrect verification code",
                          showConfirmButton: false,
                          timer: 1500
                        }).then(() => {
                          window.location.href = "reset-password.php"
                        })
                      </script>
                <?php
            }


           
        }
    ?>
</body>
</html>
