<link rel="shortcut icon" href="favicon.ico"/>
<link rel="icon" type="image/png"  href="images/favicon.png">

<?php include 'php_action/core.php'; ?>

<?php 
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$query = $connect->query($sql) or die($connect->error);
$result = $query->fetch_assoc();

$connect->close();
?>

<section id="container">

<!--header start-->
	<?php  include 'header.php';?>
<!--header end-->

<!--sidebar start-->
	<?php  include 'sidebar.php';?>
<!--sidebar end-->

<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				<li><a href="dashboard.php">Home</a></li>		  
				<li class="active">Setting</li>
				</ol>
		
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Setting</div>
					</div> <!-- /panel-heading -->
		
					<div class="panel-body">
				
						<form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
							<fieldset>
								<legend>Change Username</legend>
		
								<div class="changeUsenrameMessages"></div>			
		
								<div class="form-group">
								<label for="username" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="username" name="username" placeholder="Usename" value="<?php echo $result['username']; ?>"/>
								</div>
							</div>
		
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
								<button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
								</div>
							</div>
							</fieldset>
						</form>
		
						<form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
							<fieldset>
								<legend>Change Password</legend>
		
								<div class="changePasswordMessages"></div>
		
								<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Current Password</label>
								<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
								</div>
							</div>
		
							<div class="form-group">
								<label for="npassword" class="col-sm-2 control-label">New password</label>
								<div class="col-sm-10">
								<input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
								</div>
							</div>
		
							<div class="form-group">
								<label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
								<div class="col-sm-10">
								<input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
								</div>
							</div>
		
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
								<button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
								
								</div>
							</div>
		
		
							</fieldset>
						</form>
		
					</div> <!-- /panel-body -->		
		
				</div> <!-- /panel -->		
			</div> <!-- /col-md-12 -->	
		</div> <!-- /row-->

</section>

 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2020 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts | Developed by <a href="https://knightcoders.in">Knightcoders</a></p>
			</div>
		  </div>
  <!-- / footer -->
  
</section>
<!--main content end-->

</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.scrollTo.js"></script>

<script src="custom/js/setting.js"></script>
