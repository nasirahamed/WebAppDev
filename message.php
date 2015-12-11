<?php require_once 'templates/header.php';?>
<?php
if (isset($_POST['insert']))
{
    $xml = new DomDocument("1.0","UTF-8");
    $xml->load('xml/cusmessages.xml');

    $id = $_POST['id']; 
    $fullname = $_POST['fullname']; 
    $comment = $_POST['comment']; 
    
    $cusmessagesTag = $xml->getElementsByTagName("cusmessages")->item(0);

    $cusmessageTag = $xml->createElement("cusmessage");
    $idTag = $xml->createElement("id", $id);
    $fullnameTag = $xml->createElement("fullname", $fullname);
    $commentTag = $xml->createElement("comment", $comment);

    //Append child element in cusmessage element
    $cusmessageTag->appendChild($idTag);
    $cusmessageTag->appendChild($fullnameTag);
    $cusmessageTag->appendChild($commentTag);

    //Appending all information tag inside root tag
    $cusmessagesTag->appendChild($cusmessageTag);

    $xml->save('xml/cusmessages.xml'); // to save data information into xml >cusmessages.xml
}
?>
<?php //load the xml file content
$get = file_get_contents('xml/cusmessages.xml');
$arr = simplexml_load_string($get);
$cusmessages = $arr->cusmessage;
?>
<!DOCTYPE html>
<html lang="en">
        <head>
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
            <div class="col-md-3">
                <div class="list-group">
                    <a href="add.php" class="list-group-item">Add Furniture</a>
                    <a href="remove.php" class="list-group-item">Remove Furniture by ID</a>
                    <a href="search.php" class="list-group-item">Search Furniture</a>
                    <a href="currentstock.php" class="list-group-item">Current Stock</a>
                    <a href="rss/rss.xml" class="list-group-item" target="_blank"><img src="img/valid-rss-rogers.png"></a>
                </div>
            </div>
            
            <div class="col-md-9">
                  <form class="from-horizontal" role="form" methos="POST" action="message.php">
                  <p class="lead">Add Comment</p>  
                    <div class="form-group">
                      <label class="col-sm-2 control-label">ID#</label>
                      <div class="col-sm-10">
                      <input class="form-control" type="text" name="id" placeholder="Enter ID" required title="Please enter ID">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Full Name</label>
                      <div class="col-sm-10">
                      <input class="form-control" type="text" name="fullname" placeholder="Full Name" required title="Please enter your full name here">
                      </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Your Message</label>
                        <textarea class="form-control" rows="8" name="comment" placeholder="Your Message" required title="Please enter your message here"></textarea>
                  </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                    <button type="submit" id="success" class="btn btn-success" name="insert">Send <span class="glyphicon glyphicon-send"></span></button>
                            </div>
                    </div>
                  
                  </form>
    <br />
    
    <div class="row">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Name</th>
                                    <th>Comment</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php foreach($cusmessages as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id ?></td>
                                            <td><?php echo $row->fullname ?></td>
                                            <td><?php echo $row->comment ?></td>
    <!-- /.container -->
    <div class="container">
        <hr>
        <!-- Footer -->
<footer> <!-- Footer Started -->
	<div class="row">
		<div class="col-lg-12">
		    <p><img src="img/ims_logo.jpg"></p>
			<p>Copyright &copy; Inventory Management System 2016</p>
			<p>designed by <strong>Nasir</strong> & <strong>Nuth</strong></p>
		</div>
	</div>
</footer>
    </div>
    <!-- /.container -->
</body>
</html>
