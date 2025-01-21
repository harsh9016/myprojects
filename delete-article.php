
<?php
include('../connection.php');

$query = "delete from aricle where id=$_GET[id]";
$sql = mysqli_query($conn, $query);
echo"<script>alert('Article Deleted!')</script>";
echo "<script>window.location.href='article.php'</script>";
?>