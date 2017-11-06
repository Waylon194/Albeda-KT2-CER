<?php
   include('config.php');
   session_start();
   
    $user_check = $_SESSION['login_user'];
   
    $ses_sql = mysqli_query($db,"SELECT id, username, password, email FROM users WHERE username = '$user_check' ");
   
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
    $login_session = $row['username'];
   
    if(!isset($_SESSION['login_user'])){
        header("location: login.php");
    }
    
    $id = $row['id'];
    $username = $row['username'];
    $password = $row['password'];
    $email = $row['email'];

?>