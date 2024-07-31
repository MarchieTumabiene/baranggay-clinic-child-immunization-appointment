<?php
if ($_GET['action'] == 'update-immunization') {
    $id = $_GET['update'];
    $stat = $_GET['stat'];
    $appoint_id = $_GET['appoint'];
    $status = 2;

    $stmt = $conn->query("UPDATE immunization SET $stat = '$status' WHERE id = '$id'");

    if ($stmt) {

        $update = $conn->query("UPDATE appointments SET status = 2 WHERE id = '$appoint_id'");

    ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "Status updated successfully",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = "view-immunization.php?id=<?= $appoint_id ?>"
            })
        </script>
    <?php
    }
}
