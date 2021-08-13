<link rel="shortcut icon" href="favicon.ico"/>
<link rel="icon" type="image/png"  href="images/favicon.png">

<?php include 'php_action/export.php'?>

<?php include 'php_action/import.php'?>

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
			<div style="background-color:white;">
				<div class="container" style="margin-left:20px;">
					<div class="row">
					<br />
						<form method="post" id="export_form">
							<h3>Select Tables for Export</h3>
							<?php
							foreach($result as $table)
							{
							?>
							<div class="checkbox">
								<label><input type="checkbox" class="checkbox_table" name="table[]" value="<?php echo $table["Tables_in_myinvoice"]; ?>" /> <?php echo $table["Tables_in_myinvoice"]; ?></label>
							</div>
							<?php
							}
							?>
								<div class="form-group">
									<input type="submit" name="submit" id="submit" class="btn btn-info" value="Export" />
								</div>
						</form>
					</div>
				</div>
	
	<br /><br />  
	   
			<div class="container" style="margin-left:20px;">
				<div class="row">
				<br />
					<div><?php echo $message; ?></div>
						<form method="post" enctype="multipart/form-data">
							<p><label>Select .sql File</label>
								<input type="file" name="database" /></p>
								<br />
								<input type="submit" name="import" class="btn btn-info" value="Import" />
						</form>
				</div>
			</div>
		</div>
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

<script src="custom/js/brand.js"></script>

<!-- Backup data -->
<script src="backup/jquery.min.js"></script>
<link rel="stylesheet" href="backup/bootstrap.min.css" />

<!-- Export database script -->
<script>
$(document).ready(function(){
 $('#submit').click(function(){
  var count = 0;
  $('.checkbox_table').each(function(){
   if($(this).is(':checked'))
   {
    count = count + 1;
   }
  });
  if(count > 0)
  {
   $('#export_form').submit();
  }
  else
  {
   alert("Please Select atleast one table for Export");
   return false;
  }
 });
});
</script>
