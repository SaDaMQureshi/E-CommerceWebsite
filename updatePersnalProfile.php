<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");

$id = $_GET['id'];

$Username = $_POST['Username'];
$Email = $_POST['Email'];
$MobileNo = $_POST['MobileNo'];
$Birthday = $_POST['Birthday'];
$Gender = $_POST['Gender'];

$filename = $_FILES["Profile"]['name'];
$tempname = $_FILES["Profile"]["tmp_name"];
$folder = "./UsersImages/" . $filename;
if (move_uploaded_file($tempname, $folder)) {
  echo "File uploaded successfully.";
} else {
  echo "Failed to upload file.";
}

$Updateaccount = $conn->query("UPDATE account SET Username = '$Username', Email='$Email', MobileNo='$MobileNo', Birthday='$Birthday', Gender='$Gender', 	Image='$filename' WHERE id='$id'");
if ($Updateaccount == true) {
  echo "<script>alert('Account Updated');</script>";
  header("Location: ManageAcoount.php");
}
