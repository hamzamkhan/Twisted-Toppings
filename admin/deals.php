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
    <title>Menu</title>
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
<body class="admin_panel">
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

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="link-1"><a href="add_deal.php"><span id="glyphicon" class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Deal</a></li>
                                        <?php
                                        if(isset($_SESSION['id_admin'])) {
                                          ?>
                                          
                                          <li class="link-1"><a href="logout.php"><span id="glyphicon" class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
                                        <?php }
                                        ?>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>  
        </header>
          <div class="container-fluid dashboard-container" >
            <div class="row">
                <div class="col-md-2">
                    <div class="list-group">
                        <a href="dashboard.php" class="list-group-item">Dashboard</a>
                        <a href="user.php" class="list-group-item">Users</a>
                        <a href="menu.php" class="list-group-item">Menu</a>
                        <a href="deals.php" class="list-group-item active">Deals</a>
                        <a href="job-posts.php" class="list-group-item">Job Posts</a>
                        <a href="orders.php" class="list-group-item">Orders</a>
                    </div>
                </div>
                  <div class="col-md-9">
                  <h3>Deals</h3>
                  <?php
                    $sql = "SELECT * FROM deals";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                      echo '<h3>Total Deals Listed: ' . $result->num_rows . '</h3>';
                    }
                  ?>
                    <table class="table">
                      <thead>
                        <th>SNo</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php
                          $sql = "SELECT * FROM deals";
                          $result = $conn->query($sql);
                          if($result->num_rows > 0){
                            $i=0;
                            while($row = $result->fetch_assoc()){
                              ?>
                                <tr>
                                  <td><?php echo ++$i; ?></td>
                                  <td><a href="../uploads/items/<?php echo $row['image']; ?>" target="_blank"><img style="width:150px;height:80px;" src="../uploads/items/<?php echo $row['image']; ?>" alt="Attachment Image"></a></td>
                                  <td><?php echo $row['deal_name']; ?></td>
                                  <td><?php echo $row['description']; ?></td>
                                  <td><?php echo $row['price']; ?></td>
                                  <td><a href="delete-deal.php?id=<?php echo $row['id_deal']; ?>">Delete</a></td>
                                  <td><a href="edit-deal.php?id=<?php echo $row['id_deal']; ?>">Edit</a></td>
                                </tr>
                              <?php
                            }
                          }
                        ?>
                      </tbody>
                    </table>
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