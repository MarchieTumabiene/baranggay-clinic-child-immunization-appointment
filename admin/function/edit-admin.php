<?php 

if ($_GET['action'] == 'update-admin') {
    $id = $_POST['id'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $barangay = $_POST['barangay'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $filename = $username . ".png";
    $tmp_name = $_FILES['logo']['tmp_name'];
    $folder = "../assets/img/". $filename;

    if ($_FILES['logo']['error'] > 0) {
       
        if (empty($password)) {
            $stmt = $conn->prepare("INSERT INTO admin(username,email,barangay) VALUES(?,?,?)");
            $stmt->bind_param("sss", $username, $email, $barangay);
        }else{
            $stmt = $conn->prepare("INSERT INTO admin(username,email,password,barangay) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $username, $email, $password, $barangay);
        }
    
    }else{
      
        
        if (empty($password)) {
            $stmt = $conn->prepare("INSERT INTO admin(username,email,barangay,logo) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $username, $email, $barangay, $filename);
        }else{
            $stmt = $conn->prepare("INSERT INTO admin(username,email,password,barangay,logo) VALUES(?,?,?,?,?)");
            $stmt->bind_param("sssss", $username, $email, $password, $barangay, $filename);
        }
    
    }



    if($stmt->execute()){
        move_uploaded_file($filename, $folder);

        ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "Admin updated succesfully",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                 window.location.href = "admins.php"
            })
        </script>
        <?php

    }
    $stmt->close();
}