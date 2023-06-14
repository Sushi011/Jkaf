<?php include('../PHP/menu.php'); ?>

<div class="main-content">
            <div class="wrapper">
                <h1>Update Category</h1>

                <br><br>

                <?php
                    //Check wheter the id is set ornot
                    if(isset($_GET['id']))
                    {
                        //echo "DATANESS";
                        $id = $_GET['id'];
                        //Create SQL Query to get other details
                        $sql = "SELECT * FROM tbl_category WHERE id = $id";

                        //Execute the Query
                        $res= mysqli_query($conn,$sql);
                        //Count the rows returned
                        $count=mysqli_num_rows($res);

                        if($count==1)
                        {
                            //Get all the data
                            $row = mysqli_fetch_assoc($res);
                            $title = $row['title'];
                            $current_image = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                        }
                        else
                        {
                            //Redirect to manage category with session message
                            $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                            header('location:'.SITEURL.'PHP/manage-category.php');
                        }
                    }
                    else
                    {
                        header('location:'.SITEURL.'PHP/manage-category.php');
                    }
                ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class = "tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title;?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Current Image:</td>
                        <td>
                            <?php
                                if($current_image !="")
                                {
                                    //Display the image
                                    ?>
                                    <img src="<?php echo SITEURL; ?>IMAGES/category/<?php echo $current_image; ?>" width="150px">
                                    <?php
                                }
                                else
                                {
                                    //Display message
                                    echo "<div class='error'>Image Not Added.</div>";
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>New Image:</td>
                        <td>
                            <input type="file" name="image" value=""> 
                        </td>
                    </tr>

                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                            
                            <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active:</td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                            <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                        </td>
                    </tr>

                    
        </table>
</form>
        <?php
        if(isset($_POST['submit']))
        {
            //echo "CLICKED";
            //get all the value from our form
            $id=$_POST['id'];
            $title=$_POST['title'];
            $current_image=$_POST['current_image'];
            $featured=$_POST['featured'];
            $active=$_POST['active'];
            
            //Updating new image if selected
            //check if the image is selected or Not
            if(isset($_FILES['image']['name']))
            {
                //Get the image details
                $image_name=$_FILES['image']['name'];

                //Check if the image is available or Not
                if($image_name !="")
                {
                    //Image available, 
                    //A. Upload the new image,
                    //Auto Rename the image_name
                            //Get the Extension of our image(.jpg etc)
                            $ext = end(explode('.', $image_name));

                            //Rename the image name
                            $image_name = "Product_Category_".rand(000, 999).'.'.$ext; //e.g Food_Category_696.jpg


                            $source_path=$_FILES['image']['tmp_name'];

                            $destination_path="../IMAGES/category/".$image_name;

                            //Finally upload the image
                            $upload = move_uploaded_file($source_path, $destination_path);

                            //Check if the image is uploaded or not
                            //And if the image is not uploaded  the we will stop the process and return
                            if($upload == false)
                            {
                                //Set Message
                                $_SESSION['upload'] = "<div class = 'error'> Failed to Upload Image.</div>";
                                //Redirect to add category Page
                                header('location:'.SITEURL.'PHP/manage-category.php');
                                //Stop the process
                                die();
                            } 
                            //B. remove the current image_name if available
                            if($current_image!="")
                            {
                                $remove_path = "../IMAGES/category/".$current_image;

                                $remove = unlink($remove_path);

                                //Check if the image is remove or Not
                                //If failed to remove then display a message

                                    if($remove==false)
                                    {
                                        //Failed to remove
                                        $_SESSION['failed-remove'] = "<div class='error'>Failed to Remove Current Image.</div>";
                                        header('location:'.SITEURL.'PHP/manage-category.php');
                                        die();//Stop the Process
                                    }
                                }

                            
                }
                else
                {
                    //Image not available
                    $image_name=$current_image;
                }
            }
            else
            {
                $image_name = $current_image;
            }

            //Update the databased image
            $sql2="UPDATE tbl_category SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                WHERE id=$id
            ";

            //Execute the query
            $res2 = mysqli_query($conn,$sql2);

            //redirect to manage category
            //Check if executed or not
            if($res2==true)
            {
                //Category Updated
                $_SESSION['update']="<div class='success'>Category Updated Successfully.</div>";
                header('location:'.SITEURL.'PHP/manage-category.php');
            }
            else
            {
                //Failed to update category
                $_SESSION['update']="<div class='error'>Failed to Update Category.</div>";
                header('location:'.SITEURL.'PHP/manage-category.php');
            }
        }
        else
        {
            //
        }



        ?>


    </div>
</div>


<!--Footer Section Start-->
<?php include('../PHP/footer.php'); ?>