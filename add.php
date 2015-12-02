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

    $id = $_POST['id']; //Holding the value for furniture id
    $name = $_POST['name']; //Holding the value for furniture name
    $type = $_POST['type']; //Holding the value for furniture type
    $color = $_POST['color']; //Holding the value for furniture color
    $price = $_POST['price']; //Holding the value for furniture price

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

            <form class="form-horizontal" role="form" method="POST" action="add.php" onsubmit="return(login())">
            <p class="lead">Add Furniture</p>
                
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
                                <button type = "submit" class="btn btn-primary" name="insert">Add</button>
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
                                    <a href="edit.php?id=<?php echo $furniture['id']; ?>">
                                        <button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>
                                    </a>
                                </td>
                                <td style="width: 25px; text-align: center;">
                                    <a href="add.php?action=delete&id=<?php echo $furniture['id']; ?>" onclick="return confirm('Are you sure, you want to delete it?')">
                                        <button class="btn btn-danger btn-xs" style="color: #fff; background-color: #d9534f; border-color: #d43f3a;"><span class="glyphicon glyphicon-trash"></span></button>
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