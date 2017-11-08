<?php
    //include("config.php");
    include("config.php");
    
    //FORM SUBMIT
    if(isset($_POST["submit"])) {
        //GET VALUE FROM FORM
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $email = $_POST["email"];
        
        //GET MAX ID+1 FROM DATABASE
        $sql_get_id = "SELECT MAX(id) AS 'id' FROM users";
        $sql_get_id_result = $db->query($sql_get_id);
        while($rij = $sql_get_id_result->fetch_assoc()){
            $db_id = $rij['id']+1;
        }
        
        //SQL QUERY STRING
        $sql = "INSERT INTO users (id, username, password, email) VALUES ('".$db_id."', '".$username."', '".$password."', '".$email."')";
        
        
        if ($db->query($sql) == TRUE) {
            echo "Nieuw record succesvol toegevoegd.";
        } else {
            echo "Query error: " . $db->error;
        }
    }
?>
<!doctype html>
<html>
    <head>
        <title>Test page</title>
    </head>
    <bod>
        <p>This is the test page: "index.php".</p>
        
        <form method="post">
            <input type="text" value="" name="username" placeholder="Username"> <br>
            <input type="text" value="" name="password" placeholder="Password"> <br>
            <input type="text" value="" name="email" placeholder="email"> <br>
            <input type="submit" name="submit">
        </form>
    </bod>
</html>

