<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
$getOrders = $connection->query("SELECT * FROM orders");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin-Portal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./CSS/index.css">
</head>

<body>
  <main>
    <div id="sideBar">
      <a href="index.php" id="name">
        <h1>WebsiteName</h1>
      </a>
      <ul>
        <li><a href="index.php" id="selected">Orders</a></li>
        <li><a href="Products.php">Products</a></li>
        <li><a href="addProduct.html">Add Products</a></li>
        <li><a href="Users.php">Users</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
    </div>
    <div id="mainSide">
      <form action="searchOrder.php" method="post">
        <input type="text" name="searchOrder" placeholder="Search Order......">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      <hr>
      <main id="productsGrid">
        <table>
          <tr>
            <th>No</th>
            <th>Order#</th>
            <th>Order Date</th>
            <th>Customer Name</th>
            <th>Phone No</th>
            <th>Order</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Method</th>
            <th>Action</th>
          </tr>
          <?php
          $counter = 1; // Initialize the counter before the loop

          while ($fetchedOrders = mysqli_fetch_assoc($getOrders)) {
            echo "<tr>";
            echo "<td><p>" . $counter . "</p></td>";
            echo "<td><p>" . htmlspecialchars($fetchedOrders['id']) . "</p></td>";
            echo "<td><p>" . htmlspecialchars($fetchedOrders['OrderDate']) . "</p></td>";
            echo "<td><p>" . htmlspecialchars($fetchedOrders['FullName']) . "</p></td>";
            echo "<td><p>" . htmlspecialchars($fetchedOrders['PhoneNo']) . "</p></td>";
            echo "<td><p>" . htmlspecialchars($fetchedOrders['ProductId']) . "</p></td>";
            echo "<td><p>" . htmlspecialchars($fetchedOrders['TotalProductAmount']) . "$</p></td>";
            echo "<td><p>" . htmlspecialchars($fetchedOrders['productQuanitity']) . "</p></td>";
            echo "<td><p>" . htmlspecialchars($fetchedOrders['paymentMethod']) . "</p></td>";
            echo "<td><a href='CustomerOrder.php?id=" . htmlspecialchars($fetchedOrders['id']) . "'><i class='fa fa-search'></i> More</a></td>";
            echo "</tr>";
            $counter++; // Increment the counter at the end of each iteration
          }

          ?>
        </table>
      </main>
    </div>
  </main>
</body>

</html>