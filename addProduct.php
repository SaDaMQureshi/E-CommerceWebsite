<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productDisc = $_POST['productDisc'];

$filename = $_FILES["productImg"]['name'];
$tempname = $_FILES["productImg"]["tmp_name"];
$folder = "../ProductImages/" . $filename;
if (move_uploaded_file($tempname, $folder)) {
  echo "File uploaded successfully.";
} else {
  echo "Failed to upload file.";
}

$checkProduct = $connection->query("SELECT * from product WHERE Name = '$productName'");
if ($checkProduct->num_rows > 0) {
  echo "<script>
      alert('Product Already Existed')";
  echo "</script>";
} else {
  $insertProduct = $connection->query("INSERT INTO product SET Name='$productName', Price='$productPrice', Description='$productDisc', Image='$filename'");
  if ($insertProduct == true) {
    echo "<script>
      alert('Product Inserted')";
    echo "</script>";
    header("location: addProduct.html");
  }
}
