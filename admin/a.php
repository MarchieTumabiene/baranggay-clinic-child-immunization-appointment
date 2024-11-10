<?php 
require './partials/header.php';

function clean($data){
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

if(isset($_POST['submit'])){
    
    $brgy = clean($_POST['barangay']);
    $user = clean($_POST['user']);
    $password = password_hash(clean($_POST['password']), PASSWORD_DEFAULT);
    $email = clean($_POST['email']);

    $check = $conn->query("SELECT * FROM admin WHERE username = '$user'");

    if ($check->num_rows > 0) {
        echo "<p style='color: red;'>*USER EXIST</p>";
    }else{
        $get_tables = $conn->query("INSERT INTO admin(username,email,password,barangay) VALUES('$user', '$email', '$password', '$brgy')");
        echo "<p style='color: green;'>*Added new user</p>";
        // header("location: a.php");
    }
}


$barangays = [
    "Kodia",
    "Maalat",
    "San Agustin",
    "Malbago",
    "Tarong",
    "Talangnan",
    "Mancilang",
    "Kaongkod",
    "Bunakan",
    "Kangwayan",
    "Pili",
    "Tugas",
    "Poblacion",
    "Tabagak"
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="">BARANGAY</label>
        <br>
        <select name="barangay" required>
            <option value="" disabled selected>Select Barangay</option>
            <?php 
                foreach($barangays as $brgy):
            ?>
            <option value="<?= $brgy ?>"><?= $brgy ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="">USERNAME</label>
        <br>
        <input type="text" name="user" required>
        <br>
        <label for="">EMAIL</label>
        <br>
        <input type="email" name="email" required>
        <label for="">PASSWORD</label>
        <br>
        <input type="text" name="password" required>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>