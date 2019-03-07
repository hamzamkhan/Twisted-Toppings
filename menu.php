<?php
  session_start();
  require_once("db.php");
  $name_array= array();
  if(isset($_POST["add_to_cart"]))
  {
    if(isset($_SESSION["shopping_cart"]))
    {
        $count = count($_SESSION["shopping_cart"]);
        if(!empty($_POST["price"]) && !empty($_GET["id"]))
        {
            if($_POST["price"]>300 && $_POST["price"]<=499)
            {
                $_POST["hidden_name"] = $_POST["hidden_name"]." (Small)";
            }
            elseif ($_POST["price"]>499 && $_POST["price"]<=699) 
            {
                $_POST["hidden_name"] = $_POST["hidden_name"]." (Regular)";
            }
            elseif ($_POST["price"]>699 && $_POST["price"]<=899) 
            {
                $_POST["hidden_name"] = $_POST["hidden_name"]." (Large)";
            }
            elseif ($_POST["price"]>899 ) 
            {
                $_POST["hidden_name"] = $_POST["hidden_name"]." (Jumbo)";
            }
            if(!empty($_POST['drinks']))
            {
                if($_POST['drinkSize']==50)
                {
                    $_POST['hidden_name']=$_POST['hidden_name']." ".$_POST['drinks']." (500ml)";
                }
                elseif($_POST['drinkSize']==70)
                {
                    $_POST['hidden_name']=$_POST['hidden_name']." ".$_POST['drinks']." (1.5l)";
                }
                elseif($_POST['drinkSize']==50)
                {
                    $_POST['hidden_name']=$_POST['hidden_name']." ".$_POST['drinks']." (500ml)";
                }

                $_POST["price"]=$_POST["price"]+$_POST["drinkSize"];
            }            
                $item_array = array(
                'item_id'=>$_GET["id"],
                'item_name'=>$_POST["hidden_name"],
                'item_price'=>$_POST["price"],
                'item_quantity'=>$_POST["quantity"],
                );
        } 
        elseif(!empty($_POST["price_deal"]) && !empty($_GET["id"]))
        {
            
            if(!empty($_POST["drinks"]))
            {
                $_POST["hidden_name"] = $_POST["hidden_name"]." (".$_POST["pizzaName"]." ".$_POST["drinks"].")";
            }
            else
            {
                $_POST["hidden_name"] = $_POST["hidden_name"]." (".$_POST["pizzaName"].")";
            }
            $item_array = array(
                'item_id'=>$_GET["id"],
                'item_name'=>$_POST["hidden_name"],
                'item_price'=>$_POST["price_deal"],
                'item_quantity'=>$_POST["quantity"],
            );
        }
        if(empty($_GET["id"]))
        {
            $price=0;
            $veggies=implode(", ",$_POST["veggies"]);
            $_POST["flavor"]=$_POST["flavor"]." (".$_POST["crust"].", ".$_POST["size"].", ".$_POST["sauce"].", ".$veggies.")";
            if ($_POST["size"] == "Small") {

                $price=420;
            }
            elseif ($_POST["size"] == "Regular") {

                $price=710;
            }
            elseif ($_POST["size"] == "Large") {

                $price=900;
            }
            elseif ($_POST["size"] == "Jumbo") {

                $price=1250;
            }
            $item_array = array(
                'item_id'=>$_POST["flavor"],
                'item_name'=>$_POST["flavor"],
                'item_price'=>$price,
                'item_quantity'=>$_POST["quantity"]
            );



        }

            
        $_SESSION["shopping_cart"][$count]=$item_array;
    }
    else
    {
        if(!empty($_POST["price"]) && !empty($_GET["id"]))
            {
                if($_POST["price"]>300 && $_POST["price"]<=499)
                {
                    $_POST["hidden_name"] = $_POST["hidden_name"]." (Small)";
                }
                elseif ($_POST["price"]>499 && $_POST["price"]<=699) 
                {
                    $_POST["hidden_name"] = $_POST["hidden_name"]." (Regular)";
                }
                elseif ($_POST["price"]>699 && $_POST["price"]<=899) 
                {
                    $_POST["hidden_name"] = $_POST["hidden_name"]." (Large)";
                }
                elseif ($_POST["price"]>899 ) 
                {
                    $_POST["hidden_name"] = $_POST["hidden_name"]." (Jumbo)";
                }
                if(!empty($_POST['drinks']))
                {
                    if($_POST['drinkSize']==50)
                    {
                        $_POST['hidden_name']=$_POST['hidden_name']." ".$_POST['drinks']." (500ml)";
                    }
                    elseif($_POST['drinkSize']==70)
                    {
                        $_POST['hidden_name']=$_POST['hidden_name']." ".$_POST['drinks']." (1.5l)";
                    }
                    elseif($_POST['drinkSize']==50)
                    {
                        $_POST['hidden_name']=$_POST['hidden_name']." ".$_POST['drinks']." (500ml)";
                    }
                    $_POST["price"]=$_POST["price"]+$_POST["drinkSize"];
                }   
                $item_array = array(
                    'item_id'=>$_GET["id"],
                    'item_name'=>$_POST["hidden_name"],
                    'item_price'=>$_POST["price"],
                    'item_quantity'=>$_POST["quantity"],
                );
            }
        elseif(!empty($_POST["price_deal"]) && !empty($_GET["id"]))
            {
                if(!empty($_POST["drinks"]))
                {
                    $_POST["hidden_name"] = $_POST["hidden_name"]." (".$_POST["pizzaName"]." ,".$_POST["drinks"].")";
                }
                else
                {
                    $_POST["hidden_name"] = $_POST["hidden_name"]." (".$_POST["pizzaName"].")";
                }
                $item_array = array(
                  'item_id'=>$_GET["id"],
                    'item_name'=>$_POST["hidden_name"],
                    'item_price'=>$_POST["price_deal"],
                    'item_quantity'=>$_POST["quantity"],
                );
            }
            if(empty($_GET["id"]))
            {
                $price=0;
                $veggies= implode(", ",$_POST["veggies"]);
                $_POST["flavor"]=$_POST["flavor"]." (".$_POST["crust"].", ".$_POST["size"].", ".$_POST["sauce"].", ".$veggies.")";
                if ($_POST["size"] == "Small") {

                    $price=420;
                }
                elseif ($_POST["size"] == "Regular") {

                    $price=710;
                }
                elseif ($_POST["size"] == "Large") {

                    $price=900;
                }
                elseif ($_POST["size"] == "Jumbo") {

                    $price=1250;
                }
                $item_array = array(
                    'item_id'=>$_POST["flavor"],
                    'item_name'=>$_POST["flavor"],
                    'item_price'=>$price,
                    'item_quantity'=>$_POST["quantity"],
                );
            }
        
        $_SESSION["shopping_cart"][0]=$item_array;
    }
  }

  if(isset($_GET["action"]))
  {
    if($_GET["action"]=="delete")
    {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) 
        {
            if($values["item_name"]==$_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="menu.php"</script>';
            }
        }            
        
    }
  }
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
   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://raw.githubusercontent.com/jquery-backstretch/jquery-backstretch/master/jquery.backstretch.min.js"></script>

   <script type="text/javascript">
            $(document).ready(function(){
                $("#menuSection").load('menu_menu.php');
                $("#menuLink").click(function(){
                    $("#menuSection").load('menu_menu.php');
                });
                $("#dealsLink").click(function(){
                    $("#menuSection").load('menu_deals.php');
                });
                $("#cyopLink").click(function(){
                    $("#menuSection").load('menu_cyop.php');
                });
            });
   </script>
   <link rel="stylesheet" href="assets/css/responsive.css" />
   <link rel="stylesheet" href="assets/css/style.css">
   <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="menu_items">
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
                                        <li class="link-1"><a href="about_us.php"><span id="glyphicon" class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> About Us</a></li>
                                        <?php
                                        if(isset($_SESSION['id_user'])) {
                                          ?>
                                          <li class="link-1"><a href="applied-jobs.php"><span id="glyphicon" class="glyphicon glyphicon-ok" aria-hidden="true"></span> Applied Job Posts</a></li>
                                          <li class="link-1"><a href="logout.php"><span id="glyphicon" class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
                                        <?php } else { 
                                        ?>
                                          <li class="link-1"><a href="signup.php"><span id="glyphicon" class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Sign Up</a></li>
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

        <section id="portfolio" class="portfolio portfolio_menu" style="">
            <div class="row">
                <div class="container-fluid col-lg-3" id="primary-nav-div" style="">
                    <div class="primary-nav">
                        <nav role="navigation" class="menu">
                            <a href="#" class="logotype">Twisted<span>Toppings</span></a>
                            <div class="overflow-container">
                                    <li id="menuLink"><a href="#">Pizza<span id="glyphicon" class="icon glyphicon glyphicon-heart" aria-hidden="true"></span></a></li>
                                    <li id="cyopLink"><a href="#">Create Your Own Pizza<span id="glyphicon" class="icon glyphicon glyphicon-fire" aria-hidden="true"></span></a></li>
                                    <li id="dealsLink"><a href="#">Deals<span id="glyphicon"  class="icon glyphicon glyphicon-gift" aria-hidden="true"></span></a></li>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid col-lg-9">
                    <div id="menuSection">
                    
                    </div>
                    
                    <br>
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    { 
                    ?>
                    <h4 id="orderDetailsTag">Order Details</h4>
                    <?php
                    }
                    ?>
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                        $total=0;
                        foreach ($_SESSION["shopping_cart"] as $keys => $values) 
                        {
                            array_push($GLOBALS['name_array'], $values["item_quantity"]);
                            array_push($GLOBALS['name_array'], $values["item_name"]);
                    ?>
                    <form method="post" action="checkout.php">
                        <div class="table able-responsive" id="shoppingCartTable">
                            <table class="table-bordered" cellpadding="0" cellspacing="0">
                               
                                
                                <tr>
                                    <input type="hidden" name="order_item_name" value="<?php echo implode(" ",$GLOBALS['name_array']); ?>">
                                    <td width="40%"><?php echo $values["item_name"]; ?></td>
                                    <td width="10%"><?php echo $values["item_quantity"]; ?></td>
                                    <td width="20%">Rs.<?php echo $values["item_price"]; ?></td>
                                    <td width="15%"><?php echo number_format((int)$values["item_quantity"] * (int)$values["item_price"], 2); ?></td>
                                    <td width="5%"><a href="menu.php?action=delete&id=<?php echo $values["item_name"]; ?>"><span class="text-danger">Remove</span></a></td>
                                </tr>    
                                <?php
                                        $total = $total + ((int)$values["item_quantity"]*(int)$values["item_price"]);
                                    }
                                ?>
                                <tr>
                                    <td colspan="3" align="right">Total</td>
                                    <td align="right">Rs.<?php echo number_format($total,2); ?></td>
                                    <input type="hidden" name="total_price" value="<?php echo number_format($total,2); ?>">
                                </tr>
                                
                                <?php
                                }
                                ?>
                            </table>
                            <?php
                            if(!empty($_SESSION["shopping_cart"]))
                            {
                            ?>
                            <br>
                            <input type="text" name="name" class="form-control input-lg" id="input_cart" value="" placeholder="Name" required>
                            <br>
                            <input type="text" name="address" class="form-control input-lg" id="input_cart" value="" placeholder="Address" required>
                            <br>
                            <input type="text" name="phone" class="form-control input-lg" id="input_cart" value="" placeholder="Phone Number" required>
                            <br>
                            <input type="submit" class="btn btn-success" name="proceed_checkout" value="Proceed To Checkout">
                            <?php
                            }
                            ?>

                        </div>
                    </form>
        		</div>
        	</div>
        </section>


        <!--Footer-->
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
		
		<div class="scrollup">
			<a href="#"><i class="fa fa-chevron-up"></i></a>
		</div>	
        <script type="text/javascript">
            $('.nav-toggle').click(function(e) {
  
              e.preventDefault();
              $("html").toggleClass("openNav");
              $(".nav-toggle").toggleClass("active");

            });
        </script>	
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="assets/js/wow/wow.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        
</body>
</html>