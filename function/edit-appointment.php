<?php
if ($_GET['action'] === 'edit-appointment') {
    $p_fname = $_POST['p_fname'];
    $p_mname = $_POST['p_mname'];
    $p_lname = $_POST['p_lname'];
    $c_fname = $_POST['c_fname'];
    $c_mname = $_POST['c_mname'];
    $c_lname = $_POST['c_lname'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if (empty($p_fname)) {
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
    if (empty($date)) {
        $_SESSION['error_date'] = "Please fill date*";
    } else {
        unset($_SESSION['error_date']);
    }
    if (empty($email)) {
        $_SESSION['error_email'] = "Please fill email*";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_email'] = "Invalid email account";
    } else {
        unset($_SESSION['error_email']);
    }

    if (!empty($c_fname) && !empty($c_lname) && !empty($p_fname) && !empty($p_lname) && !empty($date) && !empty($email)) {

        try {
            // Prepare the SQL statement
            $stmt = $conn->prepare("UPDATE appointments SET
                    p_fname = ?,	
                    p_mname = ?,	
                    p_lname = ?,	
                    c_fname = ?,	
                    c_mname = ?,	
                    c_lname = ?,	
                    date = ?,
                    email = ?
                WHERE 
                    id = ?");

            // Check if the statement was prepared successfully
            if ($stmt === false) {
                throw new Exception('Statement preparation failed: ' . $conn->error);
            }

            // Bind parameters
            $stmt->bind_param('ssssssssi', $p_fname, $p_mname, $p_lname, $c_fname, $c_mname, $c_lname, $date, $email, $id);

            // Execute the statement
            if ($stmt->execute()) {
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'angelicacapstonegroup8@gmail.com';
                $mail->Password = 'jgrsaqushieixcfv';
                $mail->Port = 587;

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->setFrom('angelicacapstonegroup8@gmail.com', 'Barangay Clinic Child Immunization');

                $mail->addAddress('bawigarogine02@gmail.com');
                $mail->Subject = "Appointment Success";
                $mail->Body = "Your appointment date has been set: ";

                $mail->send();

                $success = "*Appointment added successfully";
            } else {
                throw new Exception('Statement execution failed: ' . $stmt->error);
            }

            // Close the statement
            $stmt->close();
        } catch (Exception $e) {
            $error = "Error: " . $e->getMessage();
        }

        // Close the connection
        $conn->close();
    }
}
