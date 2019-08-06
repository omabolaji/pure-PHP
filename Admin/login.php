<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login Page</title>

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
<?php session_start(); ?>

<?php    

 if(isset($_POST['submit'])){

  $username = $_POST['username'];
  $user_password = $_POST['user_password'];
  $confirm_password = $_POST['confirm_password'];

  $username = mysqli_real_escape_string($connection,$username);
  $user_password = mysqli_real_escape_string($connection,$user_password);
  $confirm_password = mysqli_real_escape_string($connection,$confirm_password);
  
 $query = "SELECT * FROM users WHERE username = '{$username}' ";

 $select_login_query = mysqli_query($connection,$query);

 if(!$select_login_query){
      die("QUERY FAILED! " . mysqli_error($connection));
 }

 while($row = mysqli_fetch_assoc($select_login_query)){

        $db_user_id = $row['user_id'];
        $db_firstname = $row['firstname'];
        $db_middlename = $row['middlename'];
        $db_lastname = $row['lastname'];
        $db_user_address = $row['user_address'];
        $db_mobile = $row['mobile'];
        $db_email = $row['email'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_confirm_password = $row['confirm_password'];

 }

  if($username == $db_username && $user_password == $db_user_password && $confirm_password == $db_confirm_password){

     $_SESSION['username'] = $db_username;
     $_SESSION['user_password'] = $db_user_password;
     $_SESSION['confirm_password'] = $db_confirm_password;
     $_SESSION['firstname'] = $db_firstname;
     $_SESSION['lastname'] = $db_lastname;
     $_SESSION['middlename'] = $db_middlename;
     $_SESSION['email'] = $db_email;
     $_SESSION['user_address'] = $db_user_address;
     $_SESSION['mobile'] = $db_mobile;

     header("Location: ../Admin");

  }else{

    header("Location: ../index.php");
  }

 }




?>


<body class="login-img3-body">
  
  <div class="container">

  <p class="text-danger"><b>Back to :</b><a href="../index.php">Home Page</a></p>
  
    <form class="login-form" action="" method="post" role="login-form">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name= "user_password" class="form-control" placeholder="Password">
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name= "confirm_password" class="form-control" placeholder="Password">
        </div>

        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Login</button>
        <button class="btn btn-danger btn-lg btn-block" type=""><a href="registration.php">Signup</a></button>
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
