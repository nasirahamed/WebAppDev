<?php 
ob_start();
session_start();
error_reporting(0);
require_once 'config.php'; 
$url=strtok($_SERVER["REQUEST_URI"],'?');
$url_arr = explode("/", $url);

if(!isset($_SESSION['logged_in']) && !in_array("quiz-result", $url_arr)){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Quiz Application</title>
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    
    <?php 
    	
    	if (in_array("quiz-result", $url_arr)){
    ?>
    <?php } ?>
    
    
  </head>
 <body>

    <!-- Static navbar -->
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse"
					data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			</div>
			<?php 
			$arr = explode("/",$_SERVER['REQUEST_URI']);
			$uri = end( $arr ); 
			?>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li <?php if($uri == 'home') echo "class='active'"; ?>><a href="home.php">Home</a></li>
					<li <?php if($uri == 'quiz-results') echo "class='active'"; ?>><a href="quiz-results.php">Quiz Results</a></li>
					<li <?php if($uri == 'start-quiz') echo "class='active'"; ?>><a href="start-quiz.php">Start New Quiz</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Hello 
							
						<?php if(isset( $_SESSION['logged_in']) ) { ?>
							<?php echo $_SESSION['name']; ?>
							<span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu">
							<li> <a href="account.php">My Account</a> </li>
							<li class="divider"></li>
							<li style="background: #e67e22; color:#fff"> <a href="logout.php">Signout</a> </li>
						</ul>
						<?php }else{ ?>
						</a>
						<?php }?>
					</li>
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	