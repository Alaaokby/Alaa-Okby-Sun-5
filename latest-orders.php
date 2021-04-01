<form method="GET" action="latest-orders.php">
    <input name="order" type="number">
    <input type="submit" name="submit">

</form>

<?php
if(isset($_GET['submit']))
{
    $conn=mysqli_connect("localhost","root","","firstdb");
    $number=$_GET['order'];
    $query="SELECT * FROM orders
    ORDER BY orderDate DESC
    LIMIT $number ";
    $result=mysqli_query($conn,$query);
    $customers=mysqli_fetch_all($result,MYSQLI_ASSOC);
    // header("Content-Type: application/json");
     print_r($customers);
}

?>