<?php
include('navbar.php');
include('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="admin.style.css" />
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <div class="main-navbar">
    <nav class="navbar-heading">
      <h1 class="nav-text">Admin Dashboard</h1>&nbsp;
      <!-- <a href="../add-article.php" class="navbar-link-btn">Add New Article</a> -->
    </nav>
  </div>
  <main>
    <br>
    <div class="section-div">
      <div style="display: flex;gap: 20px;">
        <div class="section-first-div">
          <ul class="quick-link-btn">
            <li class="first-text-link">&nbsp;<ion-icon name="link"></ion-icon>&nbsp;&nbsp;Quick Links</li>
            <li class="quick-lick-text">
              <a href="dashboard.php" class="section-link-btn">&nbsp;<ion-icon name="bag-check"></ion-icon>&nbsp;&nbsp;Dashboard</a>
            </li>
            <li class="quick-lick-text">
              <a href="feedback.php" class="section-link-btn">&nbsp;<ion-icon name="create"></ion-icon>&nbsp;&nbsp;Feedback</a>
            </li>
            <!-- <li class="quick-lick-text">
              <a href="change-pass.php" class="section-link-btn">&nbsp;<ion-icon name="cog"></ion-icon>&nbsp;&nbsp;Change Password</a>
            </li> -->
            <li class="quick-lick-text">
              <a href="logout.php" class="section-link-btn">&nbsp;<ion-icon
                  name="log-out"></ion-icon></ion-icon>&nbsp;&nbsp;LogOut</a>
            </li>
          </ul>
        </div>
        <div class="section-div-text">
          <p class="heading-para">Overview</p>
          <div class="sub-head-div">
            <div class="sub-div-text">
              <p><ion-icon name="pencil"></ion-icon></p>
              <p>Article</p>
            </div>
            <div class="sub-div-text">
              <p><ion-icon name="newspaper"></ion-icon></p>
              <p>News</p>
            </div>
            <div class="sub-div-text">
              <p><ion-icon name="people"></ion-icon></p>
              <p>Users</p>
            </div>
          </div>
        </div>
      </div>

      <div class="second-main-div">
        <div class="second-section">
          <p>Latest Article</p>
        </div>
        <div class="more-article-div">
          <table class="customers">
            <tr>
              <th>Title</th>
              <th> &nbsp;&nbsp;&nbsp;&nbsp;Image</th>
              <th>Published On</th>
              <th>Actions</th>
              <th></th>
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



        </div>

      </div>

  </main>
</body>

</html>