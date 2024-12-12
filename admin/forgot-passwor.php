<?php 

    require __DIR__ . '../../function/config.php';
    require '../partials/headers.php';
    if (isset($_SESSION['ID']) && isset($_SESSION['USERNAME'])) {
        header('location: index.php');
    }
    $error = "";
    $success = "";

    if (isset($_GET['login'])) {
        require __DIR__ . '../../function/forgot-passwor.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Child Immunization Appointment System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="../assets/js/sweet_alert.js"></script>
</head>
<body>
    
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">

        <div class="card rounded-0 shadow" style="width: 500px;">
            <div class="card-body p-3">
                <!-- <h3 class="text-center my-4">Barangay Child Immunization Appointment System</h3> -->
                <h4 class="mb-3">Forgot Password</h4>
                <form method="post">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control my-2" placeholder="Enter Email">

                    <button type="submit" name="submit" class="btn btn-primary w-100 my-2">Submit</button>

                    <a href="index.php">Cancel</a>

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

    <?php 
         use PHPMailer\PHPMailer\PHPMailer;
         use PHPMailer\PHPMailer\Exception;
         use PHPMailer\PHPMailer\SMTP;
         
         require "../phpmailer/src/Exception.php";
         require "../phpmailer/src/PHPMailer.php";
         require "../phpmailer/src/SMTP.php";
           if (isset($_POST['submit'])) {
               $email = trim($_POST['email']);
                $verification = uniqid();
             
             $q = $conn->query("SELECT * FROM admin WHERE email = '$email' LIMIT 1 ");
             $count = $q->num_rows;

             if($count > 0){
               $update = $conn->query("UPDATE admin SET verification = '$verification' WHERE email = '$email'");
               if ($update) {
                 $mail = new PHPMailer(true);
                 $mail->SMTPDebug = 0;
                 $mail->isSMTP();
                 $mail->Host = 'smtp.gmail.com';
                 $mail->SMTPAuth = true;
                 $mail->Username = 'tumabienemarchie034@gmail.com';
                 $mail->Password = 'mknsrhxregcdrqhj';
                 $mail->Port = 587;

                 $mail->SMTPOptions = array(
                     'ssl' => array(
                         'verify_peer' => false,
                         'verify_peer_name' => false,
                         'allow_self_signed' => true
                     )
                 );

                 $mail->setFrom('barangayimmunization@gmail.com', 'Barangay Immunization');

                 $mail->addAddress($email);
                 $mail->Subject = "Reset Password Verification Code";
                 $mail->Body = "This is your verification code: " . $verification;

                 $mail->send();

                 ?>
                 <script>
                         Swal.fire({
                           position: 'top-end',
                           icon: 'success',
                           title: "Reset verification code sent successfully",
                           showConfirmButton: false,
                           timer: 1500
                         }).then(() => {
                           window.location.href = "reset-passwor.php"
                         })
                       </script>
                 <?php
               }
             }else{
                //  $error = 'incorrect login details';
                 ?>
                 <script>
                         Swal.fire({
                           position: 'top-end',
                           icon: 'error',
                           title: "Incorrect credentials",
                           showConfirmButton: false,
                           timer: 1500
                         }).then(() => {
                           window.location.href = "forgot-passwor.php"
                         })
                       </script>
                 <?php
             }

           }
    ?>

</body>
</html>