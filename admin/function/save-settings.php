<?php 

if (isset($_POST['save'])) {
    $bhw = $_POST['bhw'];
    $nurse = $_POST['nurse'];
    $nurse_signature = date('mdGis') .'.png';
    

    $check = $conn->query("SELECT * FROM settings");

    if ($check->num_rows > 0) {
        $id = 1;

        if ($_FILES['nurse_signature']['error'] > 0) {
            $insert = $conn->prepare("UPDATE settings SET bhw = ?, nurse = ? WHERE id = ?");
            $insert->bind_param('ssi', $bhw, $nurse, $id);
        }else{
            $tmp_name = $_FILES['nurse_signature']['tmp_name'];
            $folder = "../assets/img/nurse-signature/" . $nurse_signature;
            $insert = $conn->prepare("UPDATE settings SET bhw = ?, nurse = ?, nurse_signature = ? WHERE id = ?");
            $insert->bind_param('sssi', $bhw, $nurse, $nurse_signature, $id);
            move_uploaded_file($tmp_name, $folder);
        }

        if ($insert->execute()) {
            ?>
                    <script>
                            Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: "Settings updated succesfully",
                              showConfirmButton: false,
                              timer: 1500
                            }).then(() => {
                              window.location.href = "settings.php"
                            })
                          </script>
                    <?php
        }
    }else{
        $tmp_name = $_FILES['nurse_signature']['tmp_name'];
        $folder = "../assets/img/nurse-signature/" . $nurse_signature;
        $insert = $conn->prepare("INSERT INTO settings SET bhw = ?, nurse = ?, nurse_signature = ?");
        $insert->bind_param('sss', $bhw, $nurse, $nurse_signature);
        if ($insert->execute()) {
            move_uploaded_file($tmp_name, $folder);
            ?>
                    <script>
                            Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: "Settings added succesfully",
                              showConfirmButton: false,
                              timer: 1500
                            }).then(() => {
                              window.location.href = "settings.php"
                            })
                          </script>
                    <?php
        }
    }

}