
<?php  session_start(); ?>

<?php

   $_SESSION['username'] = null;
   $_SESSION['user_firstname'] = null;
   $_SESSION['user_lastname'] = null;
   $_SESSION['user_password'] = null; 
   $_SESSION['confirm_password'] = null; 

     header("Location: ../index.php");
?>