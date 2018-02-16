<?php
$servername = "localhost";
$username = "root";
$password = "test";

//this file merely creates the db
// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed test1: " . mysqli_connect_error());
}
echo "Connected success";

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Users (
name VARCHAR(30) NOT NULL PRIMARY KEY,
pwd VARCHAR(30) NOT NULL,
email VARCHAR(50),
status VARCHAR(20),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to feedback table
$sql = "CREATE TABLE Feedback (
id int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
message VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();


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


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE product (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(100) NOT NULL,
size VARCHAR(6) NOT NULL,
price DECIMAL(10,2) NOT NULL,
store_name VARCHAR(100) NOT NULL,
is_discounted VARCHAR(10) DEFAULT 0,
link VARCHAR(500),
category VARCHAR(20),
description VARCHAR(1000),
brand VARCHAR(20),
img_loc VARCHAR(1000),

reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Product created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO product (name, size, price, store_name , is_discounted, link, category, description, brand, img_loc)
VALUES ('Mens Columbia Crimson Indiana Hoosiers Flanker Full Zip Fleece Jacket', 'S' , '55.24' , 'TIS Bookstore' , 'Yes' , 'http://www.indianauniversitystore.com/Indiana_Hoosiers_Mens_Jackets/Mens_Columbia_Crimson_Indiana_Hoosiers_Flanker_Full_Zip_Fleece_Jacket' , 'Jackets' , 'You can be found at every Indiana game, cheering on the Hoosiers, irregardless of the weather. When Mother Nature makes it breezy and cold, show off your team pride in style in this Flanker jacket from Columbia. This fleece jacket features an embroidered Indiana logo on the left chest, an Olympic collar, two front pockets, and a bungee cord on the bottom that’s designed to keep you extra cool. Do not risk missing a game due to being sick; when it gets a bit chilly, throw on this festive jacket and cheer on the Hoosiers to victory.' , 'Columbia' , '../images/products/1.jpg' );";

$sql .= "INSERT INTO product (name, size, price, store_name , is_discounted, link, category, description, brand , img_loc)
VALUES ('Womens Antigua Crimson Indiana Hoosiers Pique Xtra-Lite Polo', 'S', '35.69' , 'TIS Bookstore' , 'Yes' , 'http://www.indianauniversitystore.com/Indiana_Hoosiers_Ladies_Polos/Womens_Antigua_Crimson_Indiana_Hoosiers_Pique_Xtra-Lite_Polo' ,'Polos', 'Celebrate your love for the Indiana Hoosiers with this Antigua Pique Xtra-Lite polo!' , 'Antigua', '../images/products/1.jpg' );";

$sql .= "INSERT INTO product (name, size, price, store_name , is_discounted, link, category, description, brand , img_loc)
VALUES ('Adidas Indiana Hoosiers Infant Girls Turtleneck Cheer Dress - Crimson' , 'S' , '29.74' , 'TIS Bookstore' , 'Yes' , 'http://www.indianauniversitystore.com/Indiana_Hoosiers_Kids_Skirts_And_Dresses/adidas_Indiana_Hoosiers_Infant_Girls_Turtleneck_Cheer_Dress_-_Crimson' , 'Skirts and Dresses' , ' ' , 'Adidas', '../images/products/1.jpg');";

$sql .= "INSERT INTO product (name, size, price, store_name , is_discounted, link, category, description, brand , img_loc)
VALUES ('Indiana Hoosiers adidas Vintage Script Logo Tri-Blend T-Shirt - Heathered Crimson' , 'M' , '29.99' , 'College Mall' , 'No' , 'http://www.fanatics.com/COLLEGE_Indiana_Hoosiers_Hot_New_Arrivals/Indiana_Hoosiers_adidas_Vintage_Script_Logo_Tri-Blend_T-Shirt_-_Heathered_Crimson' , 'T-shirt' , 'You love to show off your die-hard fandom for the Indiana Hoosiers as often as possible. Now you can share your long lasting loyalty with everyone when you put on this Indiana Hoosiers Vintage Logo tri-blend T-shirt from adidas. The crisp graphics on this tee are amazing and will ensure your enthusiasm for the Indiana Hoosiers is everlasting.' , 'Adidas', '../images/products/1.jpg');";

$sql .= "INSERT INTO product (name, size, price, store_name , is_discounted, link, category, description, brand , img_loc)
VALUES ('Indiana Hoosiers Moccasin Slippers' , 'S' , '29.99' , 'College Mall' , 'No' , 'http://www.fanatics.com/COLLEGE_Indiana_Hoosiers_Footwear/Indiana_Hoosiers_Moccasin_Slippers' , 'Footwear' , 'If there is anything you love more than the Indiana Hoosiers, it is relaxing at home after a long day. Now you can combine those two passions and comfortably show off your dedication to the team by wearing these Moccasin slippers. These slippers feature Indiana Hoosiers-inspired embroidered graphics, which are the mark of a true fan. Whether you are reveling in a recent team win or just getting some rest before the big game tomorrow, these Indiana Hoosiers slippers will make you feel like a proud fan.' , 'Forever Collectibles', '../images/products/1.jpg');";

$sql .= "INSERT INTO product (name, size, price, store_name , is_discounted, link, category, description, brand , img_loc)
VALUES ('Indiana Hoosiers Womens Finalist Quarter-Zip Pullover Jacket - Gray/Black' , 'S' , '61.99' , 'iuvshop' , 'No' , 'https://www.collegebasketballstore.com/indiana-hoosiers-womens-finalist-quarter-zip-pullover-jacket-gray-black/p-2397824' , 'Sweatshirts' , 'You are a massive Indiana Hoosiers fan and love to wear as much gear as you can to show that hardcore fandom. When you get this Indiana Hoosiers Finalist quarter-zip pullover jacket, you will be prepared for the elements. This jacket features awesome printed Indiana Hoosiers graphics, perfect for showing your die-hard loyalty no matter the weather.', 'Camp David', '../images/products/1.jpg');";

if ($conn->multi_query($sql) === TRUE) {
    echo "Inserted into products sucessfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Bookmarks (
username VARCHAR(30) NOT NULL,
pid INT(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table bookmark created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Bookmarks (name, pid)
VALUES ('jay', '1');";

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>