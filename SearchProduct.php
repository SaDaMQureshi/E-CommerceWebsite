<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
$SerchProduct = $_POST['searchBar'];

$searchProducts = $connection->query("SELECT * FROM product WHERE name LIKE '%$SerchProduct%' OR description LIKE '%$SerchProduct%'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./CSS/products.css">
</head>

<body>
  <main>
    <div id="sideBar">
      <a href="index.php" id="name">
        <h1>WebsiteName</h1>
      </a>
      <ul>
        <li><a href="index.php">Orders</a></li>
        <li><a href="Products.php" id="selected">Products</a></li>
        <li><a href="addProduct.php">Add Products</a></li>
        <li><a href="Users.php">Users</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
    </div>
    <div id="mainSide">
      <form action="SearchProduct.php" method="post">
        <input type="text" name="searchBar" placeholder="Search Product......">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      <hr>
      <main id="productsGrid">
        <?php
        if ($searchProducts->num_rows > 0) {
          while ($fetchedProducts = mysqli_fetch_assoc($searchProducts)) {
            echo "<div class='card'>";
            echo "<div class='img-box'> <img src='../ProductImages/" . htmlspecialchars($fetchedProducts['Image']) . "' alt='" . htmlspecialchars($fetchedProducts['Name']) . "'> </div><div class='content-box'>";
            echo "<h2>" . htmlspecialchars($fetchedProducts['Name']) . "</h2>";
            echo "<p>$" . htmlspecialchars($fetchedProducts['Price']) . "</p>";
            echo "<div class='btns'><a href='editProduct.php?id=" . htmlspecialchars($fetchedProducts['id']) . "'><i class='fa fa-edit'>Edit</i></a>
              <a href='deleteProduct.php?id=" . htmlspecialchars($fetchedProducts['id']) . "'><i class='fa fa-trash'>Delete</i></a>
              </div></div>";
            echo "</div>";
          }
        } else {
          echo "<p>No results found</p>";
        }

        ?>
      </main>
    </div>
  </main>
</body>

</html>