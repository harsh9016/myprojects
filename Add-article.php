<?php
include('navbar.php');
include('../connection.php');

if (isset($_POST['adding'])) {
  $articlename = mysqli_real_escape_string($conn, $_POST['articlename']);
  $articlecategory = $_POST['articlecategory'];
  $articledescription = mysqli_real_escape_string($conn, $_POST['addarticle']);
  if ($articlecategory == "select") {
    echo "<script>alert('Please Make Selection!');</script>";
  }

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
    $sql = "INSERT INTO aricle(title,desciption,image,category)
          VALUES('$articlename','$articledescription','$img','$articlecategory')";
    $query = mysqli_query($conn, $sql);
    echo "<script>alert('Article Added!')</script>";
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
          <h2>Add Article</h2>
        </div>
        <label class="labeltext">Article Name</label>
        <input type="textbox" name="articlename" required placeholder=" Article Name" class="textbox">
        <label class="labeltext">Article Category</label>
        <select name="articlecategory" required class="textbox">
          <option value="select">Article Category</option>
          <option value="Technological">Technological</option>
          <option value="Food">Food</option>
          <option value="Politics">Politics</option>
          <option value="Business">Business</option>
          <option value="Industry">Industry</option>
          <option value="Crime">Crime</option>
          <option value="Education">Education</option>
          <option value="Space">Space</option>
        </select>
        <label class="labeltext">Article Description</label>
        <textarea name="addarticle" cols="" rows="" id="" class="description-text" required style="width:90%;height:70vh;padding:10px 10px"></textarea><br>
        <input type="file" name="image" required class="textboxfile"><br>
        <button class="add-article-btn" name="adding">Add Article</button>
        <br><br>
    </form>
  </div>
  </div>
  <br><br>
</body>

</html>

<?php
include('footer.php');
?>