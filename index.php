<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-Commmerce Solution</title>
	<link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
	<!-- Main Container -->
	<div class="main_wrapper">
		<!-- Header Starts -->
		<div class="header_wrapper">			
			<img src="images/logo.gif" alt="" style="float: left;" >			
			<img src="images/banner.jpg" alt="" style="float: right;" >						
		</div>		
		<!-- Header Ends -->
		<!-- Navbar starts -->
		<div class="navbar_wrapper">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>			
			</ul>
			<div class="form">
				<form action="result.php" method="post" enctype="multipart/form-data">
				<input type="" name="user_query" placeholder="Search Products ...">
				<input type="submit" name="search" value="Search">
			</form>
			</div>
		</div>
		<!-- Navbar Ends -->
		<!-- Main Content Starts -->
		<div class="content_wrapper">
			<!-- Left Sidebar Start -->
			<div class="left_sidebar">
				<?php echo "LEFT SIDEBAR"; ?>
			</div>
			<!-- Left Sidebar End -->
			<!-- Right Content -->
			<div class="right_content">
				<?php echo "RIGHT CONTENT"; ?>
			</div>
			<!-- Right Content End -->
		</div>
		<!-- Main Content Ends -->
		<!-- Footer Start -->
		<div class="footer_wrapper">
			<?php echo "FOOTER"; ?>
		</div>
		<!-- Footer End -->
	</div>
	<!-- End Main Container -->
</body>
</html>