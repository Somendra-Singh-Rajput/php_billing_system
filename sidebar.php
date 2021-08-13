<?php require_once 'php_action/core.php'; ?>

<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li id="navDashboard"><a class="active" href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>							
				
				<?php if(isset($_SESSION['username']) && $_SESSION['username'] != null) { ?>
                <li id="navCategories" class="sub-menu navCategories"><a href="categories.php"><i class="fa fa-tasks"></i>Categories</a></li>
				<?php } ?>
				
				<?php if(isset($_SESSION['username']) && $_SESSION['username'] != null) { ?>
				<li id="navBrand" class="sub-menu"><a href="brand.php"><i class="fa fa-certificate"></i>HSN Code</a></li>
			   <?php } ?>
			   
			   <li id="navProduct" class="sub-menu"><a href="product.php"><i class="fa fa-th"></i>Products</a></li>
				
                <li class="sub-menu" id="navOrder">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-shopping-cart" style="color:white" ></i><span>Retail Orders</span></a>
                    <ul class="sub">
                        <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus" style="color:white" ></i> Add Order</a></li>            
						<li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit" style="color:white"></i> Manage Orders</a></li> 
                    </ul>
                </li>
				
				<li class="sub-menu" id="navOrder">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-shopping-cart" style="color:white" ></i><span>Wholesale Orders</span></a>
                    <ul class="sub">
						<li id="topNavAddOrder"><a href="worders.php?o=add"> <i class="glyphicon glyphicon-plus" style="color:white" ></i> Add Order </a></li>            
						<li id="topNavManageOrder"><a href="worders.php?o=manord"> <i class="glyphicon glyphicon-edit" style="color:white"></i> Manage Orders</a></li> 
                    </ul>
                </li>
				
				<!--
                <li id="navReport" class="sub-menu"><a href="report.php"><i class="glyphicon glyphicon-check" style="color:white"></i>Reports</a></li>
				-->
				
				<li class="sub-menu">
                    <a href="javascript:;"><i class="fa fa-check"></i><span>Reports</span></a>
                    <ul class="sub">
                        <li id="topNavManageOrder" ><a href="orders.php?o=manord"><i class="glyphicon glyphicon-edit" style="color:white"></i><span>Retail Reports</span></a></li>
						<li id="topNavManageOrder" ><a href="worders.php?o=manord"><i class="glyphicon glyphicon-edit" style="color:white" ></i> Wholesale Reports</a></li>
                    </ul>
                </li>
				
				<!--
				<li id="navOrder" class="sub-menu"><a href="invoices.php"><i class="fa fa-file-pdf-o"></i>Invoices</a></li>
				-->
				

                <li id="importbrand" class="sub-menu"><a href="importbrand.php"><i class="fa fa-upload"></i>Import Data</a></li>
			
				
				<li class="sub-menu">
                    <a href="javascript:;"><i class="fa fa-cog"></i><span>Settings</span></a>
                    <ul class="sub">
                        <li id="topNavUser" ><a href="register.php"><i class="fa fa-user-plus"></i><span>Add Admin</span></a></li>
						<li><a href="setting.php"><i class="fa fa-key"></i> Change Password</a></li>
						<li><a href="backup.php"><i class="fa fa-database"></i> Take Backup</a></li>
                    </ul>
                </li>
				
				<li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out" style="color:white;"></i> Logout</a></li> 
				
            </ul>            
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>