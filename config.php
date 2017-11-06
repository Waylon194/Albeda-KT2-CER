<?php
   
   $db = new mysqli("localhost", "deb43619_alex", "Password", "deb43619_alex");
  
if (mysqli_connect_errno()) { 
    printf("Connect failed: %s\n", mysqli_connect_error()); 
    exit(); 
} 

?>