<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ecommerce");

// $product_id = $_GET['id'];

$product_id = $_SESSION['pKey'];

$userUsername = $_SESSION['UserUsername'];
$fetchUserData = $conn->query("SELECT * FROM account Where Username='$userUsername'");
$fetchedUserData = mysqli_fetch_assoc($fetchUserData);
$UserID = $fetchedUserData['id'];

$getProduct = $conn->query("SELECT * FROM product WHERE id = $product_id");
$product = mysqli_fetch_assoc($getProduct);

if (isset($_POST['order'])) {
  // product Details
  $UserId = $UserID;
  $productId = $product_id;
  $productQuantity = $_POST['Quantity'];

  // Billing Details
  $fullName = $_POST['FullName'];
  $Email = $_POST['Email'];
  $PhoneNo = $_POST['PhoneNo'];
  $Address = $_POST['Address'];
  $City = $_POST['City'];
  $State = $_POST['State'];

  // Payment method
  $payment = $_POST['payment'];

  // Order Summary
  $productPrize = $_POST['productPrize'];
  $totalAmoutOfProduct = $_POST['totalAmoutOfProduct'];
  $deliveryFee = $_POST['deliveryFee'];
  $subTotal = $_POST['subTotal'];
  $OrderDate = date("d-m-y");

  $fillOrder = $conn->query("INSERT INTO orders SET UserId='$UserId', ProductId='$productId', productQuanitity='$productQuantity', FullName='$fullName', Email='$Email', PhoneNo='$PhoneNo', Address='$Address', City='$City', State='$State', paymentMethod = '$payment', productPrize='$productPrize', TotalProductAmount='$totalAmoutOfProduct', shippingFee = '$deliveryFee', subTotal='$subTotal', OrderDate ='$OrderDate'");
  if ($fillOrder == true) {
    echo "<script>
  alert('Order Placed')
  ";
    echo "
</script>";
    header("Location: Store.php");
  }
}
