<?php
include 'config.php';

session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])) {





$dataList = mysqli_query($conn, 'select * from todos');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To do list by Anna Kurmanova</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
.done {
  text-decoration: line-through;
}
</style>
</head>
<body class="bg-secondary">
  <div class="container pt-3">
    <a class="text-white" href="logout.php">Выйти</a>
  </div>
  <form action="insert.php" method="POST">
  <div class="container">
    <div class="row justify-content-center border my-3 py-3">
      <div class="col-12 pb-2">
      <h2 class="text-center text-white">Todo list for  <?php echo $_SESSION['username']?></h2>
      </div>
      <div class="col-8">
      <input type="text" name="list" class="form-control">
      </div>
      <div class="col-2">
      <button class="btn btn-info">Add</button>
      </div>
    </div>
  </div>
</form>


<!-- todos list -->

<div class="container">
  <div class="row justify-content-center border py-3 px-3 align-items-center ">
    <!-- message if no todos -->
    <?php
    if (mysqli_num_rows($dataList) <= 0){
    ?>
    <h4 class="text-white">Nothing here yet...</h4>
    <?php }?>
  <!-- display todos -->
    <?php
    while ($row = mysqli_fetch_array($dataList)) {
      if ($row['checked'] == '1') {
        ?>

      <div class="col-8 bg-light py-3 rounded mb-2 text-muted done">
      <a href ="undo.php? ID=<?php echo ($row['id']) ?>" class="btn btn-success mr-2">&#x2713;</a>
        <?php
        echo ($row['list']);
        ?>
        </div>
        <div class="col-auto d-flex justify-content-end">
          <a href ="delete.php? ID=<?php echo ($row['id']) ?>" class="btn btn-danger mr-2">Delete</a>
          <a href="update.php? ID=<?php echo ($row['id']) ?>" class="btn btn-success">Edit</a>
        </div>
        <?php
      } else{?>
      <div class="col-8 bg-light py-3 rounded mb-2">
      <a href ="done.php? ID=<?php echo ($row['id']) ?>" class="btn btn-info mr-2">&#9634;</a>
        <?php
        echo ($row['list']);
        ?>
        </div>
        <div class="col-auto d-flex justify-content-end">
          <a href ="delete.php? ID=<?php echo ($row['id']) ?>" class="btn btn-danger mr-2">Delete</a>
          <a href="update.php? ID=<?php echo ($row['id']) ?>" class="btn btn-success">Edit</a>
        </div>
<?php
      }
    }
        ?>
  </div>
</div>
</body>
</html>

<?php } else {
  header("Location: index.php");
  exit();
} ?>
