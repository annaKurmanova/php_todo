<?php
include "config.php";
$List = $_POST['list'];
$ID = $_POST['id'];

mysqli_query($conn, "UPDATE `todos` SET `list`='$List' WHERE id = $ID");
header("location:todos.php");
?>