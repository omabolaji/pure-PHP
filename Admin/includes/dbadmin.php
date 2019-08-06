<?php

 $connection = mysqli_connect('localhost','root','','regform'); 

 if(!$connection){
     die ("QUERY FAILED! " . mysqli_error($connection));
 }

 ?>