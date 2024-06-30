<?php
session_start();
$id = $_GET['id'];

$conn = new mysqli("localhost", "root", "", "ecommerce");

$userUsername = $_SESSION['UserUsername'];
$fetchUserData = $conn->query("SELECT * FROM account WHERE Username = '$userUsername'");
$fetchedUserData = mysqli_fetch_assoc($fetchUserData);

$getProduct = $conn->query("SELECT * FROM product WHERE id='$id'");
$fetchproduct = mysqli_fetch_assoc($getProduct);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $fetchproduct['Name'] ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./CSS/product.css">
</head>

<body>
  <header>
    <nav>
      <a href="Store.php" id="websiteName">WebsiteName</a>
      <form action="searchProduct.php" method="post">
        <input type="text" placeholder="Search.." name="serchBar">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="ManageAcoount.php"><?php echo $fetchedUserData['Username'] ?></a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div id="productMenu">
      <div id="imageSide">
        <img src="<?php echo "./ProductImages/" . $fetchproduct['Image']; ?>" alt="<?php echo $fetchproduct['Name'] ?> ">
      </div>
      <div id="ContentSide">
        <h2><?php echo $fetchproduct['Name'] ?></h2>
        <h1>$<?php echo $fetchproduct['Price'] ?></h1>
        <p><?php echo $fetchproduct['Description'] ?></p>
        <button onclick="buyProduct(<?php echo $fetchproduct['id'] ?>)">Buy Now</button>
      </div>
    </div>
  </main>
  <script>
    function buyProduct(productId) {
      window.location.href = 'payment.php?id=' + productId;
    }
  </script>
</body>

</html>