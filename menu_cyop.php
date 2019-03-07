<?php
  session_start();
  require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<form method="POST" action="menu.php?action=add">
			<div class="col-lg-4 cyop_form" id="itemRow">
				<h4>Select Crust</h4>		
				<fieldset id="crust">
				    <input type="radio" value="Original" name="crust"> Original<br>
				    <input type="radio" value="Xtreme" name="crust"> Xtreme<br>
				    <input type="radio" value="Thinza" name="crust"> Thinza<br>
				    <input type="radio" value="Unrolled" name="crust"> Unrolled<br>
				</fieldset>
				<hr style="border-top: dotted 1px;" />
				<h4>Select Size</h4>
				<fieldset id="size">
				    <input type="radio" value="Small" name="size"> Small<br>
				    <input type="radio" value="Regular" name="size"> Regular<br>
				    <input type="radio" value="Large" name="size"> Large<br>
				    <input type="radio" value="Jumbo" name="size"> Jumbo<br>
				</fieldset>
				<hr style="border-top: dotted 1px;" />
				<h4>Select Flavor</h4>
				<fieldset id="flavor">
					<?php
					$query="SELECT * FROM menuitems ORDER BY id_item ASC";
					$result = mysqli_query($conn,$query);
				    if(mysqli_num_rows($result) > 0)
				    {
				        while($row = mysqli_fetch_array($result))
				        {
				    ?>
				    <input type="radio" value="<?php echo $row["name"]; ?>" name="flavor"> <?php echo $row["name"]; ?><br>
				    <?php
						}
					}
					?>
				</fieldset>
				<hr style="border-top: dotted 1px;" />
			</div>
			<div class="col-lg-4  cyop_form" id="itemRow">
				<h4>Select Sauce</h4>
				<fieldset id="sauce">
				    <input type="radio" value="Mild" name="sauce"> Mild<br>
				    <input type="radio" value="Hot" name="sauce"> Hot<br>
				    <input type="radio" value="Extra Hot" name="sauce"> Extra Hot<br>
				</fieldset>
				<hr style="border-top: dotted 1px;" />
				<h4>Select Veggies</h4>
				<fieldset id="veggies">
					<input type="checkbox" name="veggies[]" value="Onions"> Onions<br>
					<input type="checkbox" name="veggies[]" value="Tomatoes"> Tomatoes<br>
					<input type="checkbox" name="veggies[]" value="Capsicum"> Capsicum<br>
					<input type="checkbox" name="veggies[]" value="Jalapenos"> Jalapenos<br>
					<input type="checkbox" name="veggies[]" value="Mushrooms"> Mushrooms<br>
					<input type="checkbox" name="veggies[]" value="Olives"> Olives<br>
					<input type="checkbox" name="veggies[]" value="Green Chilli"> Green Chilli
			 	</fieldset>
			 	<hr style="border-top: dotted 1px;" />
			 	Quantity : <input type="number" class="franchiseFormInput" name="quantity" value="" required>
			 	
		 	</div>
		 	<input class="btn btn-success" type="submit" name="add_to_cart" value="Add To Cart">
		</form>
	</div>
</body>
</html>