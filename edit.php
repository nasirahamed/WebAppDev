<?php
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
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
                        <a href="contactus.php">Contact Us</a>
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
                </div>
            </div>

            <div class="col-md-9">

            <form class="form-horizontal" role="form" method="POST" action="edit.php">
            <p class="lead">Edit Furniture</p>
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Furniture#</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="id" value="<?php echo $id; ?>" readonly=""></input>
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
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Inventory Management System 2016</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
</body>

</html>