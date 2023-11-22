<?php
session_start();
require('db.php');
if(!isset($_SESSION['isUserLoggedIn'])){
    echo "<script>window.location.href='log.php?user_not_logged_in';</script>";
}
if($_SESSION['role']!='users'){
    echo "<script>window.location.href='log.php';</script>";
}

$email = $_SESSION['email'];
$sql = "SELECT full_name, search_history FROM users WHERE email = ?";
$stmt = mysqli_prepare($db,$sql);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$full_name, $search_history);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);


// start or resume the session


// check if the search_query key exists in the $_POST array
if (isset($_POST['search_query'])) {
  // get the user's search query from the form
  echo "h1";
  $search_query = $_POST['search_query'];

  // check if the search history array exists in the session
  if (!isset($_SESSION['search_history'])) {
    // if not, create it as an empty array
    echo "h1";
    $_SESSION['search_history'] = array();
  }

  // add the current search query to the search history array
  array_push($_SESSION['search_history'], $search_query);

  // limit the search history to the last 10 searches
  if (count($_SESSION['search_history']) > 10) {
    array_shift($_SESSION['search_history']);
  }

  // store the search history in a cookie
  setcookie('search_history', serialize($_SESSION['search_history']), time() + 3600, '/');

  // display the search history to the user
  echo '<h2>Search History</h2>';
  echo '<ul>';
  foreach ($_SESSION['search_history'] as $query) {
    echo '<li>' . $query . '</li>';
  }
  echo '</ul>';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <title>User Dashboard</title>
    <style>

.animated-button {
  display: inline-block;
  position: relative;
  cursor: pointer;
  outline: none;
  border: none;
  background-color: #24B5D4;
  color: #fff;
  font-size: 18px;
  padding: 15px 30px;
  border-radius: 50px;
  transition: all 0.3s ease-out;
}

.animated-button span {
  position: relative;
  z-index: 1;
}

.animated-button:before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  border-radius: 50px;
  background-color: #F2F4E8;
  transform: scale3d(0, 1, 1);
  transform-origin: left center;
  transition: transform 0.3s ease-out;
}

.animated-button:hover:before {
  transform: scale3d(1, 1, 1);
  transform-origin: right center;
}

.search-history {
  max-height: 200px;
  overflow-y: auto;
}

.search-history ul {
  padding-left: 0;
}

.search-history li {
  list-style-type: none;
  margin-bottom: 5px;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  flex-direction: column;
}

.container h1 {
  font-size: 48px;
  margin-bottom: 16px;
  text-align: center;
}

.container p {
  font-size: 24px;
  margin-bottom: 32px;
  text-align: center;
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
        <li class="about"><a href="logout.php">logout</a></li>
        </ul>
    </nav>
    </header>
    <h1>Welcome <?php echo $full_name ?></h1>
            <h2><?=$_SESSION['email']?></h2>
            
    
    <?php
      // Convert the search history string to an array
      $search_history_arr = explode(" ", $search_history);

      // Loop through the search history array and display each search item
      foreach($search_history_arr as $search_item) {
        echo "<li>" . $search_item . "</li>";
      }
    ?>
  </ul>
</div>
    <div class="container">
    <button class="animated-button" onclick="window.location.href='home.php'">
  <span>Get Started</span>
</button>
</div>

</button>

    <script>
      const animatedButton = document.querySelector('.animated-button');
animatedButton.addEventListener('click', function() {
  window.location.href = 'home.php';
});

    </script>
</body>
</html>
