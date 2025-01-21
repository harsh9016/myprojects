<?php
include('navbar.php');
include('../connection.php');
?>
<?php
if (isset($_POST['addnews'])) {
  $title = mysqli_real_escape_string($conn, $_POST['newstitle']);
  $category = $_POST['newscategory'];
  $description = mysqli_real_escape_string($conn, $_POST['newsdescription']);
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
    $id = $_GET['id'];
    // update query
    $img = basename($_FILES["image"]["name"]);
    $query = "UPDATE news set category='$category',title='$title',description='$description',image='$target_file' where id=$id";
    $sql = mysqli_query($conn, $query);
    echo "<script>alert('News Updated!')</script>";
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
  <!-- <link rel="stylesheet" href="admin.style.css"> -->
  <link rel="stylesheet" href="../css/stylesheet.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>


<body>
  <br><br><br>
  <div class="main-heading-div">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="main-middle-div">
        <div class="middle-div">
          <h2>Update News</h2>
        </div>
        <label class="labeltext">News Title</label>
        <input type="textbox" name="newstitle" placeholder=" News Name" class="textbox">
        <label class="labeltext">News Category</label>
        <select name="newscategory" class="textbox">
          <?php
          $query = "select * from category";
          $sql = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($sql)) {
            echo "  <option value=$row[title]>$row[title]</option>";
          }
          ?>



        </select>
        <label class="labeltext">News Description</label>
        <textarea name="newsdescription" cols="" rows="" id="" class="description-text" style="width:90%;height:70vh;padding: 10px;"></textarea><br>
        <input type="file" name="image" class="textboxfile"><br>
        <button class="add-article-btn" name="addnews">Update News</button>
        <br>
    </form>
  </div>
  </div>
  <br><br>


</body>

</html>
<?php
include('footer.php');
?>