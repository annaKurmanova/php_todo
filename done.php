<?php
include "config.php";
$ID = $_GET['ID'];


  mysqli_query($conn, "UPDATE `todos` SET  `checked`='1'  WHERE id = $ID");
  header("location:todos.php");



?>