<?php include('../PHP/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>
        <?php
            //1. Get the id of the selected administrator
            $id=$_GET['id'];

            //2. Get SQL query to get the details of the administrator
            $sql="SELECT*FROM tbl_admin WHERE id=$id";

            //3. Excecute the QUERY
            $res=mysqli_query($conn,$sql);

            // Check whether the query is exceuted or not
            if($res==true)
            {
                //Check the data is available or not
                $count=mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    //We willl get the details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];

                }
                else
                {
                    //Redirect to manage admin page
                    header('location:'.SITEURL.'PHP/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                    <input type="hidden" name= "id" value = "<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>



            </table>
        </form>
    </div>
</div>
<?php
        //Check whether the Submit button is clicked or not
        if(isset($_POST['submit']))
        {
            //echo "Button Clicked";
            //Get the all value from the form to update the
            $id=$_POST['id'];
            $full_name=$_POST['full_name'];
            $username=$_POST['username'];

            //Create a SQL Query to update the admin
            $sql = "UPDATE tbl_admin SET
            full_name = '$full_name',
            username = '$username' 
            WHERE id = '$id'
            ";

            //Excecute the SQL query
            $res=mysqli_query($conn,$sql);

            //Check whther the query exceuted successfully or not
            if($res==true)
            {
                //Query exceuted the admin update
                $_SESSION['update']="<div class = 'success'>Admin Update Successfully.</div>";
                //Redirect to Manage Admin Page
                header('location:'.SITEURL.'PHP/manage-admin.php');
            }
            else
            {
                //Failed to update the admin
                $_SESSION['update']="<div class = 'error'>Failed to Delete Admin.</div>";
                //Redirect to Manage Admin Page
                header('location:'.SITEURL.'PHP/manage-admin.php');
            }
        }
?>


<?php include('../PHP/footer.php'); ?>