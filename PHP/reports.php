<?php
include('../PHP/menu.php');

// Get the current date
$currentDate = date("Y-m-d");

// SQL query to retrieve daily sales data
$sql = "SELECT * FROM tbl_checkout WHERE DATE(order_date) = '$currentDate'";
$result = mysqli_query($conn, $sql);

// Check if there are any sales for the current day
if (mysqli_num_rows($result) > 0) {
    ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Daily Sales Report - <?php echo $currentDate; ?></h1>
            <br><br>
            <?php 
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br><br>
            <div class="col-12">
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    // Iterate over each sales record and display it in a table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . (isset($row['order_id']) ? $row['order_id'] : '') . "</td>";
                        echo "<td>" . (isset($row['product_name']) ? $row['product_name'] : '') . "</td>";
                        echo "<td>" . (isset($row['quantity']) ? $row['quantity'] : '') . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['total'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "No sales found for today.";
}

include('../PHP/footer.php');
?>
