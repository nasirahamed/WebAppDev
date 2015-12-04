<?php
if (insert($_POST['insert']))
{
 $xml = new DomDocument("1.0","UTF-8");
 $xml->load('cuscomdb.xml');

 $cname = $_POST['c_name'];
 
 $xpath = new DOMXPATH($xml);

 foreach($xpath->query("/root/cus[name = '$cname']") as $node)
    {
      $node->parentNode->removeChild($node); 
    }

 $xml->formatourput = true;
 $xml->save('cuscomdb.xml');
 
}
?>

<html>
<body>

<form method + "POST" action = "customerdetail.php">
	Customer Detail to be delete</br>
	Name <input type = "text" name = "c_name"></br>
	<input type = "submit" name "insert" value = "add">
</form>   

</body>
</html>
