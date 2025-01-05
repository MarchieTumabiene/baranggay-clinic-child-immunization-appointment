<?php 

    if ($_GET['action'] === 'logout') {
        session_destroy();
        $status = 1;
        $updateStatus = $conn->prepare("UPDATE admin SET status = ? WHERE id = ?");
        $updateStatus->bind_param("ii", $status, $_SESSION['ID']);
        if($updateStatus->execute()){
            header('location: https://www.madridejosbarangayimmunization.com/');
        }
    }