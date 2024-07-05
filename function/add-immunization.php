<?php 

    if ($_GET['action'] == 'add-immunization') {
        $id = $_POST['id'];
        $newborn_screening = $_POST['newborn_screening'];
        $BCG = $_POST['BCG'];
        $DRT = $_POST['DRT'];
        $CRV = $_POST['CRV'];
        $HEPATITIS_B = $_POST['HEPATITIS_B'];
        $MEASLES = $_POST['MEASLES'];
        $VITAMIN_A = $_POST['VITAMIN_A'];
        $VITAMIN_K = $_POST['VITAMIN_K'];
        $DEWORMING = $_POST['DEWORMING'];
        $DENTAL_CHECK_UP = $_POST['DENTAL_CHECK_UP'];

        $stmt = $conn->prepare("INSERT INTO immunization(
            appoint_id,
            newborn_screening,
            BCG,
            DRT,
            CRV,
            HEPATITIS_B,
            MEASLES,
            VITAMIN_A,
            VITAMIN_K,
            DEWORMING,
            DENTAL_CHECK_UP
        )
        VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('issssssssss', $id, $newborn_screening,
        $BCG,
        $DRT,
        $CRV,
        $HEPATITIS_B,
        $MEASLES,
        $VITAMIN_A,
        $VITAMIN_K,
        $DEWORMING,
        $DENTAL_CHECK_UP);
        if ($stmt->execute()) {

            $check_count = $conn->query("SELECT * FROM immunization WHERE appoint_id = $id");
            if ($check_count->num_rows == 6) {
                $status = 2;
                $update_status = $conn->prepare("UPDATE appointments SET status = ? WHERE id = ?");
                $update_status->bind_param('ii', $status, $id);
                if ($update_status->execute()) {
                    header("location: view-record.php?id=$id");
                }
            }else{
                header("location: view-immunization.php?id=$id");
            }

           
        }

    }