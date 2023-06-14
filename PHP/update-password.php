<?php include('../PHP/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

            <?php
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                }            
            ?>

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Current Password:</td>
                        <td>
                            <input type="password" name="current_password" placeholder="Current Password">
                        </td>

                    </tr>
                        <td>New Password:</td>
                        <td>
                            <input type="password" name="new_password" placeholder="New Password">
                        </td>
                    <tr>

                    <tr>

                    </tr>
                        <td>Confirm Password:</td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                        <input type="hidden" name= "id" value = "<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

    </div>
</div>

<?php
        //Check whether the submit button is clicked or not
        if(isset($_POST['submit']))
        {
            //echo "Clicked";
            //Get the data from form submit
            $_POST['id'];
            $current_password = md5($_POST['current_password']);//Use md5 to encrpyt the password
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //Check whether the user with current id and pasword exist or not
            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

            //Execute the query
            $res = mysqli_query($conn,$sql);

            if ($res==true)
            {
                //Check whether the data is available or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //User exist and password can be changed
                    //echo "User Found";
                    //Check whether the new paswword and confirm match or not
                    if($new_password==$confirm_password)
                    {
                        //Update the password
                        //echo "Password Match";
                        $sql2="UPDATE tbl_admin SET
                            password='$new_password'
                            WHERE id=$id
                        ";

                        //Execute the Query
                        $res2 = mysqli_query($conn,$sql2);

                        //Check the query is executed or Not
                        if($res2==true)
                        {
                            //display the success message
                            //redirect to manage admin page with Success Message
                            $_SESSION['change-pwd']="<div class='success'>Password Change Successfully!</div>";
                            //Redirect the USer
                            header('location:'.SITEURL.'PHP/manage-admin.php');
                        }
                        else
                        {
                            //display the Error message
                            //redirect to manage admin page with Error Message
                            $_SESSION['change-pwd']="<div class='error'>Password Change Successfully</div>";
                            //Redirect the USer
                            header('location:'.SITEURL.'PHP/manage-admin.php');
                        }
                    }
                    else
                    {
                        //redirect to manage admin page with Error Message
                        $_SESSION['pwd-not--match']="<div class='error'>Not Match. Try Again.</div>";
                        //Redirect the USer
                        header('location:'.SITEURL.'PHP/manage-admin.php');

                    }
                }
                else
                {
                    //User does not exist and set message and redirect
                    $_SESSION['user-not-found']="<div class='error'>User Not Found</div>";
                    //Redirect the USer
                    header('location:'.SITEURL.'PHP/manage-admin.php');
                }
            }

            // Check whether the New password AND CONFIRM password match or not

            //CHANGE PASSWORD IF ALL ABOVE IS TRUE
        }
?>

<?php include('../PHP/footer.php'); ?>