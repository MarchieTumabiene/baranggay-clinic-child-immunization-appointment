<?php 

if ($_GET['action'] == 'add-admin') {
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $barangay = $_POST['barangay'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $filename = $username;
    $tmp_name = $_FILES['logo']['tmp_name'];
    $folder = "../assets/img/". $filename;

    $stmt = $conn->prepare("INSERT INTO admin(username,email,password,barangay,logo) VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssss", $username, $email, $password, $barangay, $filename);

    if($stmt->execute()){
        move_uploaded_file($filename, $folder);

        ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "Appointment added succesfully",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                 window.location.href = "admins.php"
            })
        </script>
        <?php

    }


}