<?php 
if (isset($_POST['insert']))
{
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('xml/furnitures.xml');

	$id = $_POST['id']; //Holding the value for furniture id
	$name = $_POST['name']; //Holding the value for furniture name
	$type = $_POST['type']; //Holding the value for furniture type
	$color = $_POST['color']; //Holding the value for furniture color
	$price = $_POST['price']; //Holding the value for furniture price

	$furnituresTag = $xml->getElementsByTagName("furnitures")->item(0);

	$furnitureTag = $xml->createElement("furniture");
		$idTag = $xml->createElement("id", $id);
		$nameTag = $xml->createElement("name", $name);
		$typeTag = $xml->createElement("type", $type);
		$colorTag = $xml->createElement("color", $color);
		$priceTag = $xml->createElement("price", $price);
		
			//Appending the child element in the furniture element start here
			$furnitureTag->appendChild($idTag);
			$furnitureTag->appendChild($nameTag);
			$furnitureTag->appendChild($typeTag);
			$furnitureTag->appendChild($colorTag);
			$furnitureTag->appendChild($priceTag);
			//Appending the child element in the furniture element ends here
	
	//Appending the all furniture tag inside furnitures(root) tag starts
	$furnituresTag->appendChild($furnitureTag);
	//Appending the all furniture tag inside furnitures(root) tag starts
	
	$xml->save('xml/furnitures.xml'); //Writing content in the furnitures.xml file
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Navbar Static top Template</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<div class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Inventory Management System</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="remove.php">Remove Inventory</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">About</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container">
  
  <div class="text-center">
    <h1>Bootstrap starter template</h1>
    
    		<body>
			<form method="POST" action="index.php">
			<strong>Add Furniture</strong> <br />
			ID: <input type = "text" name = "id"><br />
			Name: <input type = "text" name = "name"><br />
			Type: <input type = "text" name = "type"><br />
			Color: <input type = "text" name = "color"><br />
			Price <input type = "text" name = "price"><br />
			<input type = "submit" name="insert" value="Add to Stock">
			</form>
		</body>

  </div>
  
</div><!-- /.container -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>