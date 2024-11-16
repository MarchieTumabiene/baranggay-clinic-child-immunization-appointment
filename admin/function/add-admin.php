<?php 

if ($_GET['action'] == 'add-admin') {
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $barangay = $_POST['barangay'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $filename = $username . ".png";
    $tmp_name = $_FILES['logo']['tmp_name'];
    $folder = "../assets/img/". $filename;

    $stmt = $conn->prepare("INSERT INTO admin(username,email,password,barangay,logo) VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssss", $username, $email, $password, $barangay, $filename);

    $check = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $check->bind_param("s", $username);
    
    if($check->execute()){
        $result = $check->get_result();

        if($result->num_rows > 0){
            ?>
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: "Admin already exist",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                     window.location.href = "admins.php"
                })
            </script>
            <?php
        }else{
            if($stmt->execute()){
                move_uploaded_file($filename, $folder);
        
                ?>
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: "Admin added succesfully",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                         window.location.href = "admins.php"
                    })
                </script>
                <?php
        
            }
        }

    }

}