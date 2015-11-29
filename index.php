<?php 
if (isset($_POST['insert']))
{
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('studentdb.xml');

	$cname = $_POST['c_name']; //
	$hadd = $_POST['h_add'];

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
<html>
<head>
	<title></title>
</head>


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
			<form method="POST" action="index.php">
			Stud Info <br />
			Fname <input type = "text" name = "c_name"><br />
			Address <input type="text" name="h_add"><br />
			<input type = "submit" name="insert" value="add">
			</form>
		</body>

        
</div>
    
    
</body>
</html>