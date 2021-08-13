var manageProductTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage brand table
	manageProductTable = $("#manageProductTable").DataTable({
		'ajax': 'php_action/fetchProduct.php',
		'order': []		
	});

	// submit brand form function
	$("#submitProductForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		// form validation
		var productName = $("#productName").val();
		var quantity = $("#quantity").val();
		var rate = $("#rate").val();
		var wrate = $("#wrate").val();
		var brandName = $("#brandName").val();
		var categoryName = $("#categoryName").val();
		var productStatus = $("#productStatus").val();
			
		if(productName == "") {
				$("#productName").after('<p class="text-danger">Product Name field is required</p>');
				$('#productName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#productName").find('.text-danger').remove();
				// success out for form 
				$("#productName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(quantity == "") {
				$("#quantity").after('<p class="text-danger">Quantity field is required</p>');
				$('#quantity').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#quantity").find('.text-danger').remove();
				// success out for form 
				$("#quantity").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(rate == "") {
				$("#rate").after('<p class="text-danger">Retail Rate field is required</p>');
				$('#rate').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#rate").find('.text-danger').remove();
				// success out for form 
				$("#rate").closest('.form-group').addClass('has-success');	  	
			}	// /else
				
			if(wrate == "") {
				$("#wrate").after('<p class="text-danger">Wholesale rate field is required</p>');
				$('#wrate').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#wrate").find('.text-danger').remove();
				// success out for form 
				$("#wrate").closest('.form-group').addClass('has-success');	  	
			}

			if(brandName == "") {
				$("#brandName").after('<p class="text-danger">Brand Name field is required</p>');
				$('#brandName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#brandName").find('.text-danger').remove();
				// success out for form 
				$("#brandName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(categoryName == "") {
				$("#categoryName").after('<p class="text-danger">Category Name field is required</p>');
				$('#categoryName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#categoryName").find('.text-danger').remove();
				// success out for form 
				$("#categoryName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(productStatus == "") {
				$("#productStatus").after('<p class="text-danger">Product Status field is required</p>');
				$('#productStatus').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#productStatus").find('.text-danger').remove();
				// success out for form 
				$("#productStatus").closest('.form-group').addClass('has-success');	  	
			}	// /else


		if(productName && quantity && rate && wrate && brandName && categoryName && productStatus) {
			var form = $(this);
			// button loading
			$("#createProductBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createProductBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageProductTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitProductForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-product-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if

				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit product form function

});

function editProduct(productId = null) {
	if(productId) {
		// remove hidden brand id text
		$('#productId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-brand-result').addClass('div-hide');
		// modal footer
		$('.editProductFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedProduct.php',
			type: 'post',
			data: {productId : productId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-brand-result').removeClass('div-hide');
				// modal footer
				$('.editProductFooter').removeClass('div-hide');

				// product name
				$("#editProductName").val(response.product_name);
				// quantity
				$("#editQuantity").val(response.quantity);
				// rate
				$("#editRate").val(response.rate);
				// wrate
				$("#editWRate").val(response.wrate);
				// brand name
				$("#editBrandName").val(response.hsn_id);
				// category name
				$("#editCategoryName").val(response.categories_id);
				// status
				$("#editProductStatus").val(response.active);
				
				// brand id 
				$(".editProductFooter").after('<input type="hidden" name="productId" id="productId" value="'+response.product_id+'" />');

				// update brand form 
				$('#editProductForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var productName = $("#editProductName").val();
					var quantity = $("#editQuantity").val();
					var rate = $("#editRate").val();
					var wrate = $("#editWRate").val();
					var brandName = $("#editBrandName").val();
					var categoryName = $("#editCategoryName").val();
					var productStatus = $("#editProductStatus").val();
								

					if(productName == "") {
						$("#editProductName").after('<p class="text-danger">Product Name field is required</p>');
						$('#editProductName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editProductName").find('.text-danger').remove();
						// success out for form 
						$("#editProductName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(quantity == "") {
						$("#editQuantity").after('<p class="text-danger">Quantity field is required</p>');
						$('#editQuantity').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editQuantity").find('.text-danger').remove();
						// success out for form 
						$("#editQuantity").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(rate == "") {
						$("#editRate").after('<p class="text-danger">Retail rate field is required</p>');
						$('#editRate').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editRate").find('.text-danger').remove();
						// success out for form 
						$("#editRate").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(wrate == "") {
						$("#editWRate").after('<p class="text-danger">Wholesale rate field is required</p>');
						$('#editWRate').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editWRate").find('.text-danger').remove();
						// success out for form 
						$("#editWRate").closest('.form-group').addClass('has-success');	  	
					}	// /else
						
					if(brandName == "") {
						$("#editBrandName").after('<p class="text-danger">Brand Name field is required</p>');
						$('#editBrandName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editBrandName").find('.text-danger').remove();
						// success out for form 
						$("#editBrandName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(categoryName == "") {
						$("#editCategoryName").after('<p class="text-danger">Category Name field is required</p>');
						$('#editCategoryName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editCategoryName").find('.text-danger').remove();
						// success out for form 
						$("#editCategoryName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(productStatus == "") {
						$("#editProductStatus").after('<p class="text-danger">Product Status field is required</p>');
						$('#editProductStatus').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editProductStatus").find('.text-danger').remove();
						// success out for form 
						$("#editProductStatus").closest('.form-group').addClass('has-success');	  	
					}	// /else					


					if(productName && quantity && rate && wrate && brandName && categoryName && productStatus) {
						var form = $(this);

						// submit btn
						$('#editProductBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editProductBtn').button('reset');

									// reload the manage member table 
									manageProductTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-product-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if
									
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update product form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function

// remove product 
function removeProduct(productId = null) {
	if(productId) {
		// remove product button clicked
		$("#removeProductBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeProductBtn").button('loading');
			$.ajax({
				url: 'php_action/removeProduct.php',
				type: 'post',
				data: {productId: productId},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeProductBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeProductModal").modal('hide');

						// update the product table
						manageProductTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					} else {

						// remove success messages
						$(".removeProductMessages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the product
			return false;
		}); // /remove product btn clicked
	} // /if productid
} // /remove product function