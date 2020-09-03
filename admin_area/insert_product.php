<?php 
	include('includes/dbConn.php');
	$conn = db();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Product</title>
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body bgcolor="#9999">
	<br><br>
	<form action="insert_product.php" enctype="multipart/form-data" method="post">		
		<table width="700px" align="center" border="2px solid:#000" bgcolor="#006933">		
			<tr>
				<td colspan="2"><h2 align="center">Insert New Product:</h2></td>
			</tr>	
			<tr>
				<td align="right">Product Title :</td>
				<td><input type="text" name="product_title" size="75px"></td>
			</tr>
			<tr>
				<td align="right">Product Description :</td>
				<td><textarea name="product_desc" id="" cols="75" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align="right">Product Price :</td>
				<td><input type="text" name="product_price" size="75px"></td>
			</tr>
			<tr>
				<td align="right">Product Image 1 :</td>
				<td><input type="file" name="product_img1"></td>
			</tr>
			<tr>
				<td align="right">Product Image 2 :</td>
				<td><input type="file" name="product_img2"></td>
			</tr>
			<tr>
				<td align="right">Product Image 3 :</td>
				<td><input type="file" name="product_img3"></td>
			</tr>
			<tr>
				<td align="right">Product Category :</td>
				<td>
					<select name="product_category" id="">
						<option value="">Select a Category</option>
							<?php 
								$all_category = 'select * from categories';
								$get_category = mysqli_query($conn,$all_category);
								while($row = mysqli_fetch_array($get_category)){
									$category_id = $row['category_id'];
									$category_name = $row['category_name'];
									echo "<option value='$category_id'>$category_name</option>";
								}
							 ?>						
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Product Brand :</td>
				<td>
					<select name="product_brand" id="">
						<option value="">Select a Brand</option>
							<?php 
								$all_brand = 'select * from brands';
								$get_brand = mysqli_query($conn,$all_brand);
								while($row = mysqli_fetch_array($get_brand)){
									$brand_id = $row['brand_id'];
									$brand_name = $row['brand_name'];
									echo "<option value='$brand_id'>$brand_name</option>";
								}
							 ?>						
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Product Keywords :</td>
				<td><input type="text" name="product_keywords" size="75px"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="insert_product" value="Submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php 
	if(isset($_POST['insert_product']))
	{
		$product_title      = $_POST['product_title'];		
		$product_desc       = $_POST['product_desc'];
		$product_price      = $_POST['product_price'];
		$product_category   = $_POST['product_category'];
		$product_brand      = $_POST['product_brand'];
		$product_keywords   = $_POST['product_keywords'];
		$status             = 'on';

		// Image files
		$product_img1 = $_FILES['product_img1']['name'];
		$product_img2 = $_FILES['product_img2']['name'];
		$product_img3 = $_FILES['product_img3']['name'];

		// Image temp names
		$temp_name1 = $_FILES['product_img1']['tmp_name'];
		$temp_name2 = $_FILES['product_img2']['tmp_name'];
		$temp_name3 = $_FILES['product_img3']['tmp_name'];

		if($product_title == '' OR $product_category == '' OR $product_keywords == '' OR $product_brand =='' OR $product_desc == '' OR $product_price == '' OR $product_img1 == ''){
			echo "<script> alert('Please Fill all field') </script>";
			exit();
		}else{
			move_uploaded_file($temp_name1, "product_images/$product_img1");
			move_uploaded_file($temp_name2, "product_images/$product_img2");
			move_uploaded_file($temp_name3, "product_images/$product_img3");

			$insert_product = "INSERT INTO PRODUCTS(product_title, product_desc, product_price,product_img1,product_img2,product_img3,brand_id,category_id,date,status)  
			VALUES ('$product_title','$product_desc','$product_price','$product_img1','$product_img2','$product_img3','$product_brand','$product_category',NOW(),'$status')";

			$result = mysqli_query($conn, $insert_product);
			if($result){
				echo "<script> alert('Product Inserted Successfully!') </script>";
			}
		}
	}		
 ?> 