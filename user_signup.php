<!DOCTYPE html>
<html lang="en">
<?php
session_start();

$error1 = "";
$error2 = "";
$error3 = "";
$error4 = "";
$error5 = "";
$error6 = "";
$error7 = "";

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "news_portal";
$conn = "";

try {
  $conn = mysqli_connect(
    $db_server,
    $db_user,
    $db_pass,
    $db_name
  );
} catch (mysqli_sql_exception) {
  echo "database couldn't connect!";
}

?>

<?php


if (isset($_POST["signup"])) {
  $username = $_POST["username"];
  $address = $_POST["address"];
  $phone12 = $_POST["phone"];
  $email = $_POST["email"];
  $city = $_POST["city"];
  $password = $_POST["password"];
  if (empty($username)) {
    $error1 = "<script>alert(`Username Missing!`)</script>";
  } else if (empty($address)) {
    $error2 = "<script>alert(`Address Empty!`)</script>";
  } else if (empty($phone12)) {
    $error3 = "<script>alert(`Phone Number Missing!`)</script>";
  } else if (empty($email)) {
    $error4 = "<script>alert(`E-mail Missing!`)</script>";
  } else if (empty($city)) {
    $error5 = "<script>alert(`City Empty!`)</script>";
  } else if (empty($password)) {
    $error6 = "<script>alert(`Password Missing!`)</script>";
  } else {
    $error7 = "<script>alert(`Sign-UP Complete.`)</script>";
  }

  $sql = "INSERT INTO user_regestration (username,address,phone,email,city,password) 
    VALUES ('$username','$address','$phone12','$email','$city','$password')";

  (mysqli_query($conn, $sql));

  header('location:index.php');
}
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "urbaniest", sans-serif;
    }

    body {
      background-color: #cfdbed;
      width: 100%;
      height: auto;
    }

    h1 {
      display: flex;
      justify-content: center;
      font-weight: 785;
      font-size: 2rem;
    }

    .main-section {
      border: 1px solid white;
      border-radius: 30px;
      width: 525px;
      height: 535px;
      margin: 5rem;
      padding: 3.5rem 2rem;
      background-color: white;
    }

    .form-design {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }

    main {
      display: flex;
      justify-content: center;
      text-align: center;
      align-items: center;
    }

    .sub-btn {
      background-color: rgb(253, 73, 73);
      color: white;
      padding: 6px 82px;
      font-size: large;
      font-weight: 600;
      text-decoration: none;
      border-radius: 10px;
    }

    label {
      font-size: large;
      height: 1rem;
      font-weight: 750;
      letter-spacing: 0.5px;
    }

    .text {
      font-size: large;
      border-radius: 7px;
      height: 30px;
      font-family: urbaniest sans-serif;
      padding-left: 10px;
    }

    p {
      font-family: arial;
      font-weight: 600;
      text-align: left;

    }
  </style>
</head>

<body>
  <main>
    <section class="main-section">
      <h1>User Signup</h1>
      <div class="form-design">
        <form method="post">

          <input
            type="textbox"
            name="username"
            required
            class="text"
            placeholder="Username" /><br><br>
          <input
            type="textbox"
            name="address"
            required
            class="text"
            placeholder="Address" />
          <br /><br />
          <input
            type="number"
            name="phone"
            required
            class="text"
            placeholder="Mobile-Number" />
          <br /><br />
          <input
            type="textbox"
            name="email"
            required
            class="text"
            placeholder="Email-Address" />
          <br /><br />
          <input
            type="textbox"
            name="city"
            required
            class="text"
            placeholder="City" />
          <br /><br />
          <input
            type="password"
            required
            name="password"
            class="text"
            placeholder="Password" />
          <br />
          <br /><br>
          <button class="sub-btn" name="signup" type="submit">Signup</button>
          <br /><br>

          <?php

          echo "<p>$error1</p>";
          echo "<p>$error2</p>";
          echo "<p>$error3</p>";
          echo "<p>$error4</p>";
          echo "<p>$error5</p>";
          echo "<p>$error6</p>";
          echo "<p>$error7</p>";
          ?>
        </form>
      </div>
    </section>
  </main>

  <script>
    // let button=document.querySelector(".number")/
  </script>
</body>

</html>