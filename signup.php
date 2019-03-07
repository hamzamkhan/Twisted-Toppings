<?php
  session_start();
  require_once("db.php");
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Twisted Toppings</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/pizza_logo.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins.css" />

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/responsive.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="login_page">
  		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <header id="home" class="navbar-fixed-top">
           <div class="main_menu_bg">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand " href="index.php" id="navBrand">Twisted <span id="toppings">Toppings</span></a>
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="link-1"><a href="index.php"><span id="glyphicon" class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                                        <li class="link-1"><a href="menu.php"><span id="glyphicon" class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Menu</a></li>
                                        <li class="link-1"><a href="search.php"><span id="glyphicon" class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Job Posts</a></li>
                                        <li class="link-1"><a href="franchiseform.php"><span id="glyphicon" class="glyphicon glyphicon-file" aria-hidden="true"></span> Franchise Interest Form</a></li>
                                        <?php
                                        if(isset($_SESSION['id_user'])) {
                                          ?>
                                          <li class="link-1"><a href="logout.php"><span id="glyphicon" class="glyphicon glyphicon-ok" aria-hidden="true"></span> Applied Job Posts</a></li>
                                          <li class="link-1"><a href="logout.php"><span id="glyphicon" class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
                                        <?php } else { 
                                        ?>
                                          <li class="link-1"><a href="login.php"><span id="glyphicon" class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a></li> 
                                        <?php } ?>   

                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

<section>
    <?php if(isset($_SESSION['registerError'])) { ?>
    <div class="row">
      <div class="col-mid-12 successMessage">
        <div class="alert alert-danger" >
          Email Already Exists!
        </div>
      </div>
    </div>
    <?php unset($_SESSION['registerError']); } ?>
    <div class="container" height="100px">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 well loginDiv" align="center">
        <h4 class="text-center">Sign Up</h4>
          <form method="post" action = "adduser.php" enctype="multipart/form-data">
            <div class="input-group loginInput loginInput2">
              <input id="fname" type="text" class="form-control input-lg loginInput signUpInput" name="fname" placeholder="First Name" required="">
            </div>
            <div class="input-group loginInput loginInput2">
              <input id="lname" type="text" class="form-control input-lg loginInput signUpInput" name="lname" placeholder="Last Name" required="">
            </div>
            <div class="input-group loginInput loginInput2">
              <input id="email" type="text" class="form-control input-lg loginInput signUpInput" name="email" placeholder="Email" required="">
            </div>
            <div class="input-group loginInput loginInput2">
              <input id="password"  type="password"  name="password" class="form-control input-lg loginInput signUpInput" placeholder="Password" required="">
            </div>
            <div class="form-group checkbox">
                <label><input type="checkbox" required>I accept the terms & conditions</label>
              </div>
            <div class="text-center">
              <button type="submit"  class="btn btn-default loginBtn">Register</button>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer id="footer" class="footer">
      <div class="container text-center">
          <div class="row">
              <div class="col-sm-12">
                  <div class="copyright wow zoomIn" data-wow-duration="3s">
						<p>Made by Anum Mirza & Hamza Mustafa Khan.</p>
				  </div>
              </div>
          </div>
      </div>
   </footer>

   <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
   <script src="assets/js/vendor/bootstrap.min.js"></script>

   <script src="assets/js/jquery-easing/jquery.easing.1.3.js"></script>
   <script src="assets/js/wow/wow.min.js"></script>
   <script src="assets/js/plugins.js"></script>
   <script src="assets/js/main.js"></script>
   <script type="text/javascript">
      $(function(){
         $(".successMessage:visible").fadeOut(5000);
       });
  </script>
</body>
</html>
