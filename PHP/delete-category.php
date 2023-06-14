<?php
    //Include the constant file
    include('../config/constant.php');
    //Check whether the id and image_name is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and delete
        //echo "Get Value and Delete";
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];
        
        //remove the phy image file if available
        if($image_name !=="")
        {
            //Image available then remove
            $path="../IMAGES/category/".$image_name;
            //remove the image file if it exists
            $remove = unlink($path);

            //FAILED TO REMOVE IMAGE , DISPLAY THE MESSAGE AND STOP THE PROCESS
            if($remove ==false)
            {
                //Set the session
                $_SESSION['remove']="<div class='error'>Failed to Remove Category Image</div>";
                //Redirect to manage category
                header('location:'.SITEURL.'PHP/manage-category.php');
                //Stop the process
                die();
            }
        }

        //Delete data from database
        //SQL delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check if the data is delete from datbase or not
        if ($res==true)
        {
            //Set success message and redirect
            $_SESSION['delete']="<div class='success'>Category Deleted Successfully.</div>";
            header('location:'.SITEURL.'PHP/manage-category.php');
        }
        else
        {
            //Set failed message
            $_SESSION['delete']="<div class='error'>Failed to Delete Category.</div>";
            header('location:'.SITEURL.'PHP/manage-category.php');
            
        }

        //Redirect to Manage category w/ message
    }
    else
    {
        //Redirect to manage Category Page
        header('location:'.SITEURL.'PHP/manage-category.php');
    }
?>