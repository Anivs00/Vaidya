<?php
include('db.php');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vaidya";
    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Get the search query from the URL
    $search_query = $_GET['search'];

    // Prepare a SQL query to search for diseases by name and join the remedies table
    $sql_1 = "SELECT health_con.health_id, health_con.health_name, health_con.health_desc, health_con.health_cause, health_con.health_sym 
    FROM health_con WHERE health_sym LIKE '%$search_query%' ";
    $result_1 = mysqli_query($conn,$sql_1);

    $sql_2= "SELECT remedies.reme_name, remedies.reme_desc ,remedies.reme_inst,times_searched FROM remedies 
    WHERE Used_for LIKE '%$search_query%' ";
    $result_2 = mysqli_query($conn,$sql_2);

    // $sql_3= "SELECT remedies.yoga_postures FROM remedies 
    // WHERE Used_for LIKE '%$search_query%' ";
    // $result_3 = mysqli_query($conn,$sql_3);
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="search.css">
  <title>Search Result</title>

  <style>
    h2 {
      text-decoration: underline;
      padding: 90px;
      
    }

    p {
      font-size: 20px;
    }

    b {
      font-size: 30px;
    }

    div {
      position: absolute;
      top: 20%;

    }
    .review{
      text-decoration:none;
      position: absolute;
      top:900px;
      display: block;
      width: 100px;
      height: 50px;
      background-color: #4CAF50;
      color: white;
      text-align: center;
      font-size: 24px;
      line-height: 50px;
      border-radius: 10px;
      position: relative;
      bottom: 50px;
      left: 700px

      
      
      
      


      
      
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

  <div>
    <?php
        //   while($row = mysqli_fetch_array($result_1))
        //   {
        // //  print your results
          
        //     echo '<b>' . $row['health_name'] . '</b>';
        //     echo '<p class="desc">' . $row['health_desc'] . '</p>';
        //     echo '<b>Caused by:</b><p class="cause_by">' . $row['health_cause'] . '</p>';
        //     echo '<b>Symptoms:</b><p class="sym">' . $row['health_sym'] . '</p>';
        //     while($row = mysqli_fetch_array($result_2))
        //     {
        //     echo '<p>Remedie Solution:</p>  <h3 class="rem">' . $row['reme_name'] . '</h3>';
        //     echo '<p class="rem_desc">' . $row['reme_desc'] . '</p>';
        //     echo '<p class="rem_inst">Instructions:' . $row['reme_inst'] . '</p>';
            
        //       while($row = mysqli_fetch_array($result_3)){ 
        //         echo '<p class="rem_inst"><b></b>' . $row['yoga_postures'] . '</p>';
        //       }
        //     }
        //   }


        while($row1 = mysqli_fetch_array($result_1) )
        {
          
            if(($row2 = mysqli_fetch_array($result_2))>0)       
           {
                    
                //  print your results
                    echo '<hr>';
                    $name = $row1['health_name'];
                    echo  '<b>'.$name.'</b>'.'<br>' ;
                    $sym = $row1['health_sym'];
                    echo "<a href='newpg.php?greeting=$name' ><b>Symptoms:'$sym'</b></a>";
                    if(!isset($row2['times_searched'])) 
                    {
                      $row2['times_searched'] = 0; // or any other default value
                    }
                    $times_searched = $row2['times_searched'] + 1;
                    $sql_update = "UPDATE remedies SET times_searched = $times_searched WHERE Used_for = '$name'";
                    mysqli_query($db, $sql_update);

                    echo '<hr>';
           }
        }
?> 
  </div>
        <div>
          <a href="review.php" class="review">Review</a>
        </div>
</body>

</html>