<?php include('../PHP/menu.php'); ?>

        <!--Main Content Section Start-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Product</h1>

                <br><br>

                <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['unauthorize']))
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }

                ?>
                <br><br>
                

                <!--Button to Add Admin-->
                <a href="<?php echo SITEURL;?>PHP/add-product.php" class="btn-primary">Add Product</a>

                <br> <br> <br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //Create a SQL Query to get all the product
                        $sql="SELECT * FROM tbl_product";

                        //Execute the Query
                        $res=mysqli_query($conn,$sql);

                        //Count rows to check wheter we have foods or not
                        $count = mysqli_num_rows($res);

                        //Create S.N
                        $sn = 1;

                        if($count>0)
                        {
                            //We have product in database
                            //Get the product from database and display it
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td>
                                            <?php 
                                                //Check if we have image or not
                                                if($image_name=="")
                                                {
                                                    //We dont have image, Display Error Message
                                                    echo "<div class='error'> Image not Added.</div>";
                                                }
                                                else
                                                {
                                                    //We have image, display image_name
                                                    ?>
                                                    <img src="<?php echo SITEURL; ?>IMAGES/product/<?php echo $image_name?>" width="150px">
                                                    <?php
                                                }         
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td> 
                                        <td>
                                            <a href="<?php echo SITEURL; ?>PHP/update-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Update Product </a>
                                            <a href="<?php echo SITEURL; ?>PHP/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Product </a>
                                        </td>
                                    </tr>   

                                <?php
                            }
                        }
                        else
                        {
                            //Product not added in Datbase
                            echo "<tr> <td colspan='7' class='error'> Product not Added Yet.</td></tr>";

                        }
                    ?>

 

                </table>

            </div>
        </div>
        <!--Menu Content Section End-->

        <!--Footer Section Start-->
 <?php include('../PHP/footer.php'); ?>