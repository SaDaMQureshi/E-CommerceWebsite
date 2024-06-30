<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
$id = $_GET['id'];
$sql = $connection->query("DELETE FROM product WHERE id='" . $id . "' ");
header("location:Products.php");
