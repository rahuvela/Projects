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

$login_succeeded = false;

$name = $_POST["name"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];

$sql = "INSERT INTO Users (name, pwd, email, status)
VALUES ('$name', '$pwd', '$email', 'User');";

if ($conn->multi_query($sql) === TRUE) {
    $login_succeeded = true;
} else {
	#echo 'alert("account already exists!")';
	#$message = "account already exists!";
	#echo "<script type='text/javascript'>alert('$message');</script>";
    #echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: login.html");
?>