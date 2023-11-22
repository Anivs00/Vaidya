<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="newpg.css">
  <title>search result</title>
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

  <div style="text-align: center;">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vaidya";
    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

     // Get the search query from the URL
     $search_query = $_GET['greeting'];

    //  <script>
    //   const urlParams = new URLSearchParams(window.location.search);
    //   const greetingValue = urlParams.get('greeting');


     // Prepare a SQL query to search for diseases by name and join the remedies table
     $sql_1 = "SELECT health_con.health_id, health_con.health_name, health_con.health_desc, health_con.health_cause, health_con.health_sym FROM health_con WHERE health_sym LIKE '%$search_query%' ";
     $result_1 = mysqli_query($conn,$sql_1);
 
     $sql_2= "SELECT remedies.reme_name, remedies.reme_desc ,remedies.reme_inst FROM remedies 
     WHERE health_sym LIKE '%$search_query%' ";
     $result_2 = mysqli_query($conn,$sql_2);

     if($row = mysqli_fetch_array($result_1))
     {
   //  print your results
       echo '<hr>';
       $name = $row['health_name'];
       echo  '<h1>'.$name.'</h1>'.'<br>' ;
       $desc = $row['health_desc'];
       echo "<h3>'$desc'</h3></a>";
       echo "<b>Symptoms:</b>".$row['health_sym'].'<br>';
       echo "<b>It's Cause:</b>".$row['health_cause'].'<br>';
       while($row = mysqli_fetch_array($result_2))
       {
        echo  '<h2>'.$row['reme_name'].'</h2>'.'<br>' ;
        echo  '<p>'.$row['reme_desc'].'</p>'.'<br>' ;
        echo  '<p>'.$row['reme_inst'].'</p>'.'<br>' ;

       }
       echo '<hr>';
     }

     ?>
     
  </div>
</body>

</html>