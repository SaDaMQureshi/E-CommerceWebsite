<?php
$connection = new mysqli("localhost", "root", "", "ecommerce");
$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM product WHERE id='$id'");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="stylesheet" href="./CSS/addProduct.css">
</head>

<body>
  <form action="updateProduct.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <h1>Add Product</h1>
    <label for="">Product Name <br> <input type="text" name="productName" value="<?php echo $row['Name'] ?>"></label>
    <label for="">Product Price <br> <input type="text" name="productPrice" value="<?php echo $row['Price'] ?>"></label>
    <label for="">Product Description <br> <textarea name="productDisc" rows="5" cols="35"><?php echo $row['Description'] ?></textarea></label>
    <label for="">Product Image <br> <input type="file" name="productImg" value="<?php echo $row['Image']  ?>"></label>
    <input type="submit" value="Update Product" name="addBtn" id="subBtn">
  </form>
</body>

</html>