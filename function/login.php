<?php

    $reference_id = $_POST['reference_id'];

    $stmt = $conn->prepare("SELECT * FROM appointments WHERE reference_id = ?");
    $stmt->bind_param('s', $reference_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            
            $row = $result->fetch_array();
            $success = "*Account logged in successfully, redirecting in 3 seconds";
            $_SESSION['ID'] = $row['id'];
            $_SESSION['REFERENCE_ID'] = $row['reference_id'];
            header('refresh:3;url=dashboard.php');


        }else{
            $error = "*Incorrect reference id";
        }
    }
