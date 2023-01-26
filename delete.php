<?php
include 'config.php';
$id = $_GET['ID'];
mysqli_query($conn, "DELETE FROM `todos` WHERE id = $id");
header("location:todos.php");
?>