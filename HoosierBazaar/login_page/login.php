<?php
$servername = "localhost";
$username = "root";
$password = "test";
$dbname = "myDB";


try {
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    echo $e->errorMessage();
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name = $_POST["name"];
$pwd = $_POST["pwd"];

$login_succeeded = false;

$query = "SELECT name, status FROM Users WHERE name = '$name' and  pwd = '$pwd' LIMIT 1";

$rows = array();
if ($result=mysqli_query($conn,$query))
{
    if(mysqli_num_rows($result) > 0)
    {

        $cookie_name = "name";
        $cookie_value = $name;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        $cookie_role = "role";
        $cookie_role_value = "User";
        while($r = mysqli_fetch_array($result))
        {
            $cookie_role_value = $r['status'];
        }

        setcookie($cookie_role, $cookie_role_value, time() + (86400 * 30), "/");
        $login_succeeded = true;
    }
}

$conn->close();

if ($login_succeeded)
    header("Location: ../home.php");
else
    header("Location: loginerror.html");

?>