<?php
include("header.php");
include("connection.php");

$id = $_GET['id'];
$amount = 10;
$_SESSION['purchase_new'] = array();
$purchased = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="./css/style.css">
  <style>
    .div-main {
      width: 65vw;
      padding: 10px 50px;
      background-color: rgb(216, 209, 209);
      padding-bottom: 30px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .main-para {
      font-weight: 550;
      letter-spacing: 0.7px;
      font-size: 15px;
      line-height: 2;
    }

    .manage-btn {
      background-color: rgb(70, 70, 242);
      padding: 15px;
      color: white;
      border-radius: 5px;
      font-size: medium;
      font-weight: 700;
      letter-spacing: 0.4px;
      text-decoration: none;
      font-family: urbaniest sans-serif;
      text-align: center;
      border: 0px;
    }

    .div-class {
      display: flex;
      background-color: white;
      padding: 10px;
      margin-bottom: 15px;

    }

    .h1-div {
      font-size: 2rem;
      font-weight: 700;
    }


    .add-feedback-div {
      position: fixed;

      display: flex;
      top: -600vh;
      transition: 0.6s;
      align-items: center;
      justify-content: center;
      height: 100vh;
      width: 100vw;
    }

    .showMod {
      top: 600vh !important;
    }

    .model {
      width: 400px;
      background-color: white;
      height: 250px;

      box-shadow: 2px 4px 10px blue;
      position: relative;
      padding: 20px 20px;
      border-radius: 8px;
    }

    .model .cross {
      position: absolute;
      top: 0;
      right: 0;
    }

    .model #message {
      resize: none;
      margin-top: 10px;
    }

    .submit-btn {
      background-color: red;
      color: white;
      border: 0px;
      padding: 5px;
      font-weight: 600;
      border-radius: 3px;
    }

    .alreadyPur {
      background-color: grey;
    }

    .main-headin-news-div {
      display: flex;
      justify-content: center;
    }
  </style>
  <!-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script> -->
</head>

<body>
  <div class="add-feedback-div">
    <div class="model" id="model">
      <form method="post">
        <button class="cross hideMod"><ion-icon name="close-circle"></ion-icon></button>
        <h1>Add Feedback </h1>
        <textarea name="message" rows="10" cols="50" id="message"></textarea>
        <button name="sub_feed" class="submit-btn">Submit</button>
      </form>
    </div>
  </div>
  <br><br><br>
  <main>
    <div class="main-headin-news-div">
      <?php
      $q = "select * from news where id = '$id'";
      $sql = mysqli_query($conn, $q);
      $row = mysqli_fetch_array($sql);
      // $_SESSION["purchase_new"]["title"] = $row["title"];
      // $_SESSION["purchase_new"]["category"] = $row["category"];
      // $_SESSION["purchase_new"]["n_id"] = $row["id"];
      // $query = "select * from news where n_id='$id'";
      // $sql1 = mysqli_query($conn, $query);
      // if (mysqli_num_rows($sql1) > 0) {
      //   $purchased = true;
      // }
      echo '
<div class="div-main">
                <h1 class="h1-div">' . $row['title'] . '
                </h1><br>
                <img src="./imgaes/' . $row['image'] . '" alt="/" width=100%;"><br><br>
                <div class="div-class">
                       </div>

                <p class="main-para">
                    ' . $row['description'] . '
                </p><br><br><br>
                <a href="news.php?category=' . $row['category'] . '" class="manage-btn">Back</a>';

      ?>


    </div>

    </div>
    </div>

  </main><br><br>


</body>

</html>

<?php

include("footer.php");
?>