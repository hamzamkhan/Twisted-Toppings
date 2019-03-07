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
                $query = "SELECT * FROM menuitems ORDER BY id_item ASC";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                    <div class="col-lg-3" id="itemRow">
                        <form method="post" action="menu.php?action=add&id=<?php echo $row["id_item"];?>">
                            <div id="itemsDisplay" class="card" align="center">
                                <img src="uploads/items/<?php echo $row["image"]; ?>" class = "img-responsive" width="150px" height="150px">
                                <h5 class="itemInfo text-info"><?php echo $row["name"]; ?></h5>
                                <select class="select-size form-control" name="price" required="">
                                    <option value="" selected="">Select Size</option>
                                    <option value="<?php echo $row["price_small"];?>">Rs.<?php echo $row['price_small']; ?> (Small)</option>
                                    <option value="<?php echo $row["price_regular"];?>">Rs.<?php echo $row['price_regular']; ?> (Regular)</option>
                                    <option value="<?php echo $row["price_large"];?>">Rs.<?php echo $row['price_large']; ?> (Large)</option>
                                    <option value="<?php echo $row["price_jumbo"];?>">Rs.<?php echo $row['price_jumbo']; ?> (Jumbo)</option>
                                </select>
                                
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input class="selectList" type="text" name="quantity"  value="" placeholder="Quantity" required>
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
                                <!-- SELECT DRINK SIZE -->
                                <select  class="drinkSize form-control select-size selectList" name="drinkSize">
                                  <option value="50" selected="">Pet</option>
                                  <option value="70" >Large</option>
                                  <option value="110" >Jumbo</option>
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