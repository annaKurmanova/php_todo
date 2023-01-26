<?php
$LIST = $_POST['list'];

if(!empty($LIST) && isset($LIST)) {
  include 'config.php';
  mysqli_query($conn, "INSERT INTO `todos`(`list`) VALUES ('$LIST')");
  header("location:todos.php");
} else {
  // prevent empty blocks from showing on submit
  header("location:todos.php?mess=error");
}
?>