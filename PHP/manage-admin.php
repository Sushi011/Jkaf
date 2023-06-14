<?php include('../PHP/menu.php'); ?>

        <!--Main Content Section Start-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br>

                <?php
                    if (isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];//Displaying Session Message
                        unset($_SESSION['add']);//Removing Session Message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];//Removing Session Message
                        unset($_SESSION['delete']);//Removing Session Message
                    }

                    if (isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];//Update Session Message
                        unset($_SESSION['update']);
                    }

                    if (isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];//user not found Message
                        unset($_SESSION['user-not-found']);
                    }

                    if (isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];//Password not match Message
                        unset($_SESSION['pwd-not-match']);
                    }

                    if (isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];//Change Password Message
                        unset($_SESSION['change-pwd']);
                    }
                ?>
                <br><br><br>
                <!--Button to Add Admin-->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br> <br> <br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //Query to get all admin
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);
                        //Check whether the query is execute or not.
                        if ($res==TRUE)
                        {
                            //Count Rows to check wheter we have data in database or not
                            $count = mysqli_num_rows($res); //Function to get all the rows in database

                            $sn=1; //Create a variable and assign the value
                            //Check the num of rows
                            if($count>0)
                            {
                                //We have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using while loop to get all the data in database.
                                    //And while loop will run as long as we have data in database.

                                    //Get individual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //Display the values in our table
                                    ?>

                                    <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                     <td>
                                        <a href="<?php echo SITEURL; ?>PHP/update-password.php?id=<?php echo $id; ?>" class="btn-primary"> Change Password</a>
                                        <a href="<?php echo SITEURL; ?>PHP/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin </a>
                                        <a href="<?php echo SITEURL; ?>PHP/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin </a>
                                     </td>
                                    </tr>    

                                    <?php

                                }
                            }
                            else
                            {
                                //We dont HAVE data in database
                            }

                        }
                    ?>


                </table>

            </div>
        </div>
        <!--Menu Content Section End-->

        <!--Footer Section Start-->
 <?php include('../PHP/footer.php'); ?>
