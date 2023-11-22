<?php
// database connection settings
$host = "localhost";
$username = "root";
$password = "";
$dbname = "vaidya";

// create database connection
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (name, email, rating, comment) VALUES ('$name', '$email', '$rating', '$comment')";
    if (mysqli_query($conn, $sql)) {
    echo "";
    } else {
    echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="review.css">
    <title>Review</title>
</head>
<body>
    
    <form method="post"style="margin-top: 2%;">
    <div class="container1">    
        <h2 style="text-align: center;">Review</h2>
            <div class="inputbox">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
                
            
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            
                <br>
            
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="">Select a rating</option>
                    <option value="1">1 star</option>
                    <option value="2">2 stars</option>
                    <option value="3">3 stars</option>
                    <option value="4">4 stars</option>
                    <option value="5">5 stars</option>
                </select>
            
                
            
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" required></textarea>
                
            
                <input type="submit" name="submit" value="Submit">
            </div>
            </div>
            </form>

    </div>

    <div class="display">
            <?php
            $sql = "SELECT * FROM reviews";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) 
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                echo "<p><strong>" . $row['name'] . "</strong> (" . $row['rating'] . " stars)</p>";
                echo "<p>" . $row['comment'] . "</p>";
                }
            } else {
                echo "<p>No reviews yet.</p>";
            }
            
            ?>
    </div>
    
</body>
</html>

