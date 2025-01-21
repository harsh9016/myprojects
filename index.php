<?php
include('../connection.php');
session_start();
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "select*from admin where email='$email' and password='$password'";
  $query = mysqli_query($conn, $sql);
  $info = mysqli_fetch_assoc($query);
  if (is_array($info)) {

    $_SESSION['adminlogin'] = $info['id'];
    echo "<script>alert('Login Successfully!')</script>";
    echo "<script>window.location.href='dashboard.php'</script>";
  } else {
    echo "<script>alert('Invalid Email')</script>";
  }
} else {
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="admin.style.css" />
</head>

<body>
  <main>
    <div class="nav-main">
      <nav class="main-nav-heading">
        NewsPortal &nbsp;&nbsp;<span
          style="
              font-size: 22px;
              color: rgb(124, 123, 123);
              font-family: Arial, Helvetica, sans-serif;
            ">Admin Login</span>
      </nav>
    </div>
    <div class="main-section-div">
      <div class="main-div">
        <form action="" method="post" class="form">
          <label>Email Address</label><br />
          <input
            type="textbox"
            name="email"
            placeholder=" Enter Email"
            class="input-type" /><br />
          <label>Password</label><br />
          <input
            type="password"
            name="password"
            required
            placeholder=" Password"
            class="input-type" /><br />
          <button class="login-btn" name="login">Login</button>
        </form>
      </div>
    </div>
    <div class="footer-div">
      <h3 class="footer-text">All Rights Reserved by © Newsportal 2024</h3>
    </div>
  </main>
</body>

</html>