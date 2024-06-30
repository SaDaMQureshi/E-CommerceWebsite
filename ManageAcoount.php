<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
session_start();
$userUsername = $_SESSION['UserUsername'];
$fetchUserData = $connection->query("SELECT * FROM account WHERE Username ='$userUsername'");
$fetchedUserData = mysqli_fetch_assoc($fetchUserData);


$fetchProducts = $connection->query("SELECT * FROM product");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Store</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./CSS/manageUser.css">
</head>

<body>
  <header>
    <nav>
      <a href="Store.php" id="websiteName">WebsiteName</a>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="ManageAcoount.php"><?php echo $fetchedUserData['Username'] ?></a></li>
      </ul>
    </nav>
  </header>
  <main id="userData">
    <h2>Manage My Account</h2>
    <div class="data">
      <div id="PersnalProfile">
        <h3>Persnal Profile<a href="EditPersnalProfile.php?id=<?php echo $fetchedUserData['id'] ?>">Edit</a></h3>
        <h3><?php echo $fetchedUserData['Username'] ?></h3>
        <p><?php echo $fetchedUserData['Email']  ?>
        <p>
      </div>
      <div id="addressBook">
        <h3>Address Book<a href="editAddressBook.php?id=<?php echo $fetchedUserData['id'] ?>">Edit</a></h3>
        <h3><?php echo $fetchedUserData['FullName'] ?></h3>
        <p><?php echo $fetchedUserData['Address'] ?></p>
        <p><?php echo $fetchedUserData['Area'] ?></p>
        <p><?php echo $fetchedUserData['PhoneNo'] ?></p>
      </div>
    </div>
  </main>
</body>

</html>