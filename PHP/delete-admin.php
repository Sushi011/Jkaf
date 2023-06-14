<?php
    //Inlude constant.php file here
    include ('../config/constant.php');

    //Get the id of the admin to be deleted
    echo $id = $_GET['id']; 
    
    //Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query is execute successfully or not
    if($res==TRUE)
    {
            //Query Excuted Successfully And Admin Deleted
            //echo "Admin Deleted";  
            //Create Session Variable to Display message
            $_SESSION['delete'] = "<div class = 'success'>Admin Deleted Successfully</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'PHP/manage-admin.php');

    }
    else
    {
            //Failed to Delete Admin
            //echo "Failed to Delete Admin";

            $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Admin, Try Again Later.</div>";
            header('location:'.SITEURL.'PHP/manage-admin.php');
           
    }

            //Redirect to Manage Admin page with the message (success/error)

?>