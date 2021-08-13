<link rel="shortcut icon" href="favicon.ico"/>
<link rel="icon" type="image/png"  href="images/favicon.png">

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
				<li class="active">Category</li>
				</ol>
		
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Categories</div>
					</div> <!-- /panel-heading -->
					<div class="panel-body">
		
						<div class="remove-messages"></div>
		
						<div class="div-action pull pull-right" style="padding-bottom:20px;">
							<button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Categories </button>
						</div> <!-- /div-action -->				
						
						<table class="table" id="manageCategoriesTable">
							<thead>
								<tr>							
									<th>Category ID</th>
									<th>Categories Name</th>
									<th>Status</th>
									<th>DOA</th>
									<th style="width:15%;">Options</th>
								</tr>
							</thead>
						</table>
						<!-- /table -->
		
					</div> <!-- /panel-body -->
				</div> <!-- /panel -->		
			</div> <!-- /col-md-12 -->
		</div> <!-- /row -->
		
		
		<!-- add categories -->
		<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
		
				<form class="form-horizontal" id="submitCategoriesForm" action="php_action/createCategories.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Add Categories</h4>
				</div>
				<div class="modal-body">
		
					<div id="add-categories-messages"></div>
		
					<div class="form-group">
						<label for="categoriesName" class="col-sm-4 control-label">Categories Name: </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-7">
							<input type="text" class="form-control" id="categoriesName" placeholder="Categories Name" name="categoriesName" autocomplete="off">
							</div>
					</div> <!-- /form-group-->	         	        
					<div class="form-group">
						<label for="categoriesStatus" class="col-sm-4 control-label">Status: </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-7">
							<select class="form-control" id="categoriesStatus" name="categoriesStatus">
								<option value="">-SELECT-</option>
								<option value="1">Available</option>
								<option value="2">Not Available</option>
							</select>
							</div>
					</div> <!-- /form-group-->	         	        
				</div> <!-- /modal-body -->
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
					
					<button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				</div> <!-- /modal-footer -->	      
				</form> <!-- /.form -->	     
			</div> <!-- /modal-content -->    
		</div> <!-- /modal-dailog -->
		</div> 
		<!-- /add categories -->
		
		
		<!-- edit categories -->
		<div class="modal fade" id="editCategoriesModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<form class="form-horizontal" id="editCategoriesForm" action="php_action/editCategories.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Edit Category</h4>
				</div>
				<div class="modal-body">
		
					<div id="edit-categories-messages"></div>
		
					<!-- 
					<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
								<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
								<span class="sr-only">Loading...</span>
					</div>		
					-->
					
					<div class="edit-categories-result">
						<div class="form-group">
							<label for="editCategoriesName" class="col-sm-4 control-label">Categories Name: </label>
							<label class="col-sm-1 control-label">: </label>
								<div class="col-sm-7">
								<input type="text" class="form-control" id="editCategoriesName" placeholder="Categories Name" name="editCategoriesName" autocomplete="off">
								</div>
						</div> <!-- /form-group-->	         	        
						<div class="form-group">
							<label for="editCategoriesStatus" class="col-sm-4 control-label">Status: </label>
							<label class="col-sm-1 control-label">: </label>
								<div class="col-sm-7">
								<select class="form-control" id="editCategoriesStatus" name="editCategoriesStatus">
									<option value="">-SELECT-</option>
									<option value="1">Available</option>
									<option value="2">Not Available</option>
								</select>
								</div>
						</div> <!-- /form-group-->	 
					</div>         	        
					<!-- /edit brand result -->
		
				</div> <!-- /modal-body -->
				
				<div class="modal-footer editCategoriesFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
					
					<button type="submit" class="btn btn-success" id="editCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				</div>
				<!-- /modal-footer -->
				</form>
				<!-- /.form -->
			</div>
			<!-- /modal-content -->
		</div>
		<!-- /modal-dailog -->
		</div>
		<!-- /categories brand -->
		
		<!-- categories brand -->
		<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Brand</h4>
			</div>
			<div class="modal-body">
				<p>Do you really want to remove ?</p>
			</div>
			<div class="modal-footer removeCategoriesFooter">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				<button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
			</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- /categories brand -->
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

<script src="custom/js/categories.js"></script>

<!-- To make datatables responsive -->
<script>
$(document).ready( function () {
    $('#manageCategoriesTable').DataTable();
} );
</script>
