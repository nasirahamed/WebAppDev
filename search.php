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


    <!-- Ajax Search starts-->

    <!-- Ajax Search-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $.ajax({
            url: "xml/furnitures.xml", //your url
            type: "GET", //may not need this-fiddle did-default is GET
            dataType: "xml",
            //should not need to define 'data' on your own xml call
            //This code was extracted from http://jsfiddle.net/jensbits/PekQZ/light/ then altered
            success: function(xmlResponse) {
                console.log(xmlResponse);
                var data = $("furniture", xmlResponse).map(function() {
                    return {
                        value: $("name", this).text() + ", " + ($.trim($("type", this).text()) || "(unknown type)"),
                        id: $("id", this).text()
                    };
                }).get();
                $("#test").autocomplete({
                    source: function(req, response) {
                        var re = $.ui.autocomplete.escapeRegex(req.term);
                        console.log(re);
                        var matcher = new RegExp("^" + re, "i");
                        response($.grep(data, function(item) {
                            return matcher.test(item.value);
                        }));
                    },
                    minLength: 2,
                    select: function(event, ui) {
                        $("p#result").html(ui.item ? "Selected: " + ui.item.value + ", geonameId: " + ui.item.id : "Nothing selected, input was " + this.value);
                    }
                });
            }
        });
    </script>
    <style type="text/css">
        .red {
            color: red
        }
    </style>
    <style type="text/css">
        #custom-search-input {
            margin: 0;
            margin-top: 10px;
            padding: 0;
        }
        
        #custom-search-input .search-query {
            padding-right: 3px;
            padding-right: 4px;
            padding-left: 3px;
            padding-left: 4px;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        
        #custom-search-input button {
            border: 0;
            background: none;
            /** belows styles are working good */
            padding: 2px 5px;
            margin-top: 2px;
            position: relative;
            left: -28px;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            color: #D9230F;
        }
        
        .search-query:focus + button {
            z-index: 3;
        }
    </style>


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

            <p class="lead">Search Furniture by Name</p>
            <div id="custom-search-input">
                <div class="input-group col-md-6">
                    <input id="test" type="text" class="search-query form-control" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button">
                            <span class=" glyphicon glyphicon-search"></span>
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
