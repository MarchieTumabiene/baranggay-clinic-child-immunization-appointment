<?php
if ($_GET['action'] == 'update-immunization') {
    $req_status = $_GET['status'];
    $id = $_GET['update'];
    $stat = $_GET['stat'];
    $appoint_id = $_GET['appoint'];

    if ($req_status == "finished") {
        $status = 2;
    
        $stmt = $conn->query("UPDATE immunization SET $stat = '$status' WHERE id = '$id'");
    
        if ($stmt) {
    
    
            $check = $conn->query("SELECT * FROM immunization WHERE appoint_id = '$appoint_id' ORDER BY id DESC");
            $fetch = $check->fetch_assoc();
    
           if ($fetch['appoint_id'] == $appoint_id) {
            if ($stat == 'stat_5') {
                $update = $conn->query("UPDATE appointments SET status = 2 WHERE id = '$appoint_id'");
               }
           }
    
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
    }else if ($req_status == "stagnant") {
            $status = 3;
        
            $stmt = $conn->query("UPDATE immunization SET $stat = '$status' WHERE id = '$id'");
        
            if ($stmt) {
        
        
                $check = $conn->query("SELECT * FROM immunization WHERE appoint_id = '$appoint_id' ORDER BY id DESC");
                $fetch = $check->fetch_assoc();
        
               if ($fetch['appoint_id'] == $appoint_id) {
                if ($stat == 'stat_5') {
                    $update = $conn->query("UPDATE appointments SET status = 2 WHERE id = '$appoint_id'");
                   }
               }
        
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
    }else if ($req_status == "overweight") {
            $status = 4;
        
            $stmt = $conn->query("UPDATE immunization SET $stat = '$status' WHERE id = '$id'");
        
            if ($stmt) {
        
        
                $check = $conn->query("SELECT * FROM immunization WHERE appoint_id = '$appoint_id' ORDER BY id DESC");
                $fetch = $check->fetch_assoc();
        
               if ($fetch['appoint_id'] == $appoint_id) {
                if ($stat == 'stat_5') {
                    $update = $conn->query("UPDATE appointments SET status = 2 WHERE id = '$appoint_id'");
                   }
               }
        
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
    }else if ($req_status == "underweight") {
        $status = 5;
    
        $stmt = $conn->query("UPDATE immunization SET $stat = '$status' WHERE id = '$id'");
    
        if ($stmt) {
    
    
            $check = $conn->query("SELECT * FROM immunization WHERE appoint_id = '$appoint_id' ORDER BY id DESC");
            $fetch = $check->fetch_assoc();
    
           if ($fetch['appoint_id'] == $appoint_id) {
            if ($stat == 'stat_5') {
                $update = $conn->query("UPDATE appointments SET status = 2 WHERE id = '$appoint_id'");
               }
           }
    
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

}
