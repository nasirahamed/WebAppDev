<?php require_once 'templates/header.php';?>
<!DOCTYPE html>
<html lang="en">
        <head> <!-- This part was left for Nuth to finish -->
            <title>Send Message</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="IMS, Inventory Management System">
        	<meta name="author" content="inventory, inventory, furniture, IMS">
        	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> <!-- Latest compiled and minified CSS -->
        	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"> <!-- Optional theme -->
        	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"> <!-- Latest jQuery Smoothness library -->
            <link href="css/custom.css" rel="stylesheet"> <!-- Custom CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
        	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script><!-- Latest jQuery library -->
        	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> <!-- Latest jQuery UI library -->
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </head>
<body oncontextmenu="return false">
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
                <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-home"></span> IMS</a>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="message.php">Message</a></li>
                        <!-- <li><a href="#">Another Link</a></li> -->
                    </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                                <li><a href="account.php">My Account</a></li>
                                <li><a href="changepassword.php">Change Password</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="logout.php">Sign out</a></li>
                        </ul>
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
            <div class="col-md-3">
                <div class="list-group">
                    <a href="add.php" class="list-group-item">Add Furniture</a>
                    <a href="remove.php" class="list-group-item">Remove Furniture by ID</a>
                    <a href="search.php" class="list-group-item">Search Furniture</a>
                    <a href="currentstock.php" class="list-group-item">Current Stock</a>
                    <a href="rss/rss.xml" class="list-group-item" target="_blank"><img src="img/valid-rss-rogers.png"></a>
                </div>
            </div>
            
            <div class="col-md-6">
                  <form role="form" onsubmit="return(login())">
                    
                    <div class="form-group">
                      <!-- <label for="First Name"></label> -->
                      <input type="text" class="form-control" id="first" placeholder="First Name" required title="First Name cannot be empty">
                    </div>
                    
                    <div class="form-group">
                      <!-- <label for="Last Name"></label> -->
                      <input type="text" class="form-control" id="last" placeholder="Last Name" required title="Last Name cannot be empty">
                    </div>  
                    <div class="form-group">
                        <!-- <label for="Your Message"></label> -->
                        <textarea class="form-control" rows="8" id="comment" placeholder="Your Message" required title="Message cannot be empty"></textarea>
                    </div>
                    
                    <button type = "submit" class="btn btn-primary" name="insert">Send
                    <span class="glyphicon glyphicon-send"></span>
                    </button>
                  </form>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <div class="container">
        <hr>
	<div class="row"><!-- Footer Started -->
		<div class="col-lg-12">
		    <p><img src="img/ims_logo.jpg"></p>
			<p>Copyright &copy; Inventory Management System 2016</p>
			<p>designed by <strong>Nasir</strong> & <strong>Nuth</strong></p>
		</div>
	</div><!-- Footer Ended -->
    </div>
    <!-- /.container -->
</body>
</html>