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

$sql = "INSERT INTO Users (name, pwd, email, status)
VALUES ('Rahul', 'password1', 'rahul@example.com', 'Admin');";

$sql .= "INSERT INTO Users (name, pwd, email, status)
VALUES ('Ameya', 'password2', 'ameya@example.com', 'Admin');";

$sql .= "INSERT INTO Users (name, pwd, email, status)
VALUES ('Prajna', 'password3', 'prajna@example.com', 'Admin');";

$sql .= "INSERT INTO Users (name, pwd, email, status)
VALUES ('jay', 'password1', 'jay@example.com', 'User')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>