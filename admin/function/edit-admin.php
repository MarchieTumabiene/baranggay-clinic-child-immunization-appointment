<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
         
require __DIR__ . "../../phpmailer/src/Exception.php";
require __DIR__ . "../../phpmailer/src/PHPMailer.php";
require __DIR__ . "../../phpmailer/src/SMTP.php";

if ($_GET['action'] == 'update-admin') {
    $id = $_POST['id'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $barangay = $_POST['barangay'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $filename = $username . ".png";
    $tmp_name = $_FILES['logo']['tmp_name'];
    $folder = "../assets/img/". $filename;

    if ($_FILES['logo']['error'] > 0) {
       
        if (empty($password)) {
            $stmt = $conn->prepare("INSERT INTO admin(username,email,barangay) VALUES(?,?,?)");
            $stmt->bind_param("sss", $username, $email, $barangay);
        }else{
            $stmt = $conn->prepare("INSERT INTO admin(username,email,password,barangay) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $username, $email, $password, $barangay);
        }
    
    }else{
      
        
        if (empty($password)) {
            $stmt = $conn->prepare("INSERT INTO admin(username,email,barangay,logo) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $username, $email, $barangay, $filename);
        }else{
            $stmt = $conn->prepare("INSERT INTO admin(username,email,password,barangay,logo) VALUES(?,?,?,?,?)");
            $stmt->bind_param("sssss", $username, $email, $password, $barangay, $filename);
        }
    
    }



    if($stmt->execute()){
        move_uploaded_file($filename, $folder);

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

        ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "Admin updated succesfully",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                 window.location.href = "admins.php"
            })
        </script>
        <?php

    }
    $stmt->close();
}