<?php
include('navbar.php');
include('../connection.php');
?>
<?php

if (isset($_POST['adding'])) {
  $title = mysqli_real_escape_string($conn, $_POST['categorytitle']);
  $description = mysqli_real_escape_string($conn, $_POST['categorydescription']);
  $target_dir = "../imgaes/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if ($check !== false) {

    $uploadOk = 1;
  } else {

    $uploadOk = 0;
  }
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    // insert query
    $img = basename($_FILES["image"]["name"]);
    $query = "INSERT INTO category(title,description,image)
    VALUES('$title','$description','$img')";
    $sql = mysqli_query($conn, $query);
    echo"<script>alert('Category Added!')</script>";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/stylesheet.css">
</head>

<body>
  <br><br><br>
  <div class="main-heading-div">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="main-middle-div">
        <div class="middle-div">
          <h2>Add Category</h2>
        </div>
        <label class="labeltext">Category Title</label>
        <input type="textbox" name="categorytitle" placeholder=" Category Name" required class="textbox">

        <label class="labeltext">Category Description</label>
        <textarea name="categorydescription" cols="" rows="" id="" class="description-text" required style="width:90%;height:70vh;"></textarea><br>
        <input type="file" name="image" required class="textbox">
        <button class="add-article-btn" name="adding">Add Category</button>
        <br><br>
    </form>
  </div>
  </div>
  <br><br>

</body>

</html>


<?php
require('footer.php');
?>