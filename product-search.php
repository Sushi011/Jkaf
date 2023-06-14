<?php include('partials-front/menu-cate-prod.php') ?>
      
      <!-- pRODUCT sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                    //get the search keyword
                    //$search = $_POST['search'];
                    $search = mysqli_real_escape_string($conn, $_POST['search']);
            ?>
            
            <h2 class = "text-blue">products on your search <a href="#" class="text-blue"><?php echo $search; ?></a></h2>

        </div>
    </section>
    <!-- Product sEARCH Section Ends Here -->


     <!-- Product MEnu Section Starts Here -->
     <section class="prod-menu">
        <div class="container">
            <h2 class="text-center">products</h2>

            <?php

                //SQL Query to get products based on search keyword
                $sql = "SELECT * FROM tbl_product WHERE title LIKE '%$search%' OR description LIKE'%$search%'";
            
                //Execute the SQL query
                $res = mysqli_query($conn,$sql);

                //Count rows of products
                $count = mysqli_num_rows($res);

                //Check if the food is available or not
                if($count>0)
                {
                    //product available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id  = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="prod-menu-box">
                            <div class="prod-menu-img">
                                <?php
                                    //Check if the image name is availbale or not
                                    if($image_name == "")
                                    {
                                        //Image not available
                                        echo "<div class='error'>Image not Available. </div>";
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
                                <h4><?php echo $title; ?></h4>
                                <p class="prod-price">₱ <?php echo $price; ?></p>
                                <p class="prod-detail">
                                <?php echo $description; ?>
                                </p>    
                                <br>

                                <a href="<?php echo SITEURL; ?>checkout.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Product not available
                    echo "<div class='error'>Product not Found.</div>";
                }
            ?>

                <div class="clearfix"></div>

        
    </section>

<?php include('partials-front/footer.php') ?>