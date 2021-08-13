<link rel="shortcut icon" href="favicon.ico"/>
<link rel="icon" type="image/png"  href="images/favicon.png">

<!-- bootstrap -->
<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
<!-- bootstrap theme-->
<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
<!-- font awesome -->
<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

<!-- custom css -->
<link rel="stylesheet" href="custom/css/custom.css">

<!-- DataTables -->
<link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

<!-- file input -->
<link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

<!-- jquery -->
<script src="assests/jquery/jquery.min.js"></script>
<!-- jquery ui -->  
<link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
	
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
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="glyphicon glyphicon-check"></i>	Import HSN Code
					</div>
					<!-- /panel-heading -->
					<div class="panel-body">
						
						<form class="form-horizontal" action="php_action/createBrandImport.php" method="POST" enctype="multipart/form-data">
						<div id="add-product-messages"></div>
						<div class="form-group">
						<label for="brandfile" class="col-sm-3 control-label">Import HSN Code FIle: </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
									<div class="col-md-8">
									<input type="file" name="uploadfile" class="form-control"/>
									</div> 							
							</div> <br><br><br>
							<label for="brandfile" class="col-sm-3 control-label">Donwload sample file: </label>
							<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-2" style="display:inline-block">
									<a href="assests/import/brand.xlsx" download>Click Here</a>				
							</div>
							</div> <!-- /form-group-->	
						
						<div class="form-group row">
							<label class="col-md-3"></label>
							<div class="col-md-8">
								<input type="submit" name="submit" class="btn btn-primary">
							</div>
						</div>
						</form>
		
					</div>
					<!-- /panel-body -->
				</div>
			</div>
			<!-- /col-dm-12 -->
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="glyphicon glyphicon-check"></i>	Import Categories Code
					</div>
					<!-- /panel-heading -->
					<div class="panel-body">
						
						<form class="form-horizontal" action="php_action/createCategoriesImport.php" method="POST" enctype="multipart/form-data">
						<div id="add-product-messages"></div>
						<div class="form-group">
						<label for="brandfile" class="col-sm-3 control-label">Import Categories FIle: </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
									<div class="col-md-8">
									<input type="file" name="uploadfile" class="form-control"/>
									</div> 							
							</div> <br><br><br>
							<label for="brandfile" class="col-sm-3 control-label">Donwload sample file: </label>
							<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-2" style="display:inline-block">
									<a href="assests/import/categories.xlsx" download>Click Here</a>							
							</div>
							</div> <!-- /form-group-->	
						
						<div class="form-group row">
							<label class="col-md-3"></label>
							<div class="col-md-8">
								<input type="submit" name="submit" class="btn btn-primary">
							</div>
						</div>
						</form>
		
					</div>
					<!-- /panel-body -->
				</div>
			</div>
			<!-- /col-dm-12 -->
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

<script src="custom/js/import.js"></script>

<!-- file input -->
<script src="assests/plugins/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>	
<script src="assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>	
<script src="assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="assests/plugins/fileinput/js/fileinput.min.js"></script>	
