<?php require_once 'templates/header.php';?>
<?php
//Inline delete starts here
//Code extracted and modified from https://www.youtube.com/watch?v=z_m33GhTecA
require 'simplexml.class.php';
if (isset($_GET['action'])) {
	$furnitures = simplexml_load_file('xml/furnitures.xml');
	$id = $_GET['id'];
	$index = 0;
	$i = 0;
	foreach ($furnitures->furniture as $furniture) {
		if($furniture->id==$id) {
			$index = $i;
			break;
		}
		$i++;
	}
	unset($furnitures->furniture[$index]);
	file_put_contents('xml/furnitures.xml', $furnitures->asXML());
}
$furnitures = simplexml_load_file('xml/furnitures.xml');
//In line delete ends here
?>
<?php
if (isset($_POST['insert']))
{
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('xml/furnitures.xml');

	$id = $_POST['id']; 
	$name = $_POST['name']; 
	$type = $_POST['type']; 
	$color = $_POST['color']; 
	$price = $_POST['price'];

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

	//Appending the all furniture tag inside furnitures(root) tag starts here
	$furnituresTag->appendChild($furnitureTag);
	//Appending the all furniture tag inside furnitures(root) tag ends here

	$xml->save('xml/furnitures.xml'); //Writing/Saving the content in the furnitures.xml file
}
?>
<?php //loading the xml file content
$get = file_get_contents('xml/furnitures.xml');
$arr = simplexml_load_string($get);
$furnitures = $arr->furniture;
?>
<!DOCTYPE html>
<html lang="en">
			<head>
				<title>Add Furniture</title>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="inventory, inventory, furniture, IMS">
				<link href="css/custom.css" rel="stylesheet"> <!-- Custom CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> <!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"> <!-- Optional theme -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script><!-- Latest jQuery library -->
				<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> <!-- Latest jQuery UI library -->
				<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"> <!-- Latest jQuery Smoothness library -->
			
	
	<script type="text/javascript">
	/*
		$(document).ready(function () {
		$('#success').click(function (e) {
		  $('#message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>Inventory Added Successfully</div>');
		});
		
		$('#info').click(function (e) {
		 // e.preventDefault();
		  $('#message').html('<div class="alert alert-info fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>This is a info message</div>');
		});
		
		$('#warning').click(function (e) {
		  //e.preventDefault();
		  $('#message').html('<div class="alert alert-warning fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>This is a warning message</div>');
		});
		
		$('#danger').click(function (e) {
		  //e.preventDefault();
		  $('#message').html('<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>This is a error message</div>');
		});
		});
	*/
</script>
	</head>
<body>
<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container"><!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			</button>
				<a class="navbar-brand" href="index.php">Inventory Management System</a>
			</div>
		
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
			<ul class="nav navbar-nav">
				<li>
	                        <a href="account.php">My Account</a>
	                    </li>
	                    
	                    <li>
	                        <a href="changepassword.php">Change Password</a>
	                    </li>
	                    
	                    <li>
	                        <a href="message.php">Send Message</a>
	                    </li>
	                    
	                    <li>
	                        <a href="logout.php">Sign out</a>
	                    </li>
			</ul>
			</div>
		<!-- /.navbar-collapse -->
			
		</div>
		<!-- /.container -->
		
	</nav>

<!-- Page Content -->
<div class="container">
	<div class="row">
			<div class="col-md-3"> <!-- Column 3 for the left bar-->
				<div class="list-group">
					<a href="add.php" class="list-group-item">Add Furniture</a>
					<a href="remove.php" class="list-group-item">Remove Furniture by ID</a> 
					<a href="search.php" class="list-group-item">Search Furniture</a> 
					<a href="currentstock.php" class="list-group-item">Current Stock</a>
					<a href="rss/rss.xml" class="list-group-item" target="_blank"><img src="img/rss.gif" width="36" height="14"></a>
				</div>
			</div>
	<div class="col-md-9"> <!-- Column 9 for the right part -->
			<form class="form-horizontal" role="form" method="POST" action="add.php">
					<p class="lead">Add Furniture</p> <!-- Add furniture title in the form -->
						<div class="form-group">
							<label class="col-sm-2 control-label">Furniture#</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="id" placeholder="Furniture ID" required title="Please type furniture ID">
								</div>
						</div>
			
						<div class="form-group">
							<label class="col-sm-2 control-label">Name</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="name" placeholder="Name" required title="Please enter the Furniture name">
								</div>
						</div>
			
						<div class="form-group">
							<label class="col-sm-2 control-label">Type</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="type" placeholder="Type" required title="What type of furniture it is?">
								</div>
						</div>
			
						<div class="form-group">
							<label class="col-sm-2 control-label">Color</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="color" placeholder="Color" required title="Type the color of your furniture">
								</div>
						</div>
			
						<div class="form-group">
							<label class="col-sm-2 control-label">Price</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="price" placeholder="Price" required title="Price cannot be left empty">
								</div>
						</div>
			
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
									<button type="submit" id="success" class="btn btn-success" name="insert">Add <span class="glyphicon glyphicon-plus-sign"></span></button>
								</div>
						</div>
						<div id="message"></div>
			</form>
	<br />
				<div class="row">
					<table class="table table-striped">
							<thead>
								<tr>
									<th>ID#</th>
									<th>Name</th>
									<th>Type</th>
									<th>Color</th>
									<th style="text-align: right;">Price</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
									<?php foreach($furnitures as $row) {
									?>
										<tr>
											<td><?php echo $row->id ?></td>
											<td><?php echo $row->name ?></td>
											<td><?php echo $row->type ?></td>
											<td><?php echo $row->color ?></td>
											<td style="text-align: right;"><?php echo '€'.$row->price.'.00' ?></td>
											
											<td style="width: 25px; text-align: center;">
												<a href="edit.php?id=<?php echo $row->id; ?>">
												<button class="btn btn-primary btn-xs">
													<span class="glyphicon glyphicon-pencil"></span>
												</button>
												</a>
											</td>
											
											<td style="width: 25px; text-align: center;">
												<a href="add.php?action=delete&id=<?php echo $row->id; ?>" onclick="return confirm('Are you sure, you want to delete it?')">
												<button class="btn btn-danger btn-xs" style="color: #fff; background-color: #d9534f; border-color: #d43f3a;">
													<span class="glyphicon glyphicon-trash"></span>
												</button>
												</a>
											</td>
										</tr>
										<?php
									}
									?>
							</tbody>
					</table>
				</div>
		</div>
	</div>
</div> <!-- end of container -->

<div class="container"> <!-- start footer container -->
	<hr>
		<footer> <!-- Footer Started -->
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; Inventory Management System 2016</p>
					<p>designed by Nasir</p>
				</div>
			</div>
		</footer>
</div> <!-- end of footer container -->
</body>
</html>