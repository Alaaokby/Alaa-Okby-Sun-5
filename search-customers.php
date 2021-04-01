<form method="GET" action="search-customers.php">
    <input name="customerName" type="text" placeholder="search by name or letter">
    <input type="submit" name="submit">

</form>
<?php 

if(isset($_GET['submit']))
{
    $conn=mysqli_connect("localhost","root","","firstdb");
    $cusName=$_GET['customerName'];
    $query="SELECT customerName FROM `customers` 
    WHERE customerName LIKE '%$cusName%' ";
    $result=mysqli_query($conn,$query);
    $customers=mysqli_fetch_all($result,MYSQLI_ASSOC);
    // header("Content-Type: application/json");
    //  print_r($customers);
     echo json_encode($customers);
}




?>