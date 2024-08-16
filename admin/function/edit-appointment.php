<?php
if ($_GET['action'] === 'update-appointment') {
    $id = $_POST['id'];
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
    $contact_num = $_POST['contact_num'];

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

    if (empty($contact_num)) {
        $_SESSION['error_contact_num'] = "Please fill contact_num*";
    } else {
        unset($_SESSION['error_contact_num']);
    }

    if (
        !empty($c_fname)
        && !empty($barangay)
        && !empty($c_lname)
        && !empty($contact_num)
        && !empty($date_seen)
        && !empty($date_birth)
        && !empty($birth_weight)
        && !empty($place_delivery)
        && !empty($address)
    ) {

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE appointments SET
            barangay = ?,
            child_no = ?,
            c_fname = ?,	
            c_mname = ?,	
            c_lname = ?,	
            gender = ?,	
            date_seen = ?,	
            date_birth = ?,	
            birth_weight = ?,	
            place_delivery = ?,	
            birth_registered = ?,	
            address = ?,	
            contact_num = ?
        WHERE id = ?");

        // Check if the statement was prepared successfully
        if ($stmt === false) {
            throw new Exception('Statement preparation failed: ' . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('sssssssssssssi', $barangay, $child_no,$c_fname, $c_mname, $c_lname, $gender, $date_seen, $date_birth, $birth_weight, $place_delivery, $birth_registered, $address, $contact_num, $id);

        // Execute the statement
        if ($stmt->execute()) {

            $query = $conn->prepare("UPDATE appoint_parents SET 
            m_fname =?,
            m_mname =?,
            m_lname =?,
            m_education =?,
            m_occupation =?,
            f_fname =?,
            f_mname =?,
            f_lname =?,
            f_education =?,
            f_occupation =?
            WHERE appoint_id = ?");
            $query->bind_param("ssssssssssi",$m_fname, $m_mname, $m_lname, $m_education, $m_occupation, $f_fname, $f_mname, $f_lname, $f_education, $f_occupation, $id);

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

                // header('location: edit-appointment.php?message=Appointment updated successfully&id='. $id);
                ?>
                <script>
                        Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: "Appointment updated succesfully",
                          showConfirmButton: false,
                          timer: 1500
                        }).then(() => {
                          window.location.href = "edit-appointment.php?id=<?= $id ?>" 
                        })
                </script>
                <?php
            }
        } else {
            throw new Exception('Statement execution failed: ' . $stmt->error);
        }


        // Close the statement
        // $stmt->close();

        // Close the connection
        // $conn->close();
    }
}

