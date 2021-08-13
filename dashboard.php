<link rel="shortcut icon" href="favicon.ico"/>
<link rel="icon" type="image/png"  href="images/favicon.png">

<?php require_once 'php_action/core.php' ?>

<?php

   // To calculate total of qunatity from product table
  $sql = "SELECT SUM(`quantity`) AS totalProducts FROM `product`";
  $result = mysqli_query($connect, $sql);
  $row = mysqli_fetch_object($result);

  // To calculate total of orders
  $sql1 = "SELECT count(`order_id`) AS totalCustomers FROM `orders`";
  $result1 = mysqli_query($connect, $sql1);
  $row1 = mysqli_fetch_object($result1); 
  
  // To calculate total of amount
  $sql2 = "SELECT SUM(`total_amount`) AS totalSales FROM `orders`";
  $result2 = mysqli_query($connect, $sql2);
  $row2 = mysqli_fetch_object($result2);

  // To calculate total of qunatity from order_item table
  $sql3 = "SELECT SUM(`quantity`) AS totalOrders FROM `order_item`";
  $result3 = mysqli_query($connect, $sql3);
  $row3 = mysqli_fetch_object($result3);
 
  // To make a grap of order_item table
  $query = "SELECT * FROM order_item";
  $result4 = mysqli_query($connect, $query);
  $chart_data = '';
  //echo"<pre>"; print_r(mysqli_fetch_array($result4)); die('somen');
  while($row4 = mysqli_fetch_array($result4))
  {
  $chart_data .= "{ order_id:'".$row4["order_id"]."', product_id:'".$row4["product_id"]."', quantity:'".$row4["quantity"]."', createDate:'".$row4["createDate"]."'}, ";
  }
  $chart_data = substr($chart_data, 0, -2);
//die('somen12');
  // To calculate total of orders
  $sql5 = "SELECT count(`order_id`) AS totalWCustomers FROM `worders`";
  $result5 = mysqli_query($connect, $sql5);
  $row5 = mysqli_fetch_object($result5);
  
  // To calculate total of amount
  $sql6 = "SELECT SUM(`total_amount`) AS totalSales FROM `worders`";
  $result6 = mysqli_query($connect, $sql6);
  $row6 = mysqli_fetch_object($result6);
  
  mysqli_close($connect);

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
		<!-- // Retail market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Total Products</h4>
					<h3><?php   echo "" . $row->totalProducts; ?></h3>
					<p>Quantity</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>R Customers</h4>
						<h3><?php   echo "" . $row1->totalCustomers;?></h3>
						<p>People</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Total Sales</h4>
						<h3><?php   echo "" . $row2->totalSales; ?></h3>
						<p>Rupees</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Total Orders</h4>
						<h3><?php   echo "" . $row3->totalOrders; ?></h3>
						<p>Pieces</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
		<!-- //Retail market-->
		
		<!-- //Wholesale market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>W Customers</h4>
						<h3><?php   echo "" . $row5->totalWCustomers; ?></h3>
						<p>People</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Total W Sales</h4>
						<h3><?php   echo "" . $row6->totalSales; ?></h3>
						<p>Rupees</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
		<!-- //Wholesale market-->
		<!-- Chart/Graph -->
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>CHART OF TOTAL ORDERS PER PRODUCT DATE WISE</h3>
										<div class="toolbar">
											
											
										</div>
								</header>
								<div class="agileits-box-body clearfix">
									<div id="chart"></div>
								</div>
							</div>
						</div>
					<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
		
				<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3><span class="panel-title"> Calendar Widget</span></h3>
										<div class="toolbar">
											
											
										</div>
								</header>
								<div class="agileits-box-body clearfix">
									<div class="monthly" id="mycalendar"></div>
								</div>
							</div>
						</div>
					<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
		
		
		<!-- //Chart/Graph -->
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

<!-- For morris chart    -->
<link rel="stylesheet" href="chart/morris.css">
<script src="chart/jquery.min.js"></script>
<script src="chart/raphael-min.js"></script>
<script src="chart/morris.min.js"></script>

<script>
Morris.Area({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'quantity',
 ykeys:['order_id','product_id','createDate'],
 labels:['order_id','product_id','createDate'],
 hideHover:'auto',
 stacked:true
});
</script>


<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->