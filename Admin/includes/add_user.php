
<?php
if(isset($_GET['add_user'])){
    $user_id = $_GET['add_user'];
}

if(isset($_POST['submit'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];

    $firstname = mysqli_real_escape_string($connection,$firstname);
    $lastname = mysqli_real_escape_string($connection,$lastname);
    $email = mysqli_real_escape_string($connection,$email);
    $username = mysqli_real_escape_string($connection,$username);
    $user_password = mysqli_real_escape_string($connection,$user_password);
    $confirm_password = mysqli_real_escape_string($connection,$confirm_password);

  if(empty($firstname) && empty($lastname) && empty($email) && empty($username) && empty($user_password) && empty($confirm_password)){


    echo "<h3 class='text-danger text-center'>Fields can not be blank!</h3>";
  }else{
    $query = "INSERT INTO users(firstname,lastname,email,user_date,username,user_password,confirm_password) VALUES('{$firstname}','{$lastname}','{$email}',now(),'{$username}','{$user_password}','{$confirm_password}') ";

     $result = mysqli_query($connection,$query);

     if(!$result){

      die("QUERY FAILED! " . mysqli_error($connection));
     }

     echo "User Created: " . " " . "<a class='btn btn-success list-unstyled' href='users.php'>View Users</a>";
    }
}


?>



   <form action="" method="post" class="form-group" enctype="multipart/form-data">
   
   <div class="col-lg-6">
    <div class="row">
    

      <div class="form-group">
       <label for="firstname">Firstname</label>
       <input type="text" class="form-control" name="firstname">
      </div>

      <div class="form-group">
       <label for="firstname">Lastname</label>
       <input type="text" class="form-control" name="lastname">
      </div>

      <div class="form-group">
       <label for="firstname">E-mail</label>
       <input type="email" class="form-control" name="email">
      </div>

      <div class="form-group">
       <label for="firstname">Username</label>
       <input type="text" class="form-control" name="username">
      </div>

      <div class="form-group">
       <label for="firstname">User Password</label>
       <input type="password" class="form-control" name="user_password">
      </div>

      <div class="form-group">
       <label for="firstname">Confirm Password</label>
       <input type="password" class="form-control" name="confirm_password">
      </div>

      <div class="form-group">
       <input type="submit" class="btn btn-lg btn-success" name="submit" value="Update User">
      </div>

    </div>
   </div>
     
   </form>