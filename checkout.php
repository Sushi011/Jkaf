<?php include('partials-front/menu-checkout.php') ?>

		<?php
			//Check if the product id set or not
			if(isset($_GET['product_id']))
			{
				//Get the product id and details of the selected product
				$product_id = $_GET['product_id'];

				//get the details of the selected product
				$sql = "SELECT * FROM tbl_product WHERE id=$product_id";

				//Execute the query
				$res = mysqli_query($conn, $sql);

				//Count the rows
				$count = mysqli_num_rows($res);

				//Check if the data is availbale or not
				if($count==1)
				{
					//we have data
					//get the data from database
					$row = mysqli_fetch_assoc($res);
					$title = $row['title'];
					$price = $row['price'];
					$image_name = $row['image_name'];
				}
				else
				{
					//product not avilable
					header('location:'.SITEURL);
				}
			}
			else
			{
				//Redirect to homepage
				header('location:'.SITEURL);
			}
		
		?>

    <body>

		 <!-- Product sEARCH Section Starts Here -->
		 <section class="prod-search">
			<div class="container">
				
				<h2 class="text-center text-white">Fill this form to confirm your order.</h2>
	
				<form action="" method="POST" class="order">
					<fieldset>
						<legend>Selected Product</legend>
	
						<div class="prod-menu-img">
							<?php
								//Check if the image is available or not and
								if($image_name=="")
								{
									echo "<div class='error'>Image not Available.</div>";
								}
								else
								{
									?>
									<img src="<?php echo SITEURL; ?>IMAGES/product/<?php echo $image_name; ?>" alt="product" class="img-responsive img-curve">
									<?php
								}
							
							?>
						</div>
		
						<div class="prod-menu-desc">
							<h3><?php echo $title; ?></h3>
							<input type="hidden" name="product" value="<?php echo $title; ?>">

							<p class="prod-price">₱ <?php echo $price; ?></p>
							<input type="hidden" name="price" value="<?php echo $price; ?>">

	
							<div class="order-label">Quantity</div>
							<input type="number" name="qty" class="input-responsive" value="1" required>
							
						</div>
	
					</fieldset>
					
					<fieldset>
						<legend>Delivery Details</legend>
						<div class="order-label">Full Name</div>
						<input type="text" name="full-name" placeholder="E.g. Claymar Pereyra" class="input-responsive" required>
	
						<div class="order-label">Phone Number</div>
						<input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>
	
						<div class="order-label">Email</div>
						<input type="email" name="email" placeholder="E.g. hi@group3acsad.com" class="input-responsive" required>
	
						<div class="order-label">Address</div>
						<textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
	
						<input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
					</fieldset>
	
				</form>
				<?php 

					//CHeck whether submit button is clicked or not
					if(isset($_POST['submit']))
					{
						// Get all the details from the form

						$product = $_POST['product'];
						$price = $_POST['price'];
						$qty = $_POST['qty'];
						$total = $price * $qty; // total = price x qty 
						$order_date = date("Y-m-d h:i:sa"); //Order DAte
						$status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled
						$customer_name = $_POST['full-name'];
						$customer_contact = $_POST['contact'];
						$customer_email = $_POST['email'];
						$customer_address = $_POST['address'];


						//Save the Order in Databaase
						//Create SQL to save the data
						$sql2 = "INSERT INTO tbl_checkout SET 
							product = '$product',
							price = $price,
							qty = $qty,
							total = $total,
							order_date = '$order_date',
							status = '$status',
							customer_name = '$customer_name',
							customer_contact = '$customer_contact',
							customer_email = '$customer_email',
							customer_address = '$customer_address'
						";

						//echo $sql2; die();

						/// Execute the Query
						$res2 = mysqli_query($conn, $sql2);

						// Check whether query executed successfully or not
						if ($res2 == true) {
							// Query Executed and Order Saved
							$_SESSION['order'] = "<div class='card-prompt success'>
													<div class='card-content'>
														<span class='close-btn' onclick='closeCardPrompt()'>&times;</span>
														<h5>$customer_name, your $product ORDERED SUCCESSFULLY.</h5>
													</div>
												</div>";
							header('location:'.SITEURL);
						} else {
							// Failed to Save Order
							$_SESSION['order'] = "<div class='card-prompt error'>
													<div class='card-content'>
														<span class='close-btn' onclick='closeCardPrompt()'>&times;</span>
														<h5>Failed to Order Product.</h5>
													</div>
												</div>";
							header('location:'.SITEURL);
						}

					}

    			?>

</div>
</section>
		<!-- Product sEARCH Section Ends Here -->

		 <!--Footer-->
<?php include('partials-front/footer.php') ?>