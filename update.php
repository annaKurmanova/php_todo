<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Редактировать</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php
  $id = $_GET['ID'];
  include "config.php";
  $dataList = mysqli_query($conn, "select * from todos where id = $id");
  $data = mysqli_fetch_array($dataList);
?>

<body class="bg-secondary">
 <form action="update_db.php" method="POST">
  <div class="container">
    <div class="row justify-content-center border my-3 py-3">
      <div class="col-12 pb-2">
      <h2 class="text-center">Edit your todo</h2>
      </div>
      <div class="col-8">
      <input type="text" name="list" value="<?php echo $data['list']?>" class="form-control">
      </div>
      <div class="col-2">
      <button class="btn btn-info">Edit</button>
      <input type="hidden" name = "id" value="<?php echo $data['id']?>">
      </div>
    </div>
  </div>
</form>
</body>
</html>
