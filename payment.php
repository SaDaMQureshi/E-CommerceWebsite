<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ecommerce");

$product_id = $_GET['id'];

$_SESSION['pKey'] = $product_id;

$userUsername = $_SESSION['UserUsername'];
$fetchUserData = $conn->query("SELECT * FROM account Where Username='$userUsername'");
$fetchedUserData = mysqli_fetch_assoc($fetchUserData);
$UserId = $fetchedUserData['id'];

$getProduct = $conn->query("SELECT * FROM product WHERE id = $product_id");
$product = mysqli_fetch_assoc($getProduct);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shipping Methods</title>
  <link rel="stylesheet" href="./CSS/payment.css">
</head>

<body>
  <form action="placeOrder.php" method="post">
    <main id="productSection">
      <div id="imageSide">
        <img src="<?php echo "./ProductImages/" . $product['Image']; ?>" alt="<?php echo $product['Name'] ?>">
      </div>
      <div id="ContentSide">
        <h2><?php echo $product['Name'] ?></h2>
        <h2>$<?php echo $product['Price'] ?></h2>
        <p><?php echo $product['Description'] ?></p>
        <label for="">Qauntity <br> <select name="Quantity" id="Quantity" onchange="check()">
            <option value="" selected disabled>Choose Option</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select></label>
      </div>
    </main>
    <section id="billingDetails">
      <h2>Biling Details</h2>
      <div id="form">
        <label for="">Full Name <br> <input type="text" name="FullName" placeholder="FullName" value="<?php echo $fetchedUserData['FullName'] ?>"></label>
        <label for="">Email <br> <input type="text" name="Email" placeholder="Email Adress" value="<?php echo $fetchedUserData['Email'] ?>"></label>
        <label for="">Phone No <br> <input type="text" name="PhoneNo" placeholder="Phone No" value="<?php echo $fetchedUserData['PhoneNo'] ?>"></label>
        <label for="">Address <br> <input type="text" name="Address" placeholder="Full Home Address" value="<?php echo $fetchedUserData['Address'] ?>"></label>
        <label for="">City <br> <input type="text" name="City" placeholder="City" value="<?php echo $fetchedUserData['City'] ?>"></label>
        <label for="">State <br> <input type="text" name="State" placeholder="State" value="<?php echo $fetchedUserData['Province'] ?>"></label>
      </div>
    </section>
    <section id="PaymentInforamtion">
      <h2>Payment Method</h2>
      <label class="paypal-radio">
        <input type="radio" name="payment" value="COD">
        <span>Cash On Delivery</span>
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhr6hbKorvAgWBiRCUrK0LiA1pLIV4wvDOYyw1ewv1sf5TC8burBvpp-MhgSyAXcW1PyG9JdZj6ub_5E4GVdKiSRbS_jVfYFpQnBZXu6cZHGEsSt6h2K0s3LBVLpFvx-l6JvPC0uU2iOsjV/s1600/cod.jpg" alt="PayPal Logo">
      </label>
    </section>
    <section id="OrderSummrey">
      <h2>Order Summary</h2>
      <p><?php echo  $product['Name'] ?> <span>x1</span> <input type="text" name="productPrize" value="<?php echo $product['Price'] ?>" id="productPrize"></p>
      <hr>
      <p>SubTotal <input type="text" name="totalAmoutOfProduct" onchange="check()" id="totalAmoutOfProduct" readonly></p>
      <p>Shipping <input type="text" name="deliveryFee" onchange="check()" id="deliveryFee" value="10" readonly></p>
      <p>Total <input type="text" name='subTotal' id="totalAmount" onchange="check()" readonly></p>
      <input type="submit" value="Place Order" name="order" id="po">
    </section>
  </form>
</body>
<script src="./JavaScript/orderSummrey.js"></script>

</html>
<?php

?>