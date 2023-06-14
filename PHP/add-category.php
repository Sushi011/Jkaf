<?php include('../PHP/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php
            if (isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        
            if (isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br><br>


        <!--Category Start-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Category Title">
                </td>
            </tr>

            <tr>
                <td>Select Image: </td>
                <td>
                    <input type="file" name = "image">
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td> 
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td> 
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No                
                </td>
            </tr>

            <tr>
            <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">         
            </td>
            </tr>

            </table>
        </form>
        <!--Add category form ends-->
        <?php
            //Check if the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //echo "Cliked";

                //1. Get the value from category form 
                $title = $_POST['title'];

                //for radio input, check if the button is selected or not
                if(isset($_POST['featured']))
                {
                    //Get the value from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    //Set the Default Value
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                    //Check if the image is selected or not and set the value for image names
                    //print_r($_FILES['image']);
                    //die(); //Break the code here

                    if(isset($_FILES['image']['name']))
                    {
                        //Upload the image
                        //To upload the image, we need name, path and destination path to
                        $image_name=$_FILES['image']['name'];


                        //Upload image only if image is selected or not
                        if($image_name!=="")
                        {

                            //Auto Rename the image_name
                            //Get the Extension of our image(.jpg etc)
                            $ext = end(explode('.', $image_name));

                            //Rename the image name
                            $image_name = "Product_Category_".rand(000, 999).'.'.$ext; 
                            
                            //e.g Food_Category_696.jpg


                            $source_path=$_FILES['image']['tmp_name'];

                            $destination_path="../IMAGES/category/".$image_name;

                            //Finally upload the image
                            $upload = move_uploaded_file($source_path,$destination_path);

                            //Check if the image is uploaded or not
                            //And if the image is not uploaded  the we will stop the process and return
                            if($upload == false)
                            {
                                //Set Message
                                $_SESSION['upload'] = "<div class = 'error'> Failed to Upload Image.</div>";
                                //Redirect to add category Page
                                header('location:'.SITEURL.'PHP/add-category.php');
                                //Stop the process
                                die();
                            }
                    }
                    }
                    else
                    {
                        //Dont upload the image and set the image name value as blank
                        $image_name="";
                    }

                    //Create SQL Query to insert category into database
                    $sql = "INSERT INTO tbl_category SET
                        title = '$title',
                        image_name='$image_name',
                        featured = '$featured',
                        active = '$active'
                    ";

                    // Execute SQL Query and save into database
                    $res = mysqli_query($conn, $sql);

                    //Check if query executed or not
                    if($res==true)
                    {
                        //Query Executed
                        $_SESSION['add'] = "<div class = 'success'>Category Added Successfully</div>";
                        //Redirect to Manage Category Page
                        header("location:".SITEURL.'PHP/manage-category.php');
                    }
                    else
                    {
                        //Failed to add category
                        $_SESSION['add'] = "<div class = 'error'>Failed to Add Category</div>";
                        //Redirect to Manage Category Page
                        header("location:".SITEURL.'PHP/add-category.php');
                    }
            }
        
        ?>

    </div>
</div>
        <!--Category End-->
<?php include('../PHP/footer.php'); ?>