<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . "../../phpmailer/src/Exception.php";
require __DIR__ . "../../phpmailer/src/PHPMailer.php";
require __DIR__ . "../../phpmailer/src/SMTP.php";

if ($_GET['action'] === 'create-appointment' && isset($_POST['barangay'])) {
    $barangay = $_POST['barangay'];
    $child_no = $_POST['child_no'];
    $c_fname = $_POST['c_fname'];
    $c_mname = $_POST['c_mname'];
    $c_lname = $_POST['c_lname'];
    $gender = $_POST['gender'];
    $date_seen = $_POST['date_seen'];
    $date_birth = $_POST['date_birth'];
    $birth_weight = $_POST['birth_weight'];
    $place_delivery = $_POST['place_delivery'];
    $birth_registered = $_POST['birth_registered'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $date_appoint = date('Y-m-d h:i', strtotime($_POST['date_appoint']));

    $m_fname = $_POST['m_fname'];
    $m_mname = $_POST['m_mname'];
    $m_lname = $_POST['m_lname'];
    $m_education = $_POST['m_education'];
    $m_occupation = $_POST['m_occupation'];
    $f_fname = $_POST['f_fname'];
    $f_mname = $_POST['f_mname'];
    $f_lname = $_POST['f_lname'];
    $f_education = $_POST['f_education'];
    $f_occupation = $_POST['f_occupation'];

    if (empty($m_fname)) {
        $_SESSION['error_p_fname'] = "Please fill firstname*";
    } else {
        unset($_SESSION['error_p_fname']);
    }
    if (empty($p_lname)) {
        $_SESSION['error_p_lname'] = "Please fill lastname*";
    } else {
        unset($_SESSION['error_p_lname']);
    }
    if (empty($c_fname)) {
        $_SESSION['error_c_fname'] = "Please fill firstname*";
    } else {
        unset($_SESSION['error_c_fname']);
    }
    if (empty($c_lname)) {
        $_SESSION['error_c_lname'] = "Please fill lastname*";
    } else {
        unset($_SESSION['error_c_lname']);
    }

    if (empty($email)) {
        $_SESSION['error_email'] = "Please fill email*";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_email'] = "Invalid email account";
    } else {
        unset($_SESSION['error_email']);
    }

    if (
        !empty($c_fname)
        && !empty($barangay)
        && !empty($c_lname)
        && !empty($email)
        && !empty($date_seen)
        && !empty($date_birth)
        && !empty($birth_weight)
        && !empty($place_delivery)
        && !empty($address)
        && !empty($date_appoint)
    ) {

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO appointments(
            barangay,
            child_no,
            c_fname,	
            c_mname,	
            c_lname,	
            gender,	
            date_seen,	
            date_birth,	
            birth_weight,	
            place_delivery,	
            birth_registered,	
            address,	
            email,
            date_appoint
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");

        // Check if the statement was prepared successfully
        if ($stmt === false) {
            throw new Exception('Statement preparation failed: ' . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('ssssssssssssss', $barangay, $child_no,$c_fname, $c_mname, $c_lname, $gender, $date_seen, $date_birth, $birth_weight, $place_delivery, $birth_registered, $address, $email, $date_appoint);

        $check = $conn->query("SELECT * FROM appointments WHERE date_appoint = '$date_appoint' AND barangay = '$barangay'");

        if ($check->num_rows > 0) {
            $_SESSION['error'] = "Appointment date and time already exist";
            // header('location: create-appointment.php?message_error=Appointment date and time already exist');
            ?>
            <!-- <script>
                    Swal.fire({
                      position: 'top-end',
                      icon: 'error',
                      title: "Appointment date and time already exist",
                      showConfirmButton: false,
                      timer: 1500
                    })
            </script> -->
            <?php
        }else{
             // Execute the statement
        if ($stmt->execute()) {

            $get_latest = $conn->query("SELECT * FROM appointments ORDER BY id DESC");
            $result = $get_latest->fetch_array();
            $new_id = $result['id'];

            $query = $conn->prepare("INSERT INTO appoint_parents(appoint_id,m_fname,m_mname,m_lname,m_education,m_occupation,f_fname,f_mname,f_lname,f_education,f_occupation) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $query->bind_param("issssssssss", $new_id, $m_fname, $m_mname, $m_lname, $m_education, $m_occupation, $f_fname, $f_mname, $f_lname, $f_education, $f_occupation);

            // $immunization = $conn->prepare("INSERT INTO immunization(appoint_id) VALUES(?)");
            // $immunization->bind_param("i", $new_id);

            if ($query->execute()) {
                // $mail = new PHPMailer(true);
                // $mail->SMTPDebug = 0;
                // $mail->isSMTP();
                // $mail->Host = 'smtp.gmail.com';
                // $mail->SMTPAuth = true;
                // $mail->Username = 'angelicacapstonegroup8@gmail.com';
                // $mail->Password = 'jgrsaqushieixcfv';
                // $mail->Port = 587;

                // $mail->SMTPOptions = array(
                //     'ssl' => array(
                //         'verify_peer' => false,
                //         'verify_peer_name' => false,
                //         'allow_self_signed' => true
                //     )
                // );

                // $mail->setFrom('angelicacapstonegroup8@gmail.com', 'Barangay Clinic Child Immunization');

                // $mail->addAddress('bawigarogine02@gmail.com');
                // $mail->Subject = "Appointment Success";
                // $mail->Body = "Your appointment date has been set: ";

                // $mail->send();

                // header('location: create-appointment.php?message=Appointment added successfully');
                ?>
                <script>
                        Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: "Appointment added succesfully",
                          showConfirmButton: false,
                          timer: 1500
                        }).then(() => {
                          window.location.href = "create-appointment.php"
                        })
                </script>
                <?php
            }
        } else {
            throw new Exception('Statement execution failed: ' . $stmt->error);
        }
        }


        // Close the statement
        $stmt->close();

        // Close the connection
        $conn->close();
    }
}else{
    unset($_SESSION['error_p_fname']);
    unset($_SESSION['error_p_lname']);
    unset($_SESSION['error_c_fname']);
    unset($_SESSION['error_c_lname']);
    unset($_SESSION['error_email']);
}
