<?php require_once 'templates/header.php';?>
<!DOCTYPE html>
<html lang="en">
			<head>
				<title>Search Furniture</title>
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
                <script type="text/javascript" src="js/search.js"></script> <!-- Ajax Search -->
                <style type="text/css" src="css/search.css"></style> <!-- Search Form Style Sheet -->
            </head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                        <a href="logout.php">Signout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">  <!-- container start -->
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="add.php" class="list-group-item">Add Furniture</a>
                    <a href="remove.php" class="list-group-item">Remove Furniture by ID</a>
                    <a href="search.php" class="list-group-item">Search Furniture</a>
                    <a href="currentstock.php" class="list-group-item">Current Stock</a>
                    <a href="rss/rss.xml" class="list-group-item" target="_blank"><img src="img/rss.gif" width="36" height="14"></a>
                </div>
            </div>

            <p class="lead">Search Furniture by Name</p>
            <div id="custom-search-input">
                <div class="input-group col-md-6">
                    <input id="test" type="text" class="search-query form-control" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="container">
                <br>
                <p id="result" class="text-success"></p>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.container ends -->
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