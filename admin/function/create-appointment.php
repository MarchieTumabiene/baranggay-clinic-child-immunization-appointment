<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . "../../../phpmailer/src/Exception.php";
require __DIR__ . "../../../phpmailer/src/PHPMailer.php";
require __DIR__ . "../../../phpmailer/src/SMTP.php";

if ($_GET['action'] === 'create-appointment' && isset($_POST['barangay'])) {
    $reference_id = uniqid();
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
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $recommendation = $_POST['recommendation'];
    $nurse = $_POST['nurse'];
    $bhw = $_POST['bhw'];
    $address = $_POST['address'];
    $contact_num = $_POST['contact_num'];
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

    $newborn = date('Y-m-d', strtotime($date_birth . '+1 day'));
    $bcg = date('Y-m-d', strtotime($date_birth . '+2 days'));
    $drt1 = date("Y-m-d", strtotime($date_birth . " +6 weeks"));
    $drt2 = date("Y-m-d", strtotime($date_birth . " +10 weeks"));
    $drt3 = date("Y-m-d", strtotime($date_birth . " +14 weeks"));
    $vita1 = date("Y-m-d", strtotime($date_birth . " +6 months"));
    $vita2 = date("Y-m-d", strtotime($vita1 . " +6 months"));
    $measles = date("Y-m-d", strtotime($date_birth . " +9 months"));
    $deworm = date("Y-m-d", strtotime($date_birth . " +1 year"));
    // $crv1 = date("Y-m-d", strtotime($date_birth . " +6 week"));

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

    if (empty($weight)) {
        $_SESSION['error_weight'] = "Please fill weight*";
    } else {
        unset($_SESSION['error_weight']);
    }

    if (empty($height)) {
        $_SESSION['error_height'] = "Please fill height*";
    } else {
        unset($_SESSION['error_height']);
    }

    if (empty($nurse)) {
        $_SESSION['error_nurse'] = "Please fill nurse*";
    } else {
        unset($_SESSION['error_nurse']);
    }

    if (empty($bhw)) {
        $_SESSION['error_bhw'] = "Please fill bhw*";
    } else {
        unset($_SESSION['error_bhw']);
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
        && !empty($date_appoint)
    ) {

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO appointments(
            reference_id,
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
            contact_num,
            date_appoint,
            weight,
            height,
            recommendation,
            nurse,
            bhw
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?)");

        // Check if the statement was prepared successfully
        if ($stmt === false) {
            throw new Exception('Statement preparation failed: ' . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('sssssssssssssssddsss', $reference_id,$barangay, $child_no, $c_fname, $c_mname, $c_lname, $gender, $date_seen, $date_birth, $birth_weight, $place_delivery, $birth_registered, $address, $contact_num, $date_appoint, $weight, $height, $recommendation, $nurse, $bhw);

        $check = $conn->query("SELECT * FROM appointments WHERE date_appoint = '$date_appoint' AND barangay = '$barangay'");

        if ($check->num_rows > 0) {
            $_SESSION['error'] = "Appointment date and time already exist";

            // $stmt = $conn->prepare("INSERT INTO immunization(
            //     appoint_id,
            //     newborn_screening,
            //     BCG,
            //     DRT,
            //     CRV,
            //     HEPATITIS_B,
            //     MEASLES,
            //     VITAMIN_A,
            //     VITAMIN_K,
            //     DEWORMING,
            //     DENTAL_CHECK_UP
            // )
            // VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            // $stmt->bind_param(
            //     'issssssssss',
            //     $id,
            //     $newborn_screening,
            //     $BCG,
            //     $DRT,
            //     $CRV,
            //     $HEPATITIS_B,
            //     $MEASLES,
            //     $VITAMIN_A,
            //     $VITAMIN_K,
            //     $DEWORMING,
            //     $DENTAL_CHECK_UP
            // );
        } else {
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

                    $get_new = $conn->query("SELECT * FROM appointments ORDER BY id DESC");
                    $fetch_new = $get_new->fetch_assoc();
                    $id = $fetch_new['id'];

                    $appoint_dates = array();
                    $base_date = date('Y-m-d', strtotime($date_appoint));
                    $max = 6;

                    for ($i = 0; $i < $max; $i++) {
                        $appoint_dates[$i] = date("Y-m-d", strtotime($base_date . " +$i month"));
                        $one = date("Y-m-d", strtotime($base_date . " +". $i ." month"));
                        $two = date("Y-m-d", strtotime($base_date . " +". $i + 1 ." day"));
                       
                        $four = date("Y-m-d", strtotime($base_date . " +". $i + 4 ." month"));
                        $five = date("Y-m-d", strtotime($base_date . " +". $i + 5 ." month"));
                        $six = date("Y-m-d", strtotime($base_date . " +". $i + 6 ." month"));
                        $seven = date("Y-m-d", strtotime($base_date . " +". $i + 7 + 6 ." month"));
                        $eight = date("Y-m-d", strtotime($base_date . " +". $i + 8 ." month"));
                        $nine = date("Y-m-d", strtotime($base_date . " +". $i ." year"));
                        $ten = date("Y-m-d", strtotime($base_date . " +". $i ." year"));
                        // $drt2 = date("Y-m-d", strtotime($base_date . " +". $i + 11 ." month"));
                        $twelve = date("Y-m-d", strtotime($base_date . " +". $i + 12 ." month"));
                        $thirteen = date("Y-m-d", strtotime($base_date . " +". $i + 13 ." month"));
                        $fourtheen = date("Y-m-d", strtotime($base_date . " +". $i + 14 + 6 ." month"));
                        $fiftheen = date("Y-m-d", strtotime($base_date . " +". $i + 15 ." month"));
                        $sixtheen = date("Y-m-d", strtotime($base_date . " +". $i + 16 ." month"));
                        $seventheen = date("Y-m-d", strtotime($base_date . " +". $i + 17 ." month"));
                        $eighteen = date("Y-m-d", strtotime($base_date . " +". $i + 18 ." month"));
                        $nineteen = date("Y-m-d", strtotime($base_date . " +". $i + 19 ." month"));
                        // echo $appoint_dates[$i] . "\n";

                        if ($i == 0) {
                            $insert_imm = $conn->prepare("INSERT INTO immunization(
                                appoint_id,
                                newborn_screening, 
                                BCG, 
                                DRT, 
                                CRV,
                                HEPATITIS_B,
                                MEASLES,
                                VITAMIN_A,
                                DEWORMING,
                                DENTAL_CHECK_UP
                            )
                            VALUES(?,?,?,?,?,?,?,?,?,?)");
                            $insert_imm->bind_param(
                                'isssssssss',
                                $id,
                                $newborn,
                                $bcg,
                                $drt1,
                                $drt1,
                                $drt1,
                                $measles,
                                $vita1,
                                $deworm,
                                $ten
                            );
                            $insert_imm->execute();
                        } else if ($i == 1) {
                            $insert_imm = $conn->prepare("INSERT INTO immunization(
                                appoint_id,
                                DRT, 
                                CRV,
                                HEPATITIS_B,
                                VITAMIN_A,
                                DEWORMING
                            )
                            VALUES(?,?,?,?,?,?)");
                            $insert_imm->bind_param(
                                'isssss',
                                $id,
                                $drt2,
                                $drt2,
                                $drt2,
                                $vita2,
                                $fiftheen
                            );
                            $insert_imm->execute();
                        } else if ($i == 2) {
                            $insert_imm = $conn->prepare("INSERT INTO immunization(
                                appoint_id,
                                DRT, 
                                CRV,
                                HEPATITIS_B,
                                DEWORMING
                            )
                            VALUES(?,?,?,?,?)");
                            $insert_imm->bind_param(
                                'issss',
                                $id,
                                $drt3,
                                $drt3,
                                $drt3,
                                $nineteen
                            );
                            $insert_imm->execute();
                        }
                    }



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
        // $stmt->close();

        // Close the connection
        // $conn->close();
    }
} else {
    unset($_SESSION['error_p_fname']);
    unset($_SESSION['error_p_lname']);
    unset($_SESSION['error_c_fname']);
    unset($_SESSION['error_c_lname']);
    unset($_SESSION['error_contact_num']);
}
