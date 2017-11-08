<?php
    //include("config.php");
    include("config.php");
    
    //FORM SUBMIT
    if(isset($_POST["submit"])) {
        //GET VALUE FROM FORM
        $username = $_POST["username"];
        //PASSWORD VALUES
        $password = $_POST["password"];
        $passwordRepeat = $_POST["passwordRepeat"];
        //THIS WILL BECOME THE NEW PASSWORD VALUE
        $setPassword;
        $email = $_POST["email"];
        
        //PASSWORD MATCHING CONTROL
        if($password != $passwordRepeat) {
            echo "Passwords do not match! <br>";
            $setpassword = $password;
        }
        
        //GET MAX ID+1 FROM DATABASE
        $sql_get_id = "SELECT MAX(id) AS 'id' FROM users";
        $sql_get_id_result = $db->query($sql_get_id);
        while($rij = $sql_get_id_result->fetch_assoc()){
            $db_id = $rij['id']+1;
        }
        
        //SQL QUERY STRING
        $sql = "INSERT INTO users (id, username, password, email) VALUES ('".$db_id."', '".$username."', '".$setPassword."', '".$email."')";
        
        //CHECK IF FORM
        if($username != null && $setPassword != null && $email != null){
            //QUERY CONTROL & EXECUTION
            if ($db->query($sql) == TRUE) {
                echo "New record created succesfully.";
            } else {
                echo "Query error: " . $db->error;
            }
        } else {
            echo "Please fill in all the requirements!";
        }
    }
?>
<!doctype html>
<html>
    <head>
        <title>Test page</title>
    </head>
    <bod>
        <p>This is the register page: "user-register.php".</p>
        
        <!-- FORM POST -->
        <form method="post">
            <input type="text" value="" name="username" placeholder="Username"> <br>
            <input type="password" value="" name="password" placeholder="Password"> <br>
            <input type="password" value="" name="passwordRepeat" placeholder="Password"> <br>
            <input type="email" value="" name="email" placeholder="email"> <br>
            <input type="submit" name="submit">
        </form>
    </bod>
</html>

