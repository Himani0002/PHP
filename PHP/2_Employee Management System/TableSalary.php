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
    <title>Employees Salary</title>
</head>

<body>
    <center>
        <h2>Employees Salary</h2>
    </center>
    <br>
    <?php
    include 'config.php';

    $sql = "SELECT * FROM Salary WHERE SId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>SId</th><th>Salary</th><th>SalaryAmount</th><th>FromDate</th><th>ToDate</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["SId"] . "</td><td>" . $row["SSalary"] . "</td><td>" . $row["SSalaryAmount"] . "</td><td>" . $row["SFromDate"] . "</td><td>" . $row["SToDate"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }

    $result->free_result();
    $conn->close();

    ?>
    </center>
</body>

</html>