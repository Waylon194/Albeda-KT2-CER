<!DOCTYPE HTML>
<html>
    <head>
        <title>Bekijk Records</title>
    </head>
    <body>
        <?php
            // connect to the database
            include('config.php');
            // get the records from the database
            if ($result = $mysqli->query("SELECT * FROM users")){
                // laat records zien als die er zijn
                if ($result->num_rows > 0){
                // maak een table aan
                echo "<table border='1' cellpadding='10'>";
                // zet table headers
                echo "
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th></th>
                    <th></th>
                </tr>";
                while ($row = $result->fetch_object()){
                    // laat elke record zien
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
                // foutmelding als er geen gegevens zijn
                else{
                    echo "No results to display!";
                }
            }
            // laat een error zien als de query niet uitgevoerd kon worden
            else{
                echo "Error: " . $mysqli->error;
            }
            // sluit de database connectie
            $db->close();
        ?>
    </body>
</html>(gewijzigd)
