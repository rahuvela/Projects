<?php

  session_start();

  $cookie_name = 'name';
  if(isset($_COOKIE[$cookie_name])) {
      $name = $_COOKIE[$cookie_name];
  }

  if(isset($_COOKIE['role'])) {
      $role = $_COOKIE['role'];
  }

  $servername = "localhost";
  $username = "root";
  $password = "test";
  $db_name = "myDB";
    $errName = "";
    $errEmail = "";
    $errMessage = "";
    $success = false;

  if (isset($_POST["submit"])) 
  {

    $fname = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Check if name has been entered
    if (!$_POST['name']) {
      $errName = '* Please enter your name';
    }
    
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = '* Please enter a valid email address';
    }
    
    //Check if message has been entered
    if (!$_POST['message']) {
      $errMessage = '* Please enter your message';
    }

  // If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage) {

      // Create connection
      $conn = new mysqli($servername, $username, $password, $db_name);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      else{
        
        $sql = "INSERT INTO myDB.Feedback (username, email, message) VALUES ('$fname', '$email', '$message');";

        if ($conn->query($sql) === TRUE) {
          $_POST = array();
          $success = true;
        } 
        /*else {
          echo "Unable to submit feedback: " . $conn->error;
        } */ 
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/contact.css">

    <style type="text/css">
    a{
      color: #EEEDEB;
    }
    .text-danger{
      color: #EEEDEB;
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
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Stop by and say Hi! We love Feedback!</h1>
                <form class="form-horizontal" role="form" method="post" action="contact.php">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?php
                            if( isset($_POST['name']) )
                                echo htmlspecialchars($_POST['name']);
                            ?>">
                            <?php echo "<p class='text-danger'>$errName</p>";?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php
                            if( isset($_POST['email']) )
                                echo htmlspecialchars($_POST['email']);
                            ?>">
                            <?php echo "<p class='text-danger'>$errEmail</p>";?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" name="message"><?php
                            if( isset($_POST['message']) )
                                echo htmlspecialchars($_POST['message']);
                            ?></textarea>
                            <?php echo "<p class='text-danger'>$errMessage</p>";?>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-2">
                        <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                      </div>
                    </div>
                    <div style="clear: both;"></div>
            <!--
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2">
              </div>
            </div -->
                </form>
            </div>
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

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.3.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script type="application/javascript">
            <?php
                if($success){
                    echo "alert('Feedback submitted')";
                }
            ?>
        </script>
    </div>
</body>
</html>