<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO contact (name, email, comment) VALUES ('$name', '$email', '$comment')";
    $result = mysqli_query($conn, $query);

    if ($result) {
    } else {
        $error_message = "Error adding comment.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="vaidya.png">
    <title>Contact | Vaidya</title>
    <style>
        * {
            font-family: sans-serif;
        }

        body {
            min-height: 100vh;
            background-image: linear-gradient(-225deg, #DFFFCD 0%, #90F9C4 48%, #39F3BB 100%);
            background-size: cover;
            background-repeat: no-repeat;
            /* height: 150vh; */
            margin: 0;
            font-family: 'Open Sans';
        }


        header {
            background: transparent;
            position: absolute;
            top: 0;
            left: 15px;
            right: 15px;
            height: 50px;
            display: flex;
            align-items: center;

        }

        header * {
            display: inline;
        }

        header li {
            margin: 20px;
        }

        header li a {
            color: black;
            text-decoration: none;
        }


        /*<!---------------------------- nav-bar css -----------------------------> */
        .about {
            position: relative;
            color: #FFFFFF;
            text-decoration: none;
        }

        .about::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #bc3c27;
            transform-origin: bottom right;
            transition: transform 0.50s ease-in-out;
            transform: scaleX(0);
        }

        .about:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
            transition: 271ms;
        }

        .reg {
            position: relative;
            color: #FFFFFF;
            text-decoration: none;
        }

        .reg::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #bc3c27;
            transform-origin: bottom right;
            transition: transform 0.50s ease-in-out;
            transform: scaleX(0);
        }

        .reg:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
            transition: 271ms;
        }

        .reg {
            margin-right: 100px;
            margin-left: auto;
            color: black;
        }

        /* Center the title */
        h1 {
            text-align: center;
            margin-top: 80px;
        }

        /* Style form labels */
        label {
            display: block;
            margin-bottom: 10px;
        }

        /* Style form input fields */
        input,
        textarea {
            display: block;
            width: 70%;
            padding: 10px;
            margin-bottom: 20px;
            margin-left: 15%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style submit button */
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 100px;
        }

        button:hover {
            background-color: #0062cc;
        }


        /*<-------------------- footer css-------------------> */

        footer {
            background-color: #333;
            color: #fff;
            padding: 50px 0;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        h3 {
            font-size: 20px;
            margin-top: 0;
        }

        p {
            margin: 0 0 20px;
            font-size: 16px;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        ul li a {
            color: black;
            text-decoration: none;
        }

        .social-icons li {
            display: inline-block;
            margin-right: 10px;
        }

        .social-icons li:last-child {
            margin-right: 0;
        }

        .social-icons li a {
            display: block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #fff;
            text-align: center;
            line-height: 40px;
            color: #333;
            transition: all 0.3s ease;
        }

        .social-icons li a:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
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
            <li class="reg"><a href="index.php">Logout</a></li>
        </nav>
    </header>

    <div style="background-color: #f5f5f538;">
        <h1>Feedback</h1>

        <?php if (isset($success_message)) : ?>
            <p><?php echo $success_message; ?></p>
        <?php endif; ?>
        <?php if (isset($error_message)) : ?>
            <p><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="post" style="display: block; text-align: center;">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" required></textarea>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>

        <br>
        <br>
        <div style="height: 40px">

        </div>
    </div>


    <br>
    <!-- -------------------footer html--------------------- -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Vaidya</h3>
                    <p>123 Main Street<br>Anytown, USA<br>12345</p>
                    <p>Phone: (123) 456-7890<br>Email: info@company.com</p>
                </div>
                <div class="col-md-4">
                    <h3>Useful Links</h3>
                    <ul>
                        <li><a href="about.css">About Us</a></li>
                        <li><a href="contact.php">Feedback</a></li>
                        <li><a href="user">Profilr</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Stay Connected</h3>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"><img src="facebook.png" alt="sc-icon" style="width:40px;"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"><img src="twitter.png" alt="sc-icon" style="width:40px;"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"><img src="google-plus.png" alt="sc-icon" style="width:40px;"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"><img src="social.png" alt="sc-icon" style="width:40px;"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"><img src="play.png" alt="sc-icon" style="width:40px;"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>



</body>

</html>