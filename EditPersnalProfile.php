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
  <title>Edit Persnal Profile</title>
  <link rel="stylesheet" href="./CSS/persnalProfile.css">
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
    <form action="updatePersnalProfile.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
      <label for="">Full Name <br> <input type="text" name="Username" value="<?php echo $fetchedUserData['Username'] ?>"></label>
      <label for="">Email <br> <input type="text" name="Email" value="<?php echo $fetchedUserData['Email'] ?>"></label>
      <label for="">Mobile No <br> <input type="text" name="MobileNo" value="<?php echo $fetchedUserData['MobileNo'] ?>"></label>
      <label for="">Birthday <br> <input type="date" name="Birthday" value="<?php echo $fetchedUserData['Birthday'] ?>"></label>
      <label for="">Gender <br>
        <select name="Gender">
          <option value="" selected disabled>Select Gender</option>
          <option value="Men">Men</option>
          <option value="Women">Women</option>
        </select>
      </label>
      <label for="">Profile <br> <input type="file" name="Profile"></label>
      <input type="submit" value="Save Changes" name="subBtn">
    </form>
  </main>

</body>

</html>