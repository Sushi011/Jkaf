<?php include('partials-front/menu-cate-prod.php') ?>

        <?php
        //Check if the id is passed or not
        if(isset($_GET['category_id']))
        {
            //category_id is set and get the id
            $category_id = $_GET['category_id'];
            //Category title based on category id
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Get the value from datbase
            $row = mysqli_fetch_assoc($res);

            //Get the title
            $category_title = $row['title'];    

        }
        else
        {
            //category not passed and redirect home page
            header('location:'.SITEURL);
        }
        ?>
      
      <!-- pRODUCT sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
       
            <h2 class = "text-blue">products on <a href="#" class="text-blue"><?php echo $category_title; ?></a></h2>

        </div>
    </section>
    <!-- Product sEARCH Section Ends Here -->

     <!-- Product MEnu Section Starts Here -->
     <section class="prod-menu">
        <div class="container">
            <h2 class="text-center">products</h2>

            <?php

                //SQL Query to get products based on search keyword
                $sql2 = "SELECT * FROM tbl_product WHERE category_id=$category_id";
            
                //Execute the SQL query
                $res2 = mysqli_query($conn,$sql2);

                //Count rows of products
                $count2 = mysqli_num_rows($res2);

                //Check if the food is available or not
                if($count2>0)
                {
                    //product available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        //Get the details
                        $id  = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
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