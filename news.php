<?php
include('header.php');
include('connection.php');
// session_start();
if (empty($_SESSION['username'])) {
  echo "<script>alert('Please Login!')</script>";
  echo "<script>window.location.href='user_login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/stylesheet.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <h2 class="heading-text">News-Category</h2>
  <section class="main-section">
    <?php

    function formatTitle($title, $size)
    {
      $words = explode(' ', $title);

      if (count($words) > $size) {
        // Limit to the first 5 words and add "..."
        $formattedTitle = implode(' ', array_slice($words, 0, $size)) . '...';
      } else {
        $formattedTitle = $title;
      }

      return $formattedTitle;
    }

    $categoryname = $_GET['category'];
    $query = "select * from news where category='$categoryname'";
    $sql = mysqli_query($conn, $query);

    while ($info = mysqli_fetch_assoc($sql)) {
      $titles = formatTitle($info['title'], 15);
      $descriptions = formatTitle($info['description'], 35);
      echo '
  <div class="main-news-div">
    <div class="middle-section-div">
      <img src="imgaes/' . $info['image'] . '" alt="/" class="news-images"><br>
       <h3>' . $titles . '</h3><br>
      <p class="news-div-text">
      ' . $descriptions . '
      </p>
      <br>
      <a href="newsGet.php?id=' . $info['id'] . '" class="view-news-btn">Read-More</a>
      <br>
      </div>
      </div>
      ';
    }

    ?>


  </section>
</body>

</html>