<?php

  session_start();

  $cookie_name = 'name';
  if(isset($_COOKIE[$cookie_name])) {
      $name = $_COOKIE[$cookie_name];
  }
  else{
      header("Location: login_page/login.php");
  }

  if(isset($_COOKIE['role'])) {
      $role = $_COOKIE['role'];
  }

    $rows = array();
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

      $sql = "Select p.*  from myDB.bookmarks b, myDB.product p where b.pid = p.id and b.username = '$name';";

      if ($result=mysqli_query($conn,$sql))
      {
          if(mysqli_num_rows($result) > 0)
          {
              while($r = mysqli_fetch_assoc($result))
              {
                  $rows[] = $r;
              }
          }
          else{

          }
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Your Bookmarks</title>
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="css/contact.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script type="text/javascript" src="js/bookmark.js"></script>
    <style type="text/css">
        a{
          color: #EEEDEB;
        }
        #bookmark{
            color: black;
        }
        #bookmark>thead>tr{
            background-color: #999896;
        }
        #bookmark>tbody>tr{
            border-radius: 4px;
            background-color: #EEEDEB;
        }
        #bookmark>tbody>tr>td>a{
            color: black;
        }
    </style>

  </head>

  <body style="background-color: #990000; color: #EEEDEB">

    <nav>
      <div class="container"> 
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="home.php">HoosierBazaar</a> 
        </div>
    
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="about.php">About Us</a> </li>
              <li><a href="contact.php">Contact Us<span class="sr-only">(current)</span></a> </li>
            <?php
            if(isset($name))
            {
                ?>
                <li><a href="viewBookmarks.php">My Bookmarks</a></li>
                <?php
                if(isset($role) && (strcmp($role, 'Admin') == 0) )
                { ?>
                    <li><a href="feedback.php">View Feedback</a></li>
                    <?php
                }
            }
            ?>
        </ul>

        <ul class="nav navbar-nav navbar-right hidden-sm">
          <?php
          if(isset($name))
          {
              ?>
              <li><a href="login_page/logout.php?redirect_url=<?php echo $_SERVER['PHP_SELF']; ?>">Logout</a></li>
              <li><a href="#">Welcome <?php echo $name; ?>!</a></li>
              <?php
          }
          else {
              ?>
              <li><a href="login_page/login.html">Login / Register</a></li>
              <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
      <table id="bookmark" class="table table-bordered">
          <?php
          if( sizeof($rows) > 0)
          {
              ?>
              <caption>Your Bookmarks</caption>
              <thead>
                  <tr>
                      <th>Product</th>
                      <th>Image</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
              <?php
              foreach($rows as $row){
                  ?>
                  <tr>
                      <td>
                          <a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['name']; ?></a>
                      </td>
                      <td>
                          <img style="height: 200px; width: 200px;" src="images/<?php echo $row['img_loc']; ?>">
                      </td>
                      <td>
                          <button data-custom-value="<?php echo $row['id']; ?>" data-name-value="<?php if(isset($_COOKIE[$cookie_name])) {
                              echo $name;
                          }?>" type="button" class="btn btn-danger delete-button">Delete</button>
                      </td>
                  </tr>
              <?php
              }
              ?> </tbody> <?php
          }
          else
          { ?>
              <caption>You do not have any bookmarks!!</caption>
          <?php
          }
          ?>
      </table>
  </div>
  <br>
  <footer class="text-center my-footer">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <p>Copyright © HoosierBazaar.com All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
  </body>
</html>