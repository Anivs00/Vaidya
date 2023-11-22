<?php
require('db.php');
if(isset($_SESSION['isUserLoggedIn'])){
if($_SESSION['role']=="users"){
echo "<script>window.location.href='user.php?user_already_logged_in';</script>";
}

if($_SESSION['role']=="admin"){
echo "<script>window.location.href='admin.php?admin_already_logged_In';</script>";
}
}
if(isset($_POST['register'])){
 $query="SELECT * FROM users WHERE email='{$_POST['email']}'";
$run = mysqli_query($db,$query);
$data = mysqli_fetch_array($run);
if(is_countable($data) && count($data) > 0){
echo "<script>window.location.href='reg.php?user_already_registered';</script>";
}else{
    $password = $_POST['password'];
    $query="INSERT INTO users (full_name,email,password,role)";
    $query.="VALUES ('{$_POST['full_name']}','{$_POST['email']}','$password','users')";

$run = mysqli_query($db,$query);
if($run){
echo "<script>window.location.href='log.php?user_registered_successfully';</script>";

}

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>

<form method="post" action="reg.php">
    <section>
        <div class="form-box">
            <div class="form=value">
                <form action="">
                    <h2>Sign Up</h2>


                    <div class="inputbox">
                        <ion-icon name="contact"></ion-icon>
                        <input type="text" name="full_name" required>
                        <label for="">Full Name </label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="mail"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>

                    <div>
                        <input type="submit" name="register" class="button">
                    </div>

                </form>
            </div>

        </div>
    </section>
</form>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
