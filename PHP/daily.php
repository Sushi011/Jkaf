<?php
include('../PHP/menu.php');

$currentDate = date("Y-m-d");

// Get the total daily sales
$sql = "SELECT SUM(total) AS daily_sales FROM tbl_checkout WHERE DATE(order_date) = '$currentDate' AND status = 'Delivered'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$dailySales = $row['daily_sales'];

if (!$dailySales) {
    $dailySales = 0;
}

// Get the total weekly sales
$startDate = date("Y-m-d", strtotime("-1 week"));
$endDate = date("Y-m-d");
$sql2 = "SELECT SUM(total) AS weekly_sales FROM tbl_checkout WHERE DATE(order_date) BETWEEN '$startDate' AND '$endDate' AND status = 'Delivered'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$weeklySales = $row2['weekly_sales'];

if (!$weeklySales) {
    $weeklySales = 0;
}
// Get the total monthly sales
$currentMonth = date("Y-m");
$sql2 = "SELECT SUM(total) AS monthly_sales FROM tbl_checkout WHERE DATE_FORMAT(order_date, '%Y-%m') = '$currentMonth' AND status = 'Delivered'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$monthlySales = $row2['monthly_sales'];

if (!$monthlySales) {
    $monthlySales = 0;
}

// Get the total yearly sales
$currentYear = date("Y");
$sql3 = "SELECT SUM(total) AS yearly_sales FROM tbl_checkout WHERE YEAR(order_date) = '$currentYear' AND status = 'Delivered'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$yearlySales = $row3['yearly_sales'];

if (!$yearlySales) {
    $yearlySales = 0;
}

?>

<div class="main-content">
    <div class="wrapper">

        <h1>Sales Report</h1>
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

            <h1>₱ <?php echo number_format($weeklySales); ?></h1>
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

            <h1>₱ <?php echo number_format($monthlySales); ?></h1>
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

            <h1>₱ <?php echo number_format($monthlySales); ?></h1>
            <br />
            Yearly Sales
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!-- Main Content Section Ends -->
<!--Footer Section Start-->
<?php include('../PHP/footer.php'); ?>
