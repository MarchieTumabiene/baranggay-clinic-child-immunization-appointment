<?php 
    if ($_GET['action'] == 'delete-appointment') {
        $id = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM appointments WHERE id = ?");
        $stmt->bind_param('i', $id);

        $query = $conn->prepare("DELETE FROM appoint_parents WHERE appoint_id = ?");
        $query->bind_param('i', $id);
        if ($stmt->execute() && $query->execute()) {
            // header('location: appointments.php');
            ?>
            <script>
                    Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: "Appointment deleted succesfully",
                      showConfirmButton: false,
                      timer: 1500
                    }).then(() => {
                      window.location.href = "appointments.php"
                    })
            </script>
            <?php
        }

    }