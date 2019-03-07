<?php
session_start();
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Twisted Toppings</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/pizza_logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.15/features/searchHighlight/
    dataTables.searchHighlight.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins.css" />

    <link rel="stylesheet" href="assets/css/responsive.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="search_page">
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
  
    <?php if(isset($_SESSION['jobApplySuccess'])) { ?>
    <div class="row">
      <div class="col-mid-12 successMessage">
        <div class="alert alert-success" >
          You Have Successfully Applied!
        </div>
      </div>
    </div>
    <?php unset($_SESSION['jobApplySuccess']); } ?>
    <section id="sectionSuccessMessage">
    <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <form id="myForm" class="form-inline">
          <div class="form-group">
            <label class="advancedSearchLabels">Experience</label>
            <select id="experience" class="advancedSearch form-control">
              <option value="" selected="">Select Experience (Years)</option>
              <?php
                $sql = "SELECT DISTINCT(experience) FROM job_post WHERE experience IS NOT NULL ORDER BY experience";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                  while($row = $result->fetch_assoc()) {
                    echo "<option value'".$row['experience']."'>".$row['experience']."</option>";
                  }
                }
              ?>
            </select>
          </div>
          <div class="form-group" >
            <label class="advancedSearchLabels">Qualification</label>
            <select  id="qualification" class="advancedSearch form-control">
              <option value="" selected="">Select Qualification</option>
              <?php
                $sql = "SELECT DISTINCT(qualification) FROM job_post WHERE qualification IS NOT NULL";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                  while($row = $result->fetch_assoc()) {
                    echo "<option value'".$row['qualification']."'>".$row['qualification']."</option>";
                  }
                }
              ?>
            </select>
          </div>
          <button class="btn btn-success">Search</button>
        </form>
          
      <div class="row" id="jobTable">
        <div class="table-responsive">
          <table id="myTable" class="table">
            <thead>
                <th>Job Name</th>
                <th>Minimum Salary</th>
                <th>Maximum Salary</th>
                <th>Experience</th>
                <th>Qualification</th>
                <th>Action</th>
              </thead>
              <tbody>

              </tbody>
          </table>
        </div>
      </div>
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


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"  	crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="//bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
  <script src="//cdn.datatables.net/plug-ins/1.10.15/features/searchHighlight/dataTables.searchHighlight.min.js"></script>
  <script src="assets/js/vendor/bootstrap.min.js"></script>
  <script src="assets/js/wow/wow.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
    $(function() {
      var oTable = $('#myTable').DataTable({
        "autoWidth": false,
        "ajax" : {
          "url" : "refresh_job_search.php",
          "dataSrc" : "",
        "data" : function (d) {
            d.experience = $("#experience").val();
            d.qualification = $("#qualification").val();
          }
        }
      });


      oTable.on('draw',function(){ // draw means update result on every key pressed and highlight
        var body = $(oTable.table().body());

        body.unhighlight();

        body.highlight(oTable.search());

      });

      $("#myForm").on("submit", function(e) {
        e.preventDefault();
        oTable.ajax.reload( null, false);
      })
    });
  </script>  
  <script type="text/javascript">
     $(function(){
      $(".successMessage:visible").fadeOut(2000); //miliseconds of time
     });
   </script> 
</body>
</html>