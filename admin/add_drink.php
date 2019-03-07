<?php
session_start();
if(empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}
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
   <script src="../assets/js/tinymce/js/tinymce/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea',width:'380px'});</script>

   <link rel="stylesheet" href="../assets/css/style.css">

   <link rel="stylesheet" href="../assets/css/responsive.css" />

   <script src="../assets/js/vendor..//modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="admin_panel_menu">      
        <div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <header id="home" class="navbar-fixed-top">
            <div class="main_menu_bg">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
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
                                        <?php
                                        if(isset($_SESSION['id_admin'])) {
                                          ?>
                                          <li class="link-1"><a href="logout.php"><span id="glyphicon" class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
                                        <?php }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>  
        </header>
        <div class="container-fluid dashboard-container">
            <div class="row">
                <div class="col-md-2">
                    <div class="list-group">
                        <a href="dashboard.php" class="list-group-item">Dashboard</a>
                        <a href="user.php" class="list-group-item">Users</a>
                        <a href="menu.php" class="list-group-item active">Menu</a>
                        <a href="deals.php" class="list-group-item ">Deals</a>
                        <a href="job-posts.php" class="list-group-item">Job Posts</a>
                        <a href="orders.php" class="list-group-item">Orders</a>
                    </div>
                </div>
                    <div class="col-md-4 addMenuDiv" align="center">
                    <h4 class="text-center">Add Drink</h4>
                      <form method="post" action="add_drink_function.php" enctype="multipart/form-data">
                        <div class="input-group loginInput loginInput2">
                          <input id="name" type="text" class="form-control input-lg loginInput signUpInput addMenuInput" name="name" placeholder="Deal Name" required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default loginBtn">Add Drink</button>
                        </div>
                      </form>
                    </div>
                </div>
  		</div>
            
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
        <script src="../assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../assets/js/vendor/bootstrap.min.js"></script>

        <script src="../assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="../assets/js/wow/wow.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
</body>
</html>