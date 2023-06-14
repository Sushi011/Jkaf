<?php
include('../PHP/menu.php');

$currentDate = date("Y-m-d");
$startDate = date("Y-m-d", strtotime("-1 week", strtotime($currentDate)));

// Get the total daily sales
$sql = "SELECT SUM(total) AS weekly_sales FROM tbl_checkout WHERE order_date BETWEEN '$startDate' AND '$currentDate' AND status = 'Delivered'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$weeklySales = $row['weekly_sales'];

?>

<div class="main-content">
    <div class="wrapper">

        <h1>Dashboard</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <br><br>

        <div class="col-4 text-center">
            <h1>₱ <?php echo number_format($dailySales); ?></h1>
            <br />
            Daily Sales
        </div>

        <div class="col-4 text-center">

            <?php 
                //Sql Query 
                $sql2 = "SELECT * FROM tbl_product";
                //Execute Query
                $res2 = mysqli_query($conn, $sql2);
                //Count Rows
                $count2 = mysqli_num_rows($res2);
            ?>

            <h1><?php echo $count2; ?></h1>
            <br />
            Weekly Sales
        </div>

        <div class="col-4 text-center">
            
            <?php 
                //Sql Query 
                $sql3 = "SELECT * FROM tbl_checkout";
                //Execute Query
                $res3 = mysqli_query($conn, $sql3);
                //Count Rows
                $count3 = mysqli_num_rows($res3);
            ?>

            <h1><?php echo $count3; ?></h1>
            <br />
            Monthly Sales
        </div>

        <div class="col-4 text-center">
            
            <?php 
                //Creat SQL Query to Get Total Revenue Generated
                //Aggregate Function in SQL
                $sql4 = "SELECT SUM(total) AS Total FROM tbl_checkout WHERE status='Delivered'";

                //Execute the Query
                $res4 = mysqli_query($conn, $sql4);

                //Get the Value
                $row4 = mysqli_fetch_assoc($res4);
                
                //Get the Total Revenue
                $total_revenue = $row4['Total'];

            ?>

            <h1>₱ <?php echo number_format($total_revenue); ?></h1>
            <br />
            Yearly Sales
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!-- Main Content Section Ends -->
<!--Footer Section Start-->
<?php include('../PHP/footer.php'); ?>
