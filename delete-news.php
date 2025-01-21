


<?php
include('../connection.php');

$query = "delete from news where id=$_GET[id]";
$sql = mysqli_query($conn, $query);
echo"<script>alert('News Deleted!')</script>";
echo "<script>window.location.href='article.php'</script>";
?>