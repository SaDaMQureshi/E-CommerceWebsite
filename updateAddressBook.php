<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");

$id = $_GET['id'];

$FullName = $_POST['FullName'];
$Address = $_POST['Address'];
$PhoneNo = $_POST['PhoneNo'];
$province = $_POST['province'];
$city = $_POST['city'];
$Area = $_POST['Area'];

$Updateaccount = $conn->query("UPDATE account SET 	FullName = '$FullName',  PhoneNo='$PhoneNo', Province='$province', City='$city', Area = '$Area', Address = '$Address'  WHERE id='$id'");
if ($Updateaccount == true) {
  echo "<script>alert('Account Updated');</script>";
  header("Location: ManageAcoount.php");
}
