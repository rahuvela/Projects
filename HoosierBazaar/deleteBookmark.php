<?php
  $name =$_GET["username"];;
  $pid = $_GET["pid"];

  $servername = "localhost";
  $username = "root";
  $password = "test";
  $db_name = "myDB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db_name);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  else {

      $sql = "Delete from myDB.bookmarks where pid=".$pid." and username='$name';";

      echo $sql;
      if (mysqli_query($conn,$sql) == true)
      {
            echo "success";
      }
      else
          echo "failure";
  }
?>