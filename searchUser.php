<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./CSS/users.css">
</head>

<body>
  <main>
    <div id="sideBar">
      <a href="index.php" id="name">
        <h1>WebsiteName</h1>
      </a>
      <ul>
        <li><a href="index.php">Orders</a></li>
        <li><a href="Products.php">Products</a></li>
        <li><a href="addProduct.html">Add Products</a></li>
        <li><a href="Users.php" id="selected">Users</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
    </div>
    <div id="mainSide">
      <form action="searchUser.php" method="post">
        <input type="text" name="searchUser" placeholder="Search User......">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      <hr>
      <main id="productsGrid">
        <?php
        $connection = new mysqli("localhost", "root", "", "ecommerce");
        $searchUser = $_POST['searchUser'];
        $fetchUsers = $connection->query("SELECT * FROM account WHERE Username LIKE '%$searchUser%' OR Email LIKE '%$searchUser%'");
        if ($fetchUsers->num_rows > 0) {
          while ($fetched = mysqli_fetch_assoc($fetchUsers)) {
            echo "<div class='profile-card'>";
            echo " <img src='../UsersImages/" . $fetched['Image'] . "' alt='" . $fetched['Username'] . "' class='profile-pic'>";
            echo "<h2>" . $fetched['Username'] . "</h2>";
            echo "<p>" . $fetched['Email'] . "</p>";
            echo "<a href='#'><button>Show Profile</button></a></div>";
          }
        }
        ?>
      </main>
    </div>
    </div>
  </main>