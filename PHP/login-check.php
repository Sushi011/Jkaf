<?php
    //Authorization - access control
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user']))//if the user session is not set
    {
        //User is not logged in
        //Redirect to the login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        //redirect to login page
        header('location:'.SITEURL.'PHP/login.php');
    }

?>