<?php include('../config/constant.php')?>
<html>
    <head>
        <title>Login - Product Order System</title>
        <link rel="stylesheet" href="../CSS/admin.css">
    </head>

    <body>
        <div class = "login">
            <h1 class="text-center">Login</h1>
            <br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!--Login Start-->
            <form action="" method="POST" class="text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password:<br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
            </form>
            <!--Login End-->


            <p class="text-center"> Created By: GROUP OTLUM</p>
    </body>
</html>

<?php

    //Check whether the submit button is clicked or not
    if (isset($_POST['submit']))
    {
        //Process for login
        //1. Get the data from login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

        //3. Execute the query and
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user is exists or not
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            //User Available and login success
            $_SESSION['login'] = "<div class='success text-center'>Login Succesful</div>";
            $_SESSION['user'] = $username;// to check if user is already logged in or not and logout will unset it
            //Redirect to Home Page/DASHBOARD
            header('location:'.SITEURL.'PHP/homepage.php');
        }
        else
        {
            //User not Available
            $_SESSION['login'] = "<div class='error text-center'>Username and Password did not match.</div>";
            //Redirect to Home Page/DASHBOARD
            header('location:'.SITEURL.'PHP/login.php');
        }
    }


?>