<?php
if (isset($_POST['insert']))
{
 $xml = new DomDocument("1.0","UTF-8");
 $xml->load('customberdetail.xml');

 $cname = $_POST['c_name'];
 $htelephone = $_POST['h_telephone'];

 $rootTag = $xml->getElementByTagName("roo")->item(0);

 $infoTag = $xml->createElement("info");
 $nameTag = $xml->createElement("name",$cname);
 $numberTag = $xml->createElement("telephone",$htelephone);

    $infoTag->appendChild($nameTag);
    $infoTag->appendChild($telephoneTag);
    
    $rootTag->appendChild($infoTag);
    $xml->save('cuscomdb.xml');
}
?>
<html>
<body>

<form method = "POST" action = "customerdetail.php">
	Customer Details</br>
	Name <input type = "text" name = "c_name"></br>
	Telephone <input type = "text" number = "h_telephone"></br>
	<input type = "submit" name "insert" value = "add">
</form>   

</body>
</html>
