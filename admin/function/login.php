<?php

    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param('s', $uname);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();

            if (password_verify($password, $row['password'])) {
                $success = "*Account logged in successfully, redirecting in 3 seconds";
                $_SESSION['ID'] = $row['id'];
                $_SESSION['USERNAME'] = $row['username'];
                $_SESSION['BARANGAY'] = $row['barangay'];
                $_SESSION['LOGO'] = $row['logo'];
                unset($_SESSION['ADMIN_LOGIN']);
                header('refresh:3;url=https://www.madridejosbarangayimmunization.com/?auth=1&page=dashboard');
            }else{
                $error = "*Incorrect username or password";
            }

        }else{
            $error = "*Account doesn't exist";
        }
    }
