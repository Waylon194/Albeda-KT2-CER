<?php
   
   $db = new mysqli("servername", "username", "password", "dbname");
  
if (mysqli_connect_errno()) { 
    printf("Connect failed: %s\n", mysqli_connect_error()); 
    exit(); 
} 

?>
