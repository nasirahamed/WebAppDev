<?php 
ob_start();
session_start();
require_once 'config.php'; 
?>
<?php 
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->login( $_POST );
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
				$_SESSION['success'] = 'Logged In Successfully!';
				header('Location: home.php');exit;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			$_SESSION['error'] = $error;
		}
	}
	//print_r($_SESSION);
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		header('Location: home.php');exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
    <title>IMS Login!</title>
	<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
	<script src="js/bootstrap.min.js"></script>
	<script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js'></script>
  </head>
  <body oncopy="return false;" onpaste="return false;" oncut="return false;">
	<div class="container">

		<div class="login-form">
			<?php require_once 'templates/message.php';?>

			<div class="form-header">
				<img src="img/ims_logo.jpg" />
				<!-- <i class="fa fa-user"></i> -->
			</div>
			<form id="login-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input name="email" id="email" type="email" class="form-control" placeholder="Email address" autofocus> 
				<input name="password" id="password" type="password" class="form-control disable" placeholder="Password"> 
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
			<div class="form-footer">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">	
						<i class="fa fa-lock"></i>
						<a href="forget_password.php"> Forgot password? </a>
					
					</div>
					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-check"></i>
						<a href="register.php"> Sign Up </a>
					</div>
				</div>
			</div>
			<!--<div class="text-center well">-->
			<div class="well">
				<strong>Demo ID:</strong> guest@guest.com <strong>|</strong> <strong>Demo Password:</strong> 123
			</div>

		</div>
	</div>
	<script>
   $('document').ready(function(){
       $("#mailForm").validate({
			     rules: {
					name: {
					   required: true,
					   minlength : 3,
					   remote: "ajax_unique.php?data=name"
					},
					email:{ 
					   required: true,
					   email: true,
					   remote: "ajax_unique.php?data=email"
					}
			     },
			     messages: {
						name: {
						   required:"Please enter your name",
						   minlength: "Please enter a minimun 3 chars",
						   remote: "Username is already exists"
						},
						email:{ 
						   required: "Please enter your email",
						   email: "Please enter a valid email address",
						   remote: "Email is already exists"
						}
			     },
				 debug: true,
				 errorElement: "em",
				 errorContainer: $("#warning, #summary"),
				 errorPlacement: function(error, element) {
					error.appendTo( element.parent("td").next("td") );
				 },
				 success: function(label) {
					label.text("ok!").addClass("success");
				 }	
		});		 
   });
</script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>    