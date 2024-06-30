<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./CSS/login.css">
</head>

<body>
  <div id="main-Container">
    <div id="ImageSide">
      <h2>Welcome Back</h2>
    </div>
    <div id="FormSide">
      <form action="" method="post">
        <h1>Login</h1>
        <label for="">Email <br>
          <input type="text" name="email" placeholder="Enter Email">
        </label>
        <label for="">Password <br>
          <input type="password" name="password" placeholder="Enter Password">
        </label>
        <input type="submit" value="Login" name="SubBtn">
        <p id="rigester">Not have a Account? <a href="rigester.php">Rigester</a></p>
      </form>
    </div>
  </div>
</body>

</html>
<?php
session_start();
if (isset($_POST['SubBtn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $LoginAccount = $connection->query("SELECT * FROM account WHERE Email = '$email' && password = '$password'");
  $fetchUserData = mysqli_fetch_array($LoginAccount);
  $fetchedEmail = $fetchUserData['Email'];
  $fetchedPass = $fetchUserData['password'];
  $fetchedUsername = $fetchUserData['Username'];
  // Session 
  $_SESSION['UserUsername'] = $fetchedUsername;
  // Login And Transfer to Main Page
  if ($email == $fetchedEmail &&  $password == $fetchedPass) {
    header("Location: Store.php");
  } else {
    echo "<script>
    alert('Your Username Or Password Is Incorrect');
    </script>";
  }
}



?>