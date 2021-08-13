<?php 
require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['username'])) {
	header('location:'.$store_url.'dashboard.php');		
}

$errors = array();

if($_POST) {		

	$email = $_POST['email'];
	$password = $_POST['password'];

	if(empty($email) || empty($password)) {
		if($email == "") {
			$errors[] = "Email is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$result = $connect->query($sql);
		$row = $result -> fetch_row();
		//echo "<pre>"; print_r($row); die('Somendra');

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$username = $value['username'];
				$user_id = $value['user_id'];
				$email = $value['email'];

				// set session
				$_SESSION['username'] = $username;
				$_SESSION['user_id'] = $user_id;
				$_SESSION['email'] = $email;
				
				//echo "<pre>"; print_r($_SESSION); die('Somendra123456');

				header('location:'.$store_url.'dashboard.php');	
			} else{
				
				$errors[] = "Incorrect email/password combination";
			} // /else
		} else {		
			$errors[] = "Email does not exists";		
		} // /else
	} // /else not empty email // password
	
} // /if $_POST
?>

<!DOCTYPE html>
<head>
<title>Prabha ArtLife Billing System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>

<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->

<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 

<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>

<!-- custom css -->
<link rel="stylesheet" href="custom/css/custom.css">	

<!-- jquery -->
<script src="assests/jquery/jquery.min.js"></script>
<!-- jquery ui -->  
<link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
<script src="assests/jquery-ui/jquery-ui.min.js"></script>

<!-- bootstrap js -->
<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>
<div class="log-w3" >
	<div class="w3layouts-main" style="background-color:#130f0340;">
		<h2 style="color:white;">Sign In Now</h2>
				
			<div class="messages">
				<?php if($errors) {
					foreach ($errors as $key => $value) {
						echo '<div class="alert alert-warning" role="alert">
						<i class="glyphicon glyphicon-exclamation-sign"></i>
						'.$value.'</div>';										
						}
					} ?>
			</div>
			
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">									
				<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
				<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
					<div class="clearfix"></div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-log-in" style="color:white"></i> Sign in</button>
					</div>
			</form>
	</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.scrollTo.js"></script>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
