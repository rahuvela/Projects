<?php
$servername = "localhost";
$username = "root";
$password = "test";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM Users WHERE name = '$name' and  pwd = '$pwd' ";

 if ($result=mysqli_query($conn,$query))
  {
   if(mysqli_num_rows($result) > 0)
    {
      echo "Exists";
    }
  else
      echo "Doesn't exist";
  }
else
    echo "Query Failed.";



$conn->close();
?>