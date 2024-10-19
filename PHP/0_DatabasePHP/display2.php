<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // Create a database connection
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "nwdb";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define the SQL query to retrieve data
    $sql = "SELECT id, firstname, lastname, email FROM employees";

    // Execute the query and get the result set
    $result = $conn->query($sql);

    // Check if there are any rows in the result set
    if ($result->num_rows > 0) {
        // Output data of each row in a table format
        echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }

    // Free up the result set memory and close the database connection
    $result->free_result();
    $conn->close();

    ?>
</body>

</html>