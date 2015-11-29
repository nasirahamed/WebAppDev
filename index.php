<?php 
if (isset($_POST['insert']))
{
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('furnitures.xml');

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
		$colorTag = $xml->createElement("color", $id);
		$priceTag = $xml->createElement("price", $price);
		
			//Appending the child element in the furniture element start here
			$furnitureTag->appendChild($idTag);
			$furnitureTag->appendChild($nameTag);
			$furnitureTag->appendChild($typeTag);
			$furnitureTag->appendChild($colorTag);
			$furnitureTag->appendChild($priceTag);
			//Appending the child element in the furniture element ends here
	
	//Appending the all furniture tag inside furnitures(root) tag starts
	$rootTag->appendChild($infoTag);
	//Appending the all furniture tag inside furnitures(root) tag starts
	
	$xml->save('xml/furnitures.xml'); //Writing content in the furnitures.xml file
}
?>
<!DOCUMENT html>
<html lang="en">
    <head>
        <title>Inventory Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>

<body>
    
<div class="container-fluid">

		<body>
			<form method="POST" action="xml_manipulate/addelement.php">
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
</body>
</html>