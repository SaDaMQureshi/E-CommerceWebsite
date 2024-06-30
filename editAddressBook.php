<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");


$id = $_GET['id'];

$fetchUserData = $conn->query("SELECT * FROM account WHERE id='$id'");
$fetchedUserData = mysqli_fetch_assoc($fetchUserData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Address Book</title>
  <link rel="stylesheet" href="./CSS/addressBook.css">
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
    <form action="updateAddressBook.php?id=<?php echo $id; ?>" method="post">
      <label for="">Full Name <br> <input type="text" name="FullName" value="<?php echo $fetchedUserData['FullName'] ?>"></label>
      <label for="">Address <br> <input type="text" name="Address" value="<?php echo $fetchedUserData['Address'] ?>"></label>
      <label for="">Phone No <br> <input type="text" name="PhoneNo" value="<?php echo $fetchedUserData['PhoneNo'] ?>"></label>
      <label for="">Province/Territory <br> <input type="text" name="province" value="<?php echo $fetchedUserData['Province'] ?>"></label>
      <label for="">City <br> <input type="text" name="city" value="<?php echo $fetchedUserData['City'] ?>"></label>
      <label for="">Area <br> <input type="text" name="Area" value="<?php echo $fetchedUserData['Area'] ?>"></label>
      <input type="submit" value="Save Changes" name="subBtn" id="subBtn">
    </form>
  </main>

</body>

</html>