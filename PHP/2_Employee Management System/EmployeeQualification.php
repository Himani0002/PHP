<!-- <?php
include 'session.php';
include 'config.php';

$errors = [];

if (isset($_POST['submit'])) {
    $Sid = mysqli_real_escape_string($conn, $_POST['SId']);
    $Qualification = mysqli_real_escape_string($conn, $_POST['Qualification']);
    $University = mysqli_real_escape_string($conn, $_POST['University']);
    $YearofPassing = mysqli_real_escape_string($conn, $_POST['YearofPassing']);
    $Marks = mysqli_real_escape_string($conn, $_POST['Marks']);


    // Validate Marks

    if (empty($Marks)) {
        $errors[] = "Marks is required.";
    } elseif ((strlen($Marks) >= 100)) {
        $errors[] = "You marks are Valid";
    }


    if (empty($errors)) {


        $query = "INSERT INTO Qualification(SId,QQualification,QUniversity,QYearofPassing,QMarks)VALUES('$Sid','$Qualification','$University','$YearofPassing','$Marks')";

        if (mysqli_query($conn, $query)) {
            header('Location: Table1.php');
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

            header('Location: TableQualification.php');
        }
    } else {

        $errors[] = "User not found.";
    }
}
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.pinimg.com/564x/7e/7d/10/7e7d10cf1b213a2dc53afbaa24ea5de3.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link rel="stylesheet" href="style.css">
    <title>Employees Qualification</title>
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
    </nav>
    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="wrapper">

        <div class="title">Qualification</div>


        <form method="POST">

            <div class="field">
                <input type="text" name="SId" placeholder="Staff ID" required>
            </div>

            <div class="field">
                <select name="Qualification" required>
                    <option selected="selected">-- Select Qualification --</option>
                    <option value="No formal education">No formal education</option>
                    <option value="Primary education">Primary education</option>
                    <option value="Secondary education or high school">Secondary education or high school
                    </option>
                    <option value="GED">GED</option>
                    <option value="Vocational qualification">Vocational qualification</option>
                    <option value="Bachelor's degree">Bachelor's degree</option>
                    <option value="Master's degree">Master's degree</option>
                    <option value="Doctorate or higher">Doctorate or higher</option>
                </select>
            </div>


            <div class="field">
                <select class="input" name="University">
                    <option selected="selected" disabled="disabled">-- Select University --</option>
                    <option value="University of Oxford">University of Oxford</option>
                    <option value="University of Cambridge">University of Cambridge</option>
                    <option value="Harvard University">Harvard University</option>
                    <option value="Stanford University">Stanford University</option>
                    <option value="Columbia University">Columbia University</option>
                    <option value="Banaras Hindu University">Banaras Hindu University</option>
                    <option value="Indian Institute of Technology Bombay">Indian Institute of Technology Bombay
                    </option>
                </select>
            </div>

            <div class="field">
                <select class="input" class="form-select" id="year" name="YearofPassing">
                    <option value="">-- Select Year --</option>
                    <option value="1940">1940</option>
                    <option value="1941">1941</option>
                    <option value="1942">1942</option>
                    <option value="1943">1943</option>
                    <option value="1944">1944</option>
                    <option value="1945">1945</option>
                    <option value="1946">1946</option>
                    <option value="1947">1947</option>
                    <option value="1948">1948</option>
                    <option value="1949">1949</option>
                    <option value="1950">1950</option>
                    <option value="1951">1951</option>
                    <option value="1952">1952</option>
                    <option value="1953">1953</option>
                    <option value="1954">1954</option>
                    <option value="1955">1955</option>
                    <option value="1956">1956</option>
                    <option value="1957">1957</option>
                    <option value="1958">1958</option>
                    <option value="1959">1959</option>
                    <option value="1960">1960</option>
                    <option value="1961">1961</option>
                    <option value="1962">1962</option>
                    <option value="1963">1963</option>
                    <option value="1964">1964</option>
                    <option value="1965">1965</option>
                    <option value="1966">1966</option>
                    <option value="1967">1967</option>
                    <option value="1968">1968</option>
                    <option value="1969">1969</option>
                    <option value="1970">1970</option>
                    <option value="1971">1971</option>
                    <option value="1972">1972</option>
                    <option value="1973">1973</option>
                    <option value="1974">1974</option>
                    <option value="1975">1975</option>
                    <option value="1976">1976</option>
                    <option value="1977">1977</option>
                    <option value="1978">1978</option>
                    <option value="1979">1979</option>
                    <option value="1980">1980</option>
                    <option value="1981">1981</option>
                    <option value="1982">1982</option>
                    <option value="1983">1983</option>
                    <option value="1984">1984</option>
                    <option value="1985">1985</option>
                    <option value="1986">1986</option>
                    <option value="1987">1987</option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                </select>
            </div>

            <div class="field">
                <input type="text" placeholder="Marks (%)" name="Marks">
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