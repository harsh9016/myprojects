<?php
include('../connection.php');
include('navbar.php');

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
  <style>
    body{
      background-color: aliceblue;
    
    }
    .ad-main-head-div{
      border: 1px solid black;
      padding: 30px;
      background-color: lightgray;
      border-radius: 5px;
      
    }
    .ad-head-middle-div {
      padding: 5px;
      border-bottom: 3px solid black;
      width: 60vw;
      line-height: 2;
    }
    .feedback-textdesign{
      display: flex;
      align-items: center;
      font-size: larger;
      gap: 10px;
      text-decoration:underline solid red;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      text-transform: capitalize;
    }
    .feedback-text{
      font-family: Arial, Helvetica, sans-serif;

    }
    .head-text{
      text-decoration: underline red;
      font-family: Arial, Helvetica, sans-serif;
    }
  </style>
</head>

<body>
  <br><br><br>
  <div class="ad-main-head-div">
    <h1 class="head-text">Feedback</h1>
    <?php
    $q = "select * from feedback";
    $sql = mysqli_query($conn, $q);
    while ($raw = mysqli_fetch_assoc($sql)) {
      $message = $raw['message'];
      $username = $raw['username'];
      echo '  
    <div class="ad-head-middle-div">
    <p class="feedback-textdesign">
    <ion-icon name="person" style="height:40px;width:30px"></ion-icon> ' . $username . '
    </p>
    
    <p class="feedback-text">
      ' . $message . '
      
       </p>
      </div>
    ';
    }

    ?>
  </div>
</body>

</html>