<?php
include('navbar.php');
include('../connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="admin.style.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <div class="main-navbar">
    <nav class="navbar-heading">
      <h1 class="nav-text">Dashboard</h1>&nbsp;
      <a href="add-news.php" class="navbar-link-btn">Add News</a>&nbsp;
      <a href="add-category.php" class="navbar-link-btn">Add Category</a>
    </nav>
  </div>
  <div class="second-main-div">
    <div class="second-section" style="display: flex;background-color: rgb(190, 187, 187);">
      <p>Dashboard</p>&nbsp;<p style="color: rgb(101, 98, 98);font-size: medium;">News</p>
    </div>
    <div class="more-article-div">
      <table class="customers">

        <tr>
          <th>Title</th>
          <th> &nbsp;&nbsp;&nbsp;&nbsp;Image</th>
          <th></th>
          <th>Actions</th>
        </tr>
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

        $q = "select * from news";
        $sql = mysqli_query($conn, $q);
        while ($row = mysqli_fetch_assoc($sql)) {
          $editTitle = formatTitle($row['title'], 10);
          $editDescription = $row['description'];
          echo " <tr>
          <td style='width:30vw'> $editTitle
          </td>
          <td><img src='../imgaes/$row[image]' class='admin-panel-imgs'></td>
          <td>$row[category]</td>
          <td><a href='delete-news.php?id=$row[id]' style='border:0px;background-color:transparent;'><ion-icon name='trash' style='border:0px;height:30px;width:30px;'></ion-icon></a></td>
          <td><a href='update-news.php?id=$row[id]' style='border:0px;background-color:transparent;'><ion-icon name='create' style='border:0px;height:30px;width:30px;'></ion-icon></a></td>
        </tr>";
        }
        ?>


      </table>
    </div><br>
  </div>
  </div>
</body>

</html>