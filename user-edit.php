<!DOCTYPE HTML>
<html>
    <head>
        <title>Gebruikers aanpassen</title>
    </head>
    <body>
        <?php
            // verbind met de database
            include('config.php');
            // haal de gegevens van de database
            if ($result = $mysqli->query("SELECT * FROM players ORDER BY id")){
                // laat gegevens zien
                if ($result->num_rows > 0){
                // maak een table aan
                    echo "<table border='1' cellpadding='10'>";
                    // Zet de tabel headers
                    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th></th><th></th></tr>";
                    while ($row = $result->fetch_object()){
                        // set up a row for each record
                        echo "<tr>";
                            echo "<td>" . $row->id . "</td>";
                            echo "<td>" . $row->firstname . "</td>";
                            echo "<td>" . $row->lastname . "</td>";
                            echo "<td><a href='records.php?id=" . $row->id . "'>Edit</a></td>";
                            echo "<td><a href='delete.php?id=" . $row->id . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                // laat een foutmelding zien als er geen gegevens gevonden zijn
                else{
                    echo "Geen resultaten!";
                }
            }
            else{
                echo "Query Error: " . $mysqli->error;
            }
            // sluit de database connectie
            $db->close();
        ?>
    </body>
</html>
