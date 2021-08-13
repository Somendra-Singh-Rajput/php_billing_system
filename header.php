<?php require_once 'php_action/core.php'; ?>

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
<link href='fonts/font.otf' rel='stylesheet' type='text/css'>

<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>

<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<!-- //calendar -->

<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>

<!-- jquery -->
<script src="assests/jquery/jquery.min.js"></script>

<!-- Data tables -->
<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
<script type="text/javascript" src="datatables/datatables.min.js"></script>
<script type="text/javascript" src="datatables/dataTables.responsive.css"></script>
<script type="text/javascript" src="datatables/dataTables.responsive.js"></script>

<!-- file input -->
<script src="assests/plugins/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>	
<script src="assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>	
<script src="assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="assests/plugins/fileinput/js/fileinput.min.js"></script>	

</head>

<body>
<header class="header fixed-top clearfix">

<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">ARTLIFE</a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">

        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username"> <?php  echo $_SESSION["username"]; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="register.php"><i class=" fa fa-user-plus"></i>Add Admin</a></li>
                <li><a href="setting.php"><i class="fa fa-key"></i> Change Password</a></li>
				<li> <a href="backup.php"><i class="fa fa-database"></i> Take Backup</a></li>
                <li> <a href="logout.php"><i class="glyphicon glyphicon-log-out" style="color:black;"></i> Log Out</a></li>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>

</body>
</html>