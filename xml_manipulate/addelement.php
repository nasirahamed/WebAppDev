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