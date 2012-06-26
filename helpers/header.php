<html>
	<?php
	$workingDir = getcwd();
	if (isset($page))
	{
		if ($page == "Menu")
		{
			echo "<script src='/mst/menu-site-test/utils/order.js' type='text/javascript'> </script>\n";
		}
	}
	
	echo "<link rel='stylesheet' type='text/css' href='/mst/menu-site-test/stylesheets/menu.css' />\n ";
	
	//Begin Storing Session Data
	if (!isset($_SESSION['exists']))
	{
	  session_start(); 
	  $_SESSION['exists']=TRUE;
	}
	?>
	<head>
		<title>S'Ample Bistro
		<?php
		if (isset($_SESSION['title_append']))
		{
			echo " - " . $_SESSION['title_append'];
			unset($_SESSION['title_append']);
		}
		?></title>
	</head>
	<body>
	
	
<!-- holder for the header stuff -->	
	<div id="header">
	
	
<!--  for boring static pages -->	
	  <div id="head_static_links">
	    <a id="head_about" href="./about.php">About</a> ~ 
	    <a id="head_contact" href="./contact.php">Contact Us</a>
	  </div>
	  
<!--  Header for the page with resto name -->	  
	  <div id="head_restaurant">
	  <h1><a href="/mst/menu-site-test/home.php">S'Ample Bistro</a></h1>
	  </div>
	
<!-- For interesting page navigation  -->	
	  <div id="head_menu_nav">
	    <a id="head_menu_link" href="./menu.php">Order</a>
		<a id="head_order_link" href="./order.php">Checkout</a>
		<a id="head_reserve_link" href="./reservation.php">Reservations</a>
	  </div>
	  
	</div>