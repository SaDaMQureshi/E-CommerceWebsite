<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up</title>
  <link rel="stylesheet" href="./CSS/login.css">
</head>

<body>
  <div id="main-Container">
    <div id="ImageSide">
      <h2>Welcome To Our Store</h2>
    </div>
    <div id="FormSide">
      <form action="" method="post" enctype="multipart/form-data">
        <h1>Signup</h1>
        <label for="">Username <br>
          <input type="text" name="Username" placeholder="Enter Your Username">
        </label>
        <label for="">Email <br>
          <input type="text" name="email" placeholder="Enter Your Email">
        </label>
        <label for="">Password <br>
          <input type="password" name="password" placeholder="Enter Password">
        </label>
        <label for="">Profile <br>
          <input type="file" name="UserImg">
        </label>
        <input type="submit" value="Sign Up" name="signupBtn">
        <p id="rigester">Already have a Account? <a href="login.php">Login</a></p>
      </form>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST['signupBtn'])) {
  $Username = $_POST['Username'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  $filename = $_FILES["UserImg"]['name'];
  $tempname = $_FILES["UserImg"]["tmp_name"];
  $folder = "./UsersImages/" . $filename;
  if (move_uploaded_file($tempname, $folder)) {
    echo "File uploaded successfully.";
  } else {
    echo "Failed to upload file.";
  }

  $checkAccount = $connection->query("SELECT * FROM account WHERE Email = '$email'");
  if ($checkAccount->num_rows > 0) {
    echo "<script>
  alert('User Already Existed')
  ";
    echo "</script>";
  } else {
    $createAccount = $connection->query("INSERT INTO account SET Username = '$Username', Email='$email', password='$password', Image='$filename'");
    if ($createAccount == true) {
      echo "<script>alert('Registration Successful'); window.location.href = 'login.php';</script>";
    }
  }
}
?>