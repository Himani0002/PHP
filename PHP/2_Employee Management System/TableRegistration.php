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

    <title>Employee Registration</title>
</head>

<body>
    <center>
        <h2>Employee Registration</h2>


        <?php

        include 'config.php';

        $sql = "SELECT EId,EFname,ELname,EDOB,EGender,EDOJ,ESalary,EDepartment,EDesignation,EPhnumber,EEmail,ECity,EState,ECountry,EPinCode FROM EMPLOYEE";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "<table>
                    <tr>
                    <th>EID</th>
                    <th>Fname</th>
                    <th>Lname</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>DOJ</th>
                    <th>Salary</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Phnumber</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>PinCode</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {

                echo "<tr>
                                <td>" . $row["EId"] . "</td>
                                <td>" . $row["EFname"] . "</td>
                                <td>" . $row["ELname"] . "</td>
                                <td>" . $row["EDOB"] . "</td>
                                <td>" . $row["EGender"] . "</td>
                                <td>" . $row["EDOJ"] . "</td>
                                <td>" . $row["ESalary"] . "</td>
                                <td>" . $row["EDesignation"] . "</td>
                                <td>" . $row["EDepartment"] . "</td>
                                <td>" . $row["EPhnumber"] . "</td>
                                <td>" . $row["EEmail"] . "</td>
                                <td>" . $row["ECity"] . "</td>
                                <td>" . $row["EState"] . "</td>
                                <td>" . $row["ECountry"] . "</td>
                                <td>" . $row["EPinCode"] . "</td>
                        </tr>";
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