<?php include "includes/header.php" ?>

<!-- container section start -->
<section id="container" class="">

<?php include "includes/navbar.php" ?>

<?php include "includes/sidebar.php" ?>

  <!--main content start-->
  <section id="main-content">
    <section class="wrapper d-flex">
    
      <!--overview start-->
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3> 

          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Dashboard</li>
            <li><i class="fa fa-users"></i><?php echo $_SESSION['username']; ?></li>
          </ol>
        </div>
      </div>


<?php
  if(isset($_GET['source'])){

    $source = $_GET['source'];

  }else{
    $source = "";
  }
  
  switch($source){

    case "add_user";
    include "includes/add_user.php";
     break;

    case "edit_user";
    include "includes/edit_user.php";
    break;

    default;
    include "includes/view_all_users.php";
    break;

  }

?>



<?php include "includes/footer.php" ?>