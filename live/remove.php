<?php 
if (isset($_POST['insert']))
{
    $xml = new DomDocument("1.0","UTF-8");
    $xml->load('states.xml'); //loading the furnitures.xml file

    $id = $_POST['id'];

    $xpath = new DOMXPATH($xml);

    foreach($xpath->query("/furnitures/furniture[id = '$id']") as $node) 
        {
            $node->parentNode->removeChild($node);
        }
    $xml->formatoutput = true;
    $xml->save('states.xml'); 
}
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
                    <a href="remove.php" class="list-group-item">Remove Furniture</a>
                    <a href="search.php" class="list-group-item">Search Furniture</a>
                    <a href="currentstock.php" class="list-group-item">Current Stock</a>
                </div>
            </div>

            <div class="col-md-9">

           
            <form class="form-horizontal" role="form" method="POST" action="remove.php">
            <p class="lead">Remove Furniture</p>

            <div class="form-group">
                    <label class="col-sm-2 control-label">FurnitureID#</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="id">
                        </div>
            </div>

            <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type = "submit" class="btn btn-warning" name="insert">Remove Stock </button>
                        </div>
            </div>            

            </form>
            
            <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Color</th>
                                <th>Price</th>
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
                                <td><?php echo $row->price ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

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

    <!-- jQuery -->


</body>

</html>