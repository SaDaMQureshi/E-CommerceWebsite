<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
$id = $_GET['id'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productDisc = $_POST['productDisc'];

$filename = $_FILES["productImg"]['name'];
$tempname = $_FILES["productImg"]["tmp_name"];
$folder = "./ProductImages/" . $filename;
if (move_uploaded_file($tempname, $folder)) {
  echo "File uploaded successfully.";
} else {
  echo "Failed to upload file.";
}

$insertProduct = $connection->query("UPDATE product SET Name='$productName', Price='$productPrice', Description='$productDisc', Image='$filename' WHERE id='$id'");
if ($insertProduct == true) {
  echo "<script>
      alert('Product Updated')";
  echo "</script>";
  header("location:Products.php");
}
