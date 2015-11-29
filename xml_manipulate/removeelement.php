<?php 
if (isset($_POST['insert']))
{
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('studentdb.xml');

	$cname = $_POST['c_name'];

	$xpath = new DOMXPATH($xml);

	foreach($xpath->query("/root/info[name = '$cname']") as $node) 
		{
			$node->parentNode->removeChild($node);
		}
	$xml->formatoutput = true;
	$xml->save('studentdb.xml'); 

}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="deletexml.php">
	Stud Info to be deleted<br />
	Enter Name <input type = "text" name = "c_name"><br />
	<input type = "submit" name="insert" value="delete">
	</form>
</body>