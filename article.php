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
      <a href="Add-article.php" class="navbar-link-btn">Create a New Article</a>
    </nav>
  </div>
  <div class="second-main-div">
    <div class="second-section" style="display: flex;background-color: rgb(190, 187, 187);">
      <p>Dashboard</p>&nbsp;<p style="color: rgb(101, 98, 98);font-size: medium;">Articles</p>
    </div>
    <div class="more-article-div">
      <table class="customers">

        <tr>
          <th>Title</th>
          <th> &nbsp;&nbsp;&nbsp;&nbsp;Image</th>
          <th>Published On</th>
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

        $q = "select * from aricle";
        $sql = mysqli_query($conn, $q);
        while ($row = mysqli_fetch_assoc($sql)) {
          $editTitle = formatTitle($row['title'], 20);
          $editDescription = formatTitle($row['desciption'], 38);
          echo " <tr>
          <td style='width:30vw'> $editTitle
          </td>
          <td><img src='../imgaes/$row[image]' class='admin-panel-imgs'></td>
          <td>$row[date]</td>
          <td><a href='delete-article.php?id=$row[id]' style='border:0px;background-color:transparent;'><ion-icon name='trash' style='border:0px;height:30px;width:30px;'></ion-icon></a></td>
        </tr>";
        }
        ?>


      </table>
    </div><br>
  </div>
  </div>
</body>

</html>