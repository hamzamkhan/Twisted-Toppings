<?php
  session_start();
  require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
        <script type="text/javascript">
                $(document).ready(function(){
                    $(".drinkSize").change(function(){
                        var name =  $(".drinkSize option:selected").val();
                        if(name!="Select Size"){
                            $(".drinks").attr("required","");
                        }
                        else
                        {
                            $(".drinks").removeAttr("required");
                        }
                    });
                });
        </script>
<body>
    <div class="container-fluid">
            <div class="row" align="center" >
                <?php 
                $query = "SELECT * FROM deals ORDER BY id_deal ASC";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                    <div class="col-lg-4" id="itemRow">
                        <form method="post" action="menu.php?action=add&id=<?php echo $row["id_deal"];?>">
                            <div id="itemsDisplay" class="card" align="center">
                                <img src="uploads/items/<?php echo $row["image"]; ?>" class = "img-responsive" width="150px" height="150px">
                                <h5 class="itemInfo text-info"><?php echo $row["deal_name"]; ?></h5>
                                <h6 class="itemInfo text-info"><?php echo $row["description"]; ?></h6>
                                <h6 class="itemInfo text-info">Rs.<?php echo $row["price"]; ?></h6>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["deal_name"]; ?>">
                                <input type="hidden" name="price_deal" value="<?php echo $row["price"]; ?>">
                                <input class="selectList" type="text" name="quantity"  value="" placeholder="Quantity" required>
                                <select class="select-size form-control selectList" id="pizzaName" name="pizzaName" required="">
                                    <option selected="" value="">Select Pizza Flavor</option>
                                    <?php
                                    $sql2="SELECT * FROM menuitems";
                                    $result2=$conn->query($sql2);
                                    if($result2->num_rows>0) {
                                    while($row2 = mysqli_fetch_array($result2)) {                           
                                    ?>
                                    <option value="<?php echo $row2['name']; ?>"><?php echo $row2['name']; ?></option>
                                    <?php
                                       }
                                    }
                                ?>
                                </select>
                                <!-- SELECT DRINK -->
                                 <select class="drinks select-size form-control selectList"  name="drinks">
                                    <option value="" selected="">Select Drink</option>
                                    <?php
                                    $sql1="SELECT * FROM drinks";
                                    $result1=$conn->query($sql1);
                                    if($result1->num_rows>0) {
                                    while($row1 = mysqli_fetch_array($result1)) {                           
                                    ?>
                                    <option value="<?php echo $row1['name']; ?>"><?php echo $row1['name']; ?></option>
                                    <?php
                                       }
                                    }
                                ?>
                                </select>
                                <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                <?php
                    }
                }

                ?>
            </div>
        </div>
</body>
</html>