<?php require_once 'templates/header.php';?>
<?php
//Code extracted and modified from https://www.youtube.com/watch?v=z_m33GhTecA
//Code extracted and modified from https://www.youtube.com/watch?v=CBmB2fc0IUM
require 'simplexml.class.php';
$furnitures = simplexml_load_file('xml/furnitures.xml');
if(isset($_POST['insert'])){
    foreach ($furnitures->furniture as $furniture) {
        if($furniture->id == $_POST['id']){ //if($furniture['id'] == $_POST['id']) I am not posting anything in the ID
            $furniture->name = $_POST['name'];
            $furniture->type = $_POST['type'];
            $furniture->color = $_POST['color'];
            $furniture->price = $_POST['price'];
            break;
        }
    }
    file_put_contents('xml/furnitures.xml', $furnitures->asXML());
    header('location: add.php');
}
    foreach ($furnitures->furniture as $furniture) {
        if($furniture->id == $_GET['id']) { //if($furniture['id'] == $_GET['id'])
            $id = $furniture->id;
            $name = $furniture->name;
            $type = $furniture->type;
            $color = $furniture->color;
            $price = $furniture->price;
            break;
    }
} //Edit ends here
?>
<!DOCTYPE html>
<html lang="en">
        <head>
            <title>Edit Furniture</title>
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

            <div class="col-md-9">

            <form class="form-horizontal" role="form" method="POST" action="edit.php">
            <p class="lead">Edit Furniture</p>
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Furniture#</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="id" value="<?php echo $id; ?>" readonly="readonly"></input>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" placeholder="Name" required title="Name cannot be empty" value="<?php echo $name; ?>">
                            </div>
                    </div>              

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="type" placeholder="Type" required title="Type cannot be empty" value="<?php echo $type; ?>">
                            </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Color</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="color" placeholder="Color" required title="Color cannot be empty" value="<?php echo $color; ?>">
                            </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="price" placeholder="Price" required title="Price cannot be empty" value="<?php echo $price; ?>">
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <button type = "submit" class="btn btn-primary" name="insert">Save</button>
                            </div>
                    </div>
            </form>
            <br />
                <div class="row">
                </div>
            </div>
        </div>
    </div>
<div class="container"> <!-- start footer container -->
	<hr>
	<div class="row"><!-- Footer Started -->
		<div class="col-lg-12">
		    <p><img src="img/ims_logo.jpg"></p>
			<p>Copyright &copy; Inventory Management System 2016</p>
			<p>designed by <strong>Nasir</strong> & <strong>Nuth</strong></p>
		</div>
	</div><!-- end of footer container -->
</div> 
<script type="text/javascript">
    // Prevent accidental navigation away starts
    setConfirmUnload(true);
    function setConfirmUnload(on)
    {
        window.onbeforeunload = on ? unloadMessage : null;
    }
    function unloadMessage()
    {
        return 'Are you sure, you do not want edit Furniture';
    }
    $(document).on('click', 'button:submit',function(){
        setConfirmUnload(false);
    });
    // Prevent accidental navigation away ends
</script>
</body>

</html>