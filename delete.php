<?php
    // verbind met de database
    include('config.php');
    // check of "id" is geset
    if (isset($_GET['id']) && is_numeric($_GET['id'])){
        // pak de variable id van de URL
        $id = $_GET['id'];
        // verwijder de record van de database
        $sql_delete_user = "DELETE FROM users WHERE id = '".$id."'";
        $sql_delete_result = $db->query($sql_delete_user);
    }
    else{
        echo "Kon de gebruiker niet veranderen!";
    }
    $db->close();
    // redirect user after delete is successful
?>