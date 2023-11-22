<?php
session_start();
require('db.php');
if(!isset($_SESSION['isUserLoggedIn'])){
echo "<script>window.location.href='log.php?admin_not_logged_in';</script>";
}
if($_SESSION['role']!='admin'){
echo "<script>window.location.href='log.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    </head>
<body>
<li style="list-style-type: none;">
    <a href="home.php" width="138" height="57" style="color:rgb(242, 244, 232, 1);">
        <img src="Vaidya.png" alt="Vaidya" width="125" height="51">
    </a>
    </li>
    <header>
    <nav style="font-size: 18px;left: 33%;position: absolute;font-weight: 600;">
        <ul>
        <li class="about"><a href="home.php">Home</a></li>
        <li class="about"><a href="user.php">Profile</a></li>
        <li class="about"><a href="about.html">About us</a></li>
        <li class="about"><a href="contact.php">Feedback</a></li>
        </ul>
    </nav>
    <nav class="reg">
        <ul>

        <h2>Welcome Admin</h2>
        <li class="about"><a href="logout.php">logout</a></li>  
        </ul>
    </nav>
    </header>
    
    <h2><?=$_SESSION['email']?></h2>
    

</body>
</html>