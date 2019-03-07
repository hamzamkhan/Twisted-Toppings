<?php
  session_start();
  require_once("../db.php");
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Twisted Toppings</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/pizza_logo.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/animate/animate.css" />
    <link rel="stylesheet" href="../assets/css/plugins.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css" />
    <script src="../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
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
                                    <a class="navbar-brand " href="../index.php" id="navBrand">Twisted <span id="toppings">Toppings</span></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>  
        </header>
        <section>
    <div class="container" height="100px">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 well loginDiv">
        <h4 class="text-center">Login</h4>
          <form method="post" action="checklogin.php">
            <div class="input-group loginInput loginInput2">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="username" type="text" class="form-control input-lg loginInput" name="username" placeholder="Username" required="">
            </div>
            <div class="input-group loginInput loginInput2">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password"  name="password" class="form-control input-lg loginInput" placeholder="Password" required="">
            </div>
            <div class="text-center">
              <button type="submit"  class="btn btn-default loginBtn">Sign In</button>  
            </div>
            <?php
            if(isset($_SESSION['loginError'])) {
              ?>
              <div>
                <p class="text-center">Invalid Email/Password! Try Again</p>
              </div>
            <?php
             unset($_SESSION['loginError']); }
            ?>
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
                        <p>Made by Anum Mirza & Hamza Mustafa Khan</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  
    <script src="../assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-easing/jquery.easing.1.3.js"></script>
    <script src="../assets/js/wow/wow.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>
