<?php

 if(isset($_GET['edit_user'])){
   $user_id = $_GET['edit_user'];


  $query = "SELECT * FROM users WHERE user_id = {$user_id} ";

  $result = mysqli_query($connection,$query);
 if(!$result){
   die("DATABASE CONNECTION FAILED! " . mysqli_error($connection));
 }
  while($row = mysqli_fetch_assoc($result)){
      $user_id = $row["user_id"];
      $firstname = $row["firstname"];
      $username = $row["username"];
      $email = $row["email"];
      $user_password = $row["user_password"];
      $confirm_password = $row["confirm_password"];

  }

 }


?>

 <?php
  if(isset($_POST["edit_user"])){
     
    $firstname = $_POST["firstname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $user_password = $_POST["user_password"];
    $confirm_password = $_POST["confirm_password"];


    $firstname = mysqli_real_escape_string($connection,$firstname);
    $username = mysqli_real_escape_string($connection,$username);
    $email = mysqli_real_escape_string($connection,$email);
    $username = mysqli_real_escape_string($connection,$username);
    $user_password = mysqli_real_escape_string($connection,$user_password);
    $confirm_password = mysqli_real_escape_string($connection,$confirm_password);


    $query = "UPDATE users SET ";
    $query .= "firstname = '{$firstname}', ";
    $query .= "username = '{$username}', ";
    $query .= "email = '{$email}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "confirm_password = '{$confirm_password}' ";
    $query .= "WHERE user_id = {$user_id} ";
    $query .= "LIMIT 1 ";

    $result = mysqli_query($connection,$query);
    if(!$result){
      die("DATABASE FAILED! " . mysqli_error($connection));
    }else{
      // echo "<h4 class='text-success text-center>User Updated! :<a href='users.php'>View Users</a></h4>";

      echo "<h4 class='text-danger'><b>User Updated:</b> " . " " . "<a class='text-success' href='./users.php'>View Users</a></h4>";

    
    }
  }

 ?>

    <form action="" method="post" class="form-group" enctype="multipart/form-data">
    
    <div class="col-lg-6">
     <div class="row">
     

       <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>" >
       </div>

       <div class="form-group">
        <label for="username">username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
       </div>

       <div class="form-group">
        <label for="firstname">E-mail</label>
        <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
       </div>

       <div class="form-group">
        <label for="firstname">User Password</label>
        <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="user_password">
       </div>

       <div class="form-group">
        <label for="firstname">Confirm Password</label>
        <input type="password" class="form-control" value="<?php echo $confirm_password; ?>" name="confirm_password">
       </div>

       <div class="form-group">
        <input type="submit" class="btn btn-lg btn-success" name="edit_user" value="Update User">
       </div>

     </div>
    </div>
    
    </form>


