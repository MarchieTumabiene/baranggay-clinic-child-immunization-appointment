<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
         
require "../../phpmailer/src/Exception.php";
require "../../phpmailer/src/PHPMailer.php";
require "../../phpmailer/src/SMTP.php";

if ($_GET['action'] == 'add-admin') {
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $barangay = $_POST['barangay'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $filename = $username . ".png";
    $tmp_name = $_FILES['logo']['tmp_name'];
    $folder = "../assets/img/". $filename;

    $stmt = $conn->prepare("INSERT INTO admin(username,email,password,barangay,logo) VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssss", $username, $email, $password, $barangay, $filename);

    $check = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $check->bind_param("s", $username);
    
    if($check->execute()){
        $result = $check->get_result();

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
        $mail->Subject = "Account In Use";
        $mail->Body = "Your account is currently used to ". $username . "\n .Discard this message if it is you. \n Thank you.";

        $mail->send();

        if($result->num_rows > 0){
            ?>
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: "Admin already exist",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                     window.location.href = "admins.php"
                })
            </script>
            <?php
        }else{
            if($stmt->execute()){
                move_uploaded_file($filename, $folder);
        
                ?>
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: "Admin added succesfully",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                         window.location.href = "admins.php"
                    })
                </script>
                <?php
        
            }
        }

    }

}