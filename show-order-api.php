<form method="GET" action="show-order-api.php">
    <input name="orderNumber" type="number" placeholder="order number">
    <input type="submit" name="submit">

</form>
<?php 

if(isset($_GET['submit']))
{
    $conn=mysqli_connect("localhost","root","","firstdb");
    $orderNumber=$_GET['orderNumber'];
    $query="SELECT * FROM `orders`
    WHERE orderNumber=$orderNumber ";
    $result=mysqli_query($conn,$query);
    $customers=mysqli_fetch_assoc($result);
    // header("Content-Type: application/json");
    //  print_r($customers);
     echo json_encode($customers);
}




?>