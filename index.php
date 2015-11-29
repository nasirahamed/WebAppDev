<?php 
if (isset($_POST['insert']))
{
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('furnitures.xml');

	$cname = $_POST['id']; //Holding the value for furniture id
	$cname = $_POST['name']; //Holding the value for furniture id

	$rootTag = $xml->getElementsByTagName("root")->item(0);

	$infoTag = $xml->createElement("info");
		$nameTag = $xml->createElement("name", $cname);
		$addTag = $xml->createElement("address", $hadd);

		$infoTag->appendChild($nameTag);
		$infoTag->appendChild($addTag);

	$rootTag->appendChild($infoTag);
	$xml->save('studentdb.xml'); 
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
			Furniture ID: <input type = "text" name = "id"><br />
			Furniture Name: <input type = "text" name = "name"><br />
			Type: <input type = "text" name = "name"><br />
			Color: <input type = "text" name = "name"><br />
			Price <input type = "text" name = "name"><br />
			<input type = "submit" name="insert" value="add">
			</form>
		</body>

</div>
</body>
</html>