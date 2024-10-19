<?php
include 'session.php';
include 'config.php';

$errors = [];

if (isset($_POST['submit'])) {

    $SId = mysqli_real_escape_string($conn, $_POST['SId']);
    $Salary = mysqli_real_escape_string($conn, $_POST['Salary']);
    $SalaryAmount = mysqli_real_escape_string($conn, $_POST['SalaryAmount']);
    $FromDate = mysqli_real_escape_string($conn, $_POST['FromDate']);
    $ToDate = mysqli_real_escape_string($conn, $_POST['ToDate']);

    if (empty($Salary) || empty($SalaryAmount) || empty($FromDate) || empty($ToDate)) {

        $errors[] = "Please Fill Out This Field";
    }


    if (empty($errors)) {

        $query = "INSERT INTO Salary (SId,SSalary,SSalaryAmount,SFromDate,SToDate) VALUES ('$SId','$Salary','$SalaryAmount','$FromDate','$ToDate')";

        if (mysqli_query($conn, $query)) {
            header('Location: TableSalary.php');
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}


if (isset($_POST['Table'])) {
    $SId = mysqli_real_escape_string($conn, $_POST['SId']);

    // ^ Check if the user exists 

    $query = "SELECT * FROM Salary WHERE SId = '$SId'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        $_SESSION['SId'] = $user['SId'];

        if (empty($Salary) || empty($SalaryAmount) || empty($FromDate) || empty($ToDate)) {

            header('Location: TableSalary.php');
        }
    } else {

        $errors[] = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="icon" href="https://i.pinimg.com/564x/7e/7d/10/7e7d10cf1b213a2dc53afbaa24ea5de3.jpg" type="image/x-icon">

    <title>Employee Salary</title>
</head>

<body>

    <nav class="navtop">
        <div>
            <h1>&nbsp;Employee Management</h1>
            <a href="dashboard.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">Dashboard</span>
            </a>

            <a href="EmployeeRegistrationForm.php">
                <i class="fas fa-users"></i>
                <span class="nav-item">Registration</span>
            </a>
            <a href="EmployeeQualification.php">
                <i class="fas fa-user-graduate"></i>
                <span class="nav-item">Qualification</span>
            </a>
            <a href="WorkExperience.php">
                <i class="fas fa-briefcase"></i>

                <span class="nav-item">Experience</span>
            </a>
            <a href="EmployeeSalary.php">
                <i class="fas fa-rupee-sign"></i>
                <span class="nav-item">Salary</span>
            </a>


            <a href="Chagepwd.php">
                <i class="fa fa-user"></i>
                <span class="nav-item">Change Password</span>
            </a>

            <a href="login.php" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>
            </a>

        </div>
        <br><br><br><br>
    </nav>


    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="wrapper">

        <form method="post">
            <div class="title">Employee Salary</div>


            <div class="field">
                <input type="text" name="SId" placeholder="Staff ID" required>
            </div>

            <div class="field">
                <input type="text" placeholder="Salary" name="Salary">
            </div>

            <div class="field">
                <input type="text" placeholder="SalaryAmount" name="SalaryAmount">
            </div>
            <div class="field">
                <input placeholder="From Date" type="date" name="FromDate">
            </div>
            <div class="field">
                <input placeholder="To Date" type="date" name="ToDate">
            </div>

            <div class="field">
                <input type="submit" name="submit" value="Submit" for="submit">
            </div>

            <div class="field1">
                <input type="submit" name="Table" value="Show Table" for="submit">
            </div>


        </form>
    </div>

</body>

</html>