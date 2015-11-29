<?php 
if (isset($_POST['insert']))
{
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('xml/furnitures.xml'); //loading the furnitures.xml file

	$id = $_POST['id'];

	$xpath = new DOMXPATH($xml);

	foreach($xpath->query("/furnitures/furniture[id = '$id']") as $node) 
		{
			$node->parentNode->removeChild($node);
		}
	$xml->formatoutput = true;
	$xml->save('xml/furnitures.xml'); 
}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="remove.php">
	Remove Furniture by ID<br />
	Enter ID #: <input type = "text" name = "id"><br />
	<input type = "submit" name="insert" value="delete">
	</form>
</body>