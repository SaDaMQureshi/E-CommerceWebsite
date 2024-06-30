<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
session_start();

$userUsername = $_SESSION['UserUsername'];
$fetchUserData = $connection->query("SELECT * FROM account Where Username='$userUsername'");
$fetchedUserData = mysqli_fetch_assoc($fetchUserData);
$UserId = $fetchedUserData['id'];

$SerchProduct = $_POST['serchBar'];

$searchProducts = $connection->query("SELECT * FROM product WHERE name LIKE '%$SerchProduct%' OR description LIKE '%$SerchProduct%'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Store</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./CSS/store.css">
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
  <h1 id="middleText">Searched Result</h1>
  <main>
    <?php
    while ($product = mysqli_fetch_assoc($searchProducts)) {
      echo "<a href='product.php?id=" . $product['id'] . "' class='box'>";
      echo "<div class='productBox'>";
      echo "<div class='imgBox'><img src='ProductImages/" . $product['Image'] . "' alt='" . $product['Name'] . "'></div>";
      echo "<h3>" . $product['Name'] . "</h3>";
      echo "<p>$" . $product['Price'] . "</p>";
      echo "</div></a>";
    }
    ?>
  </main>

</body>

</html>