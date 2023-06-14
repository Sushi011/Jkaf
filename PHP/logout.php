<?php
    //Constant
    include('../config/constant.php');

    //Destroy the session 
    session_destroy();//Unsets $_SESSION['user']
    
    //Redirect to login page
    header('location:'.SITEURL.'PHP/login.php');
?>