<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Employees Experience</title>
</head>

<body>
    <center>
        <h2>Employees Experience</h2>
    </center>
    <center>
        <?php

        include 'config.php';

        // $sql = "SELECT SId,ECompanyName ,ECompanyRol ,EStartDate ,EEndDate FROM Experience";
        $sql = "SELECT * FROM Experience WHERE SId";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "<table><tr><th>SId</th><th>CompanyName</th><th>CompanyRol</th><th>StartDate</th><th>EndDate</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["SId"] . "</td><td>" . $row["ECompanyName"] . "</td><td>" . $row["ECompanyRol"] . "</td><td>" . $row["EStartDate"] . "</td><td>" . $row["EEndDate"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }

        // Free up the result set memory and close the database connection
        $result->free_result();
        $conn->close();
        ?>
    </center>
</body>

</html>