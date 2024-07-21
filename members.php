<?php

include 'config.php';

if (isset($_GET['id'])){
  $id=$_GET['id'];
  $delete=mysqli_query($connection,"DELETE FROM `members` WHERE `id` = $id");
}

if(isset($_REQUEST["submit"])){
  $id = $_REQUEST["id"];
  $name = $_REQUEST["name"];
  $gender = $_REQUEST["gender"];
  $dob = $_REQUEST["dob"];
  $trainer_id = $_REQUEST["trainer_id"];
  $package_id = $_REQUEST["package_id"];
  $batch = $_REQUEST["batch"];
  $transaction_id = $_REQUEST["transaction_id"];

  $ins = "INSERT into members(id,name,gender,dob,trainer_id,package_id,batch,transaction_id) VALUES ('$id','$name','$gender','$dob','$trainer_id','$package_id','$batch',$transaction_id)";
  $query1 = mysqli_query($connection, $ins);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
     <!-- nav bar start -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin-login.php"><img src="img/mylogo.png" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=nsfitness">Gym Management System</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="packages.php">Packages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="trainers.php">Trainers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="members.php">Members</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="transaction.php">Billing</a>
      </li>
    </ul>
  </div>
</nav>
    <!-- nav bar end -->

          <!-- form start -->

  <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Member ID</label>
      <input type="text" name="id" class="form-control" id="inputEmail4" placeholder="Member ID">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Member Name</label>
      <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Gender</label>
    <input type="text" name="gender" class="form-control" id="inputAddress" placeholder="M/F">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Date of Birth</label>
    <input type="text" name="dob" class="form-control" id="inputAddress2" placeholder="yyyy-mm-dd">
  </div>
  <div class="form-group">
    <label for="inputAddress2">trainer</label>
    <input type="text" name="trainer_id" class="form-control" id="inputAddress2" placeholder="trainer_id">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Package</label>
    <input type="text" name="package_id" class="form-control" id="inputAddress2" placeholder="Package id">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Batch</label>
    <input type="text" name="batch" class="form-control" id="inputAddress2" placeholder="MORNING/EVENING">
  </div>

  <div class="form-group">
    <label for="inputAddress2">Transaction</label>
    <input type="text" name="transaction_id" class="form-control" id="inputAddress2" placeholder="transaction_id">
  </div>

  <div class="form-group">
    <input type="submit" name="submit" class="form-control" id="inputAddress2" placeholder="Submit">
  </div>
</form>



  <!-- form end -->




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>






<?php



$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
 
$query = "SELECT * FROM members ORDER BY id DESC";
$result = mysqli_query($connection,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!-- Data table-->

<table id = "packages" class="table table-striped table-bordered">
  <thead>
    <tr>
      <td>id</td>
      <td>Member Name</td>
      <td>Gender</td>
      <td>Date of birth</td>
      <td>Trainer id</td>
      <td>Package id</td>
      <td>Batch</td>
      <td>Transaction id</td>
      <td>Delete</td>
    </tr>
  </thead>
    <?php
    while($row = mysqli_fetch_array($result))
    {
      echo '
      <tr> 
          <td>'.$row["id"].'</td>
          <td>'.$row["name"].'</td>
          <td>'.$row["gender"].'</td>
          <td>'.$row["dob"].'</td>
          <td>'.$row["trainer_id"].'</td>
          <td>'.$row["package_id"].'</td>
          <td>'.$row["batch"].'</td>
          <td>'.$row["transaction_id"].'</td>
          <td>
          <a href = "members.php?id='.$row['id'].' " >Delete</a>
        </td>
      </tr>
      ';
    }

    
    ?>
    
</table>

<!-- Data table-->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<script>
$(document).ready(function(){
    $('members').DataTable();
});



  </script>