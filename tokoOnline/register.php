<?php
    include 'db.php';

    if(isset($_POST['submit'])){
        $user_name = mysqli_real_escape_string($conn, $_POST['username']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $telp_user = mysqli_real_escape_string($conn, $_POST['telp_user']);
        $email_user = mysqli_real_escape_string($conn, $_POST['email_user']);
        $address_user = mysqli_real_escape_string($conn, $_POST['address_user']);

        $insert = mysqli_query($conn, "INSERT INTO tb_user VALUES (
            null,
            '".$user_name."',
            '".$username."',
            '".md5($password)."',
            '".$telp_user."',
            '".$email_user."',
            '".$address_user."'
                )");
            header('location:login_user.php');
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <div class="box-register">
        <form action="" method="post" class="r">
            <h3>USER REGISTER</h3>
            <input type="text" name="user_name" require placeholder="enter your name">
            <input type="text" name="username" require placeholder="enter your username">
            <input type="password" name="password" require placeholder="enter your password">
            <input type="tel" name="telp_user" require placeholder="enter your phone number">
            <input type="email" name="email_user" require placeholder="enter your email">
            <input type="text" name="address_user" require placeholder="enter your address">
            <input type="submit" name="submit" value="register now" class="btn">
            <p>already have an account? <a href="login_user.php">Login</a></p>
        </form>
    </div>
</body>
</html>