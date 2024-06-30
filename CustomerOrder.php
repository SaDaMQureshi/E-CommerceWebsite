<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");
session_start();
$Orderid = $_GET['id'];
$orderDetail = $conn->query("SELECT A.Username , A.Email, A.MobileNo , A.Address , A.City , A.Area , A.Province, P.Name,  
O.paymentMethod, O.productPrize, O.TotalProductAmount, O.productQuanitity, O.OrderDate, O.subTotal 
FROM orders AS O
INNER JOIN product as P ON P.id = O.ProductId
INNER JOIN account as A ON A.id = O.UserId

WHERE O.id = '$Orderid'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Order</title>
</head>

<body>

</body>

</html>