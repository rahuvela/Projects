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
    <title>HoosierBazaar</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <style type="text/css">
        a{
            color: #EEEDEB;
        }
        .recommended-products {
            background-color: #EEEDEB;
        }
        body{
            background-color: #990000;
            color: #EEEDEB;
        }
    </style>
</head>
<body>
<nav>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">HoosierBazaar</a> </div>

    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
          <li class="active"><a href="about.php">About Us</a> </li>
          <li><a href="contact.php">Contact Us</a> </li>
          <?php
          if(isset($name))
          { ?>
              <li><a href="viewBookmarks.php">My Bookmarks</a></li>
              <?php
          }
          if(isset($role) && (strcmp($role, 'Admin') == 0) )
          { ?>
              <li><a href="feedback.php">View Feedback</a></li>
          <?php
          } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right hidden-sm">
        <?php
        if(isset($name))
        {
            ?>
            <li><a href="login_page/logout.php?redirect_url=<?php echo $_SERVER['PHP_SELF']; ?>">Logout</a></li>
            <li><a>Welcome <?php echo $name; ?>!</a></li>
            <?php
        }
        else
        {
        ?>
            <li><a href="login_page/login.html">Login / Register</a></li>
        <?php
        } ?>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="carousel1" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#carousel1" data-slide-to="0" class=""> </li>
            <li data-target="#carousel1" data-slide-to="1" class="active"> </li>
            <li data-target="#carousel1" data-slide-to="2" class=""> </li>
          </ol>
          <div class="carousel-inner">
            <div class="item"> <img class="img-responsive" src="images/museum.jpg" alt="museum">
              <div class="carousel-caption"></div>
            </div>
            <div class="item active"> <img class="img-responsive" src="images/iubackground.gif" alt="iubackground">
              <div class="carousel-caption"></div>
            </div>
            <div class="item"> <img class="img-responsive" src="images/basketball.jpg" alt="basketball">
              <div class="carousel-caption"></div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel1" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel1" data-slide="next"><span class="icon-next"></span></a></div>
      </div>
</div>
 <br>
  </div>
  <center>
<div class="container">
    <div class="form-inline">
      <button type="button" onclick="location.href='search.php';" class="btn btn-primary">Search Merchandise</button>
    </div>
</div>
<h2 class="text-center">RECOMMENDED PRODUCTS</h2>
<div class="container">
  <div class="row text-center recommended-products">
    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <div class="thumbnail" onclick="window.open('http://www.indianauniversitystore.com/Indiana_Hoosiers_Mens_Jackets/Mens_Columbia_Crimson_Indiana_Hoosiers_Flanker_Full_Zip_Fleece_Jacket','_blank');" style="cursor: pointer;">
       <img src="images/products/1.jpg" alt="Thumbnail Image 1" class="img-responsive">
        <div class="caption">
          <label>Flanker Full Zip Fleece Jacket</label>
          <p>$55.24</p>
        </div>
      </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <div class="thumbnail" onclick="window.open('http://www.indianauniversitystore.com/Indiana_Hoosiers_Ladies_Polos/Womens_Antigua_Crimson_Indiana_Hoosiers_Pique_Xtra-Lite_Polo','_blank');" style="cursor: pointer;">
       <img src="images/products/2.jpg" alt="Thumbnail Image 2" class="img-responsive">
        <div class="caption">
          <label>Antigua Crimson Indiana Hoosiers Pique Xtra-Lite Polo</label>
          <p>$35.69</p>
        </div>
      </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <div class="thumbnail" onclick="window.open('http://www.indianauniversitystore.com/Indiana_Hoosiers_Kids_Skirts_And_Dresses/adidas_Indiana_Hoosiers_Infant_Girls_Turtleneck_Cheer_Dress_-_Crimson','_blank');" style="cursor: pointer;">
       <img src="images/products/3.jpg" alt="Thumbnail Image 3" class="img-responsive">
        <div class="caption">
          <label>Girls Turtleneck Cheer Dress</label>
          <p>29.74</p>
        </div>
      </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <div class="thumbnail" onclick="window.open('http://www.fanatics.com/COLLEGE_Indiana_Hoosiers_Hot_New_Arrivals/Indiana_Hoosiers_adidas_Vintage_Script_Logo_Tri-Blend_T-Shirt_-_Heathered_Crimson','_blank');" style="cursor: pointer;">
       <img src="images/products/4.jpg" alt="Thumbnail Image 4" class="img-responsive">
        <div class="caption">
          <label>Tri-Blend T-Shirt</label>
          <p>$29.99</p>
        </div>
      </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <div class="thumbnail" onclick="window.open('http://www.fanatics.com/COLLEGE_Indiana_Hoosiers_Footwear/Indiana_Hoosiers_Moccasin_Slippers','_blank');" style="cursor: pointer;">
       <img src="images/products/5.jpg" alt="Thumbnail Image 5" class="img-responsive">
        <div class="caption">
          <label>Moccasin Slippers</label>
          <p>$29.99</p>
        </div>
      </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <div class="thumbnail" onclick="window.open('https://www.collegebasketballstore.com/indiana-hoosiers-womens-finalist-quarter-zip-pullover-jacket-gray-black/p-2397824','_blank');" style="cursor: pointer;">
       <img src="images/products/6.jpg" alt="Thumbnail Image 6" class="img-responsive">
        <div class="caption">
          <label>Pullover Jacket - Gray/Black</label>
          <p>$61.99</p>
        </div>
      </div>
    </div>
  </div>
<footer class="text-center">
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