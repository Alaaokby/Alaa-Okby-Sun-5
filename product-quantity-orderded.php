<!-- SELECT sum(quantityOrdered) as total FROM orderdetails
WHERE productCode=(
SELECT productCode FROM products
WHERE productName="1969 Harley Davidson Ultimate Chopper"
) -->

<form method="GET" action="product-quantity-orderded.php">
    <input name="prName" type="text">
    <input type="submit" name="submit">

</form>
<?php 

if(isset($_GET['submit']))
{
    $conn=mysqli_connect("localhost","root","","firstdb");
    $prName=$_GET['prName'];
    $query="SELECT SUM(quantityOrdered) AS total FROM products JOIN orderdetails
    on products.productCode=orderdetails.productCode
    WHERE productName='$prName' ";
    $result=mysqli_query($conn,$query);
    $customers=mysqli_fetch_all($result,MYSQLI_ASSOC);
    // header("Content-Type: application/json");
    //  print_r($customers);
     echo json_encode($customers);
}




?>