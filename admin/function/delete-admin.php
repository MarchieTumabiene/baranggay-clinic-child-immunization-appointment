<?php 

if ($_GET['action'] == 'add-admin') {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM admin WHERE id = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()){

        ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "Admin deleted succesfully",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                 window.location.href = "admins.php"
            })
        </script>
        <?php

    }


}