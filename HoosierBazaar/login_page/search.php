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


$query = "SELECT * FROM product WHERE 1=1 ";

if(isset($_GET["name"]) && $_GET["name"] != ''){

  $query = $query." and";
  $name = $_GET["name"];

  $query = $query." name like '%$name%' ";
}


if(isset($_GET["size"]) && $_GET["size"] != '' ){

  $query = $query." and";

  $size = $_GET["size"];
  $sizes= explode(",", $size);
  $query = $query." size in (";

  foreach($sizes as $in_size)
  {
      $query = $query."'".$in_size."',";
  }

  $query = $query."'') ";
}


if (isset($_GET["brand"]) && $_GET["brand"] != '') {
    $query = $query." and";

    $brand = $_GET['brand'];
    $brands= explode(",", $brand);
    $query = $query." brand in (";

    foreach($brands as $in_brand)
    {
      $query = $query."'".$in_brand."',";
    }
    $query = $query."'')";
}


if (isset($_GET["category"]) && $_GET["category"] != '') {

  $query = $query." and";
  $category = $_GET["category"];
  $query = $query." category = '$category' ";
}

if (isset($_GET["is_discounted"]) && $_GET["is_discounted"] != '') {

  $query = $query." and";
  $is_discounted = $_GET["is_discounted"];
  $query = $query." is_discounted = '$is_discounted' ";
}

if (isset($_GET["store_name"]) && $_GET["store_name"] != '') {

  $query = $query." and";

  $store_name = $_GET["store_name"];
  $query = $query." store_name = '$store_name' ";
}


if (isset($_GET["price_max"]) && $_GET["price_max"] != '') {

  $query = $query." and";
  $price_max = $_GET["price_max"];
  $query = $query." price <= '$price_max' ";
}


if (isset($_GET["price_min"]) && $_GET["price_min"] != '') {

  $query = $query." and";
  $price_min = $_GET["price_min"];
  $query = $query." price >= '$price_min' ";
}



//$query = $query. "name = '$name' and  pwd = '$pwd'";
$rows = array();
if ($result=mysqli_query($conn,$query))
{
    if(mysqli_num_rows($result) > 0)
    {
        while($r = mysqli_fetch_assoc($result))
        {
        $rows[] = $r;
        }
    }
}

$conn->close();
echo json_encode($rows);
