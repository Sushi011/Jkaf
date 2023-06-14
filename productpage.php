<?php include('partials-front/menu-product.php') ?>
    
    <body>
            <!-- Product sEARCH Section Starts Here -->
    <section class="prod-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Product.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Product sEARCH Section Ends Here -->


    <!-- Product MEnu Section Starts Here -->
    <section class="prod-menu">
        <div class="container">
            <h2 class="text-center">products</h2>
            

            <?php 
                //Display Product that are Active
                $sql = "SELECT * FROM tbl_product WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the product are availalable or not
                if($count>0)
                {
                    //Product Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="prod-menu-box">
                            <div class="prod-menu-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>IMAGES/product/<?php echo $image_name; ?>" alt="products" class="img-responsive img-curve">
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
                    //product not Available
                    echo "<div class='error'>Product not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php') ?>