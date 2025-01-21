

<?php
session_start();
// session_destroy();
$_SESSION['adminlogin'] = "";
echo "<script>alert('Logout Successfully!');window.location.href='index.php';</script>";

?>