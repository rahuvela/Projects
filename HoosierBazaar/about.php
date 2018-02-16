<?php
session_start();

$cookie_name = 'name';
if(isset($_COOKIE[$cookie_name])) {
    $name = $_COOKIE[$cookie_name];
}

if(isset($_COOKIE['role'])) {
    $role = $_COOKIE['role'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About Us</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- Customized CSS -->
<link rel="stylesheet" href="css/about.css">

<style type="text/css">
a{
	color: #EEEDEB;
}
</style>
</head>


<body style="background-color: #990000; color: #EEEDEB">

<nav>
  <div class="container"> 
    
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="home.php">HoosierBazaar</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="about.php">About Us <span class="sr-only">(current)</span></a> </li>
        <li><a href="contact.php">Contact Us</a> </li>
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
              <li><a class="nav-right" href="#">Welcome <?php echo $name; ?>!</a></li>
              <?php
          }
          else{
              ?>
              <li><a href="login_page/login.php">Login / Register</a> </li>
              <?php
          }
          ?>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<div class="container-fluid about-body">
  <div class="row">
    <div class="col-sm-8">
      <div class = "text-panel">
        <div class="about-description" >
          <p>Welcome Hoosier fan! <br><br>We know you don’t have the time to spend hours going through multiple online stores to get the perfect Hoosier swag. And that's why we’ve made it easier for you!<br><br>Find the best deals across the some of the best stores! Can’t make a decision right now? Save items to your wishlist and come back when you’re ready to go!</p>
        </div>        
      </div>
    </div>
    <div class="col-sm-4">
      <div class = "image-panel img-responsive">
        <img id = "keepCalmMeme" src="images/keepCalm.png" alt="Keep calm and show your stripes">
      </div> 
    </div>     
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
</body>
</html>