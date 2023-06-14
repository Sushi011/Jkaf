<!--Navbar Section Start-->
<?php include('../PHP/menu.php'); ?>

<!--Main Content Section Start-->
<div class="main-content">
    <div class="wrapper">
        <h1> Add Administrator</h1>
        <br><br>

        <?php
            if (isset($_SESSION['add']))//Checking whether the Session is SET or NOT.
            {
                echo $_SESSION['add'];//Displaying Session Message
                unset($_SESSION['add']);//Removing Session Message
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter your Name:"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter your Username:"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="text" name="password" placeholder="Enter your Password:"></td>
                </tr>

                <tr>
                    <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>                
                </tr>
            </table>

        </form>
    </div>
</div>

<!--Footer Section Start-->
 <?php include('../PHP/footer.php'); ?>

 <?php
    //Procees the value from Form and Save it in Database

    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Button clicked
        //echo "Button Clicked";

        //1. Get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encrption md5

        //2. SQL Query to save the data into database
        $sql = "INSERT INTO tbl_admin SET 
        full_name = '$full_name', 
        username = '$username', 
        password = '$password'
        ";
        
        //3. Execute SQL Query and Save data in Database
        $res = mysqli_query($conn, $sql) or die(mysql_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display a Message Message
            $_SESSION['add'] = "Admin Added Succesfully!";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'PHP/manage-admin.php');
        }
        else
        {
            //Failed to Insert Data
            //echo "Failed to Insert Data";
            //Create a Session Variable to Display a Message Message
            $_SESSION['add'] = "Failed to Add Admin.";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'PHP/manage-admin.php');
            
        }
    
    }
 ?>
