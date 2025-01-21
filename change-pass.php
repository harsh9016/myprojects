<?php
include('navbar.php');
include('../connection.php');
// session_start();

if (isset($_POST['update'])) {
  $oldpass = $_POST['oldpass'];
  $newpass = $_POST['newpass'];
  $confirmpass = $_POST['confirmpass'];
  $id = $_SESSION['adminlogin'];
  $sql = "select * from admin where id='$id'";
  $query = mysqli_query($conn, $sql);
  $info = mysqli_fetch_assoc($query);
  if ($oldpass == $info['password']) {

    if ($newpass == $confirmpass) {
      $query1 = "update admin set password='$newpass' where id='$id'";
      $query01 = mysqli_query($conn, $query1);
      if ($query01) {
        echo "<script>alert('Password Updated!')</script>";
      } else {
        echo "<script>alert('Password Not Updated!')</script>";
      }
    } else {
      echo "<script>alert('Invalid Confirm Password!')</script>";
    }
  } else {
    echo "<script>alert('Invalid Old-Password!')</script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="admin.style.css">
</head>

<body>
  <br><br><br><br>
  <form action="" method="post">
    <div class="main-head-div">
      <div class="middle-div">
        <label>Change Password</label>
      </div>

      <?php echo  "wsfsdf=" . $_SESSION['adminlogin']; ?>
      <br>
      <label class="labeltext">Old Password :</label>
      <input type="password" name="oldpass" placeholder=" Old Password" required class="textbox">
      <label class="labeltext">New Password :</label>
      <input type="password" name="newpass" placeholder=" New Password" required class="textbox">
      <label class="labeltext">Confirm New Password :</label>
      <input type="password" name="confirmpass" placeholder=" Confirm New Password" required class="textbox">
      <br>
      <button type="submit" class="update-btn" name="update">Update</button>
      <br>
  </form>

  </div>
</body>

</html>