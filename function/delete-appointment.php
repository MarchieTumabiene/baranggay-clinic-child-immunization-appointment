<?php 
    if ($_GET['action'] == 'delete-appointment') {
        $id = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM appointments WHERE id = ?");
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            header('location: appointments.php');
        }

    }