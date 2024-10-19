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

    // Define the SQL query
    $sql = "SELECT id, firstname, lastname, email FROM employees";

    // Execute the query and store the result
    $result = $conn->query($sql);

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . ", Name: " . $row["firstname"] . " " . $row["lastname"] . ", Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();

    ?>
</body>

</html>