<?php 
	include('includes/dbConn.php');
	$conn = db();
 ?>
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
				<div class="sidebar_title">Categories</div>
				<ul id="category">
					<?php 
						$all_category = 'select * from categories';
						$get_category = mysqli_query($conn,$all_category);
						while($row = mysqli_fetch_array($get_category)){
							$category_id = $row['category_id'];
							$category_name = $row['category_name'];
							echo "<li><a href='index.php?category=$category_id'>$category_name</a></li>";
						}

					 ?>
					
				</ul>
				<div class="brand_title">Brand</div>
				<ul id="brand">
					<?php 
						$all_brand = 'select * from brands';
						$get_brand = mysqli_query($conn, $all_brand);
						while($row = mysqli_fetch_array($get_brand)){
							$brand_id   = $row['brand_id'];
							$brand_name = $row['brand_name'];
							echo "<li><a href='index.php?brand=$brand_id'>$brand_name</a></li>";
						}
					 ?>									
				</ul>
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
			<h1 style="color: #000; text-align: center; padding-top: 50px;">&copy; 2020 - By www.mazedur.com</h1>
		</div>
		<!-- Footer End -->
	</div>
	<!-- End Main Container -->
</body>
</html>