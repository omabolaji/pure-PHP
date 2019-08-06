
  <div class="row">
  <div class="col-lg-12">

    <table class="table-hover table-bordered table table-primary">
    <thead>
         <tr>

     <th>ID</th>
     <th>Firstname</th>
     <th>Middlename</th>
     <th>Lastname</th>
     <th>Address</th>
     <th>Mobile</th>
     <th>E-mail</th>
     <th>Date</th>
     <th>Username</th>
     <th>Edit</th>
     <th>Delete</th>

    </tr>
 </thead> 

 <tbody>
    <?php

 $query = "SELECT * FROM users ";

 $select_all_users = mysqli_query($connection,$query);

 if(!$select_all_users){
     die("QUERY FAILED! " . mysqli_error($connection));
 }
  
  while($row = mysqli_fetch_assoc($select_all_users)){

      $user_id = $row['user_id'];
      $firstname = $row['firstname'];
      $middlename = $row['middlename'];
      $lastname = $row['lastname'];
      $user_address = $row['user_address'];
      $mobile = $row['mobile'];
      $email = $row['email'];
      $user_date = $row['user_date'];
      $username = $row['username'];

      echo "<tr>";
      echo "<td>{$user_id}</td>";
      echo "<td>{$firstname}</td>";
      echo "<td>{$middlename}</td>";
      echo "<td>{$lastname}</td>";
      echo "<td>{$user_address}</td>";
      echo "<td>{$mobile}</td>";
      echo "<td>{$email}</td>";
      echo "<td>{$user_date}</td>";
      echo "<td>{$username}</td>";
 echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'</a>Edit</td>";
   echo "<td><a href='users.php?delete={$user_id}'</a>Delete</td>";
      echo "<tr>";

  }

      ?>

<?php
   
  if(isset($_GET['delete'])){

    $user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$user_id} ";

    $delete_users_query = mysqli_query($connection,$query);

    header("Location: users.php");

  }

?>

      </tbody>
    </table>
    
    </div>
   </div>
