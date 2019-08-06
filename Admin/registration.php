
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Registration Page</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>
  
 <?php include "includes/dbadmin.php" ?>

<?php  

 if(isset($_POST['submit'])){

  // $user_id = $_POST['user_id'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $user_address = $_POST['user_address'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $user_date = date('d-m-y');
  $username = $_POST['username'];
  $user_password = $_POST['user_password'];
  $confirm_password = $_POST['confirm_password'];
   

  if(!empty($firstname) && !empty($middlename) && !empty($lastname) && !empty($user_address) && !empty($email) && !empty($username) && !empty($user_password == $confirm_password)){

  $firstname = mysqli_real_escape_string($connection,$firstname);
  $middlename = mysqli_real_escape_string($connection,$middlename);
  $lastname = mysqli_real_escape_string($connection,$lastname);
  $user_address = mysqli_real_escape_string($connection,$user_address);
  $email = mysqli_real_escape_string($connection,$email);
  $username = mysqli_real_escape_string($connection,$username);
  $user_password = mysqli_real_escape_string($connection,$user_password);
  $confirm_password = mysqli_real_escape_string($connection,$confirm_password);


 $query = "INSERT INTO users(firstname,middlename,lastname,user_address,mobile,email,user_date,username,user_password,confirm_password) VALUES('{$firstname}','{$middlename}','{$lastname}','{$user_address}','{$mobile}','{$email}',now(),'{$username}','{$user_password}','{$confirm_password}') ";

     $result = mysqli_query($connection,$query);

     if(!$result){

      die("QUERY FAILED! " . mysqli_error($connection));
      return;
     }

  echo  $message = "<h2 class='text-center text-success'>Registration Successfull</h2>";
    //  header("Location: registration.php");

    } else{

    //  $message = "<script>alert('Fields can not be empty for registration, And your password must be matched!...Thanks!')</script>";
      $message1 = "<h5 class='text-danger'>firstname is required!</h5>";
      $message2 = "<h5 class='text-danger'>middlename is required!</h5>";
      $message3 = "<h5 class='text-danger'>lastname is required!</h5>";
      $message4 = "<h5 class='text-danger'>username must not be blank!</h5>";
      $message5 = "<h5 class='text-danger'>password is required!</h5>";
      $message6 = "<h5 class='text-danger'>password do not match!</h5>";
    }

 } else{
   
  // $message = "";

  $message = "";
  $message1 = "";
  $message2 = "";
  $message3 = "";
  $message4 = "";
  $message5 = "";
  $message6 = "";
 }

?>

<body class="login-img3-body">

    <div class="container">

 <p class="text-danger"><b>Back to :</b><a href="../index.php"> Home Page</a></p>

    <form class="form-group" action="registration.php" method="post" role="form">
      <div class="login-wrap col-md-8 col-lg-8">
        <p class="login-img"><i class="icon_lock_alt"></i>Registration Form</p>

    
           
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_book_alt"></i>Firstname</span>
          <input type="text" class="form-control" name="firstname" placeholder="firstename">
          <?php echo $message1; ?>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_book_alt"></i>Middlename</span>
          <input type="text" class="form-control" name="middlename" placeholder="middlename">
          <?php echo $message2; ?>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_book_alt"></i>Lastname</span>
          <input type="text" class="form-control" name="lastname" placeholder="lastname">
          <?php echo $message3; ?>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_map_alt"></i>Address</span>
          <input type="text" class="form-control" name="user_address" placeholder="address">
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_mobile_alt"></i>Telephone</span>
          <input type="number" class="form-control" name="mobile" placeholder="phone number">
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_mail_alt"></i>E-mail</span>
          <input type="email" class="form-control" name="email" placeholder="enter valid email">
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i>Username</span>
          <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
          <?php echo $message4; ?>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i>Password</span>
          <input type="password" class="form-control" name="user_password" placeholder="Password">
          <?php echo $message5; ?>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i>Confirm Password</span>
          <input type="password" class="form-control" name="confirm_password" placeholder="confirm Password">
          <?php echo $message6; ?>
        </div>
       
        <button class="btn btn-info btn-lg btn-block" name="submit" type="submit">Signup</button>
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </div>


</body>

</html>
