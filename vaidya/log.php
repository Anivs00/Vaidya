<?php
session_start();
require('db.php');
if(isset($_SESSION['isUserLoggedIn'])){
    if($_SESSION['role']=="users"){
        echo "<script>window.location.href='user.php?user_logged_in';</script>";
    }
    
    if($_SESSION['role']=="admin"){
        echo "<script>window.location.href='admin.php?admin_logged_in';</script>";
    }
    }
if(isset($_POST['login'])){

    $password = $_POST['password'];
  $query="SELECT * FROM users WHERE email='{$_POST['email']}' AND password='$password'";
  $run = mysqli_query($db,$query);
  $data = mysqli_fetch_array($run);
  if(is_countable($data) && count($data) > 0){
  $_SESSION['isUserLoggedIn']=true;
$_SESSION['email']=$_POST['email'];
$_SESSION['role']=$data['role'];

if($data['role']=="users"){
    echo "<script>window.location.href='user.php?user_loggedin';</script>";
}

if($data['role']=="admin"){
    echo "<script>window.location.href='admin.php?admin_logged_In';</script>";
}


  }else{
echo "<script>window.location.href='log.php?incorrect_email_or_password';</script>";

  }
  
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <form method="post">
        <div class="home"></div>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <h2>Login</h2>
                    <?php if(isset($_GET['incorrect_email_or_password'])){
                        ?>
                    <p style="color:red;text-align:center;">Incorrect Email or Password !</p>
          
                        <?php
                    }
                    ?>
          
          <?php if(isset($_GET['user_registered_successfully'])){
                        ?>
                    <p style="color:green;text-align:center;">User registered Successfully !</p>
          
                        <?php
                    }
                    ?>


                    <div class="inputbox">
                        <ion-icon name="contact"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">Email</label>                    
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>

                    <button type="submit" name="login">Log in</button>

                    <div class="register">
                        <p>Don't have an account? <a href="reg.php">Register</a></p>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
