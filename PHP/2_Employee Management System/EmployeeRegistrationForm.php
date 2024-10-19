<?php
include 'session.php';
include 'config.php';

$errors = [];

if (isset($_POST['submit'])) {

	$Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
	$Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
	$DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
	$Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
	$DOJ = mysqli_real_escape_string($conn, $_POST['DOJ']);
	$Salary = mysqli_real_escape_string($conn, $_POST['Salary']);
	$Department = mysqli_real_escape_string($conn, $_POST['Department']);
	$Designation = mysqli_real_escape_string($conn, $_POST['Designation']);
	$Phnumber = mysqli_real_escape_string($conn, $_POST['Phnumber']);
	$Email = mysqli_real_escape_string($conn, $_POST['Email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
	$PinCode = mysqli_real_escape_string($conn, $_POST['PinCode']);
	$City = mysqli_real_escape_string($conn, $_POST['City']);
	$State = mysqli_real_escape_string($conn, $_POST['State']);
	$Country = mysqli_real_escape_string($conn, $_POST['Country']);

	// Validate fullname
	if (empty($Fname)) {
		$errors[] = "Fullname is required.";
	} elseif (strlen($Fname) < 3 || strlen($Fname) > 255) {
		$errors[] = "Fullname must be between 3 and 255 characters.";
	} elseif (!preg_match("/^[a-zA-z]*$/", $Fname)) {
		$errors[] = "Only alphabets and whitespace are allowed.";
	}

	// Validate email
	if (empty($Email)) {
		$errors[] = "Email is required.";
	} elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {

		$errors[] = "Email is not valid.";
	}

	// Validate Phnumber
	if (empty($Phnumber)) {
		$errors[] = "Phone number is required.";
	} elseif ((strlen($Phnumber) >= 11)) {
		$errors[] = "Phone number must be at least 10 characters.";
	} else {
		// Check if phnumber already exists
		$phnumber_check_query = "SELECT * FROM Users WHERE UPhNumber = '$Phnumber'";
		$phnumber_check_result = mysqli_query($conn, $phnumber_check_query);

		if (mysqli_num_rows($phnumber_check_result) > 0) {
			$errors[] = "Phone Number is already taken.";
		}
	}

	// Validate password
	if (empty($password)) {
		$errors[] = "Password is required.";
	} elseif (strlen($password) < 6) {
		$errors[] = "Password must be at least 6 characters.";
	} elseif ($password !== $confirm_password) {
		$errors[] = "Passwords do not match.";
	}

	// If no validation errors, insert user

	if (empty($errors)) {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO EMPLOYEE(EFname,ELname,EDOB,EGender,EDOJ,ESalary,EDepartment,EDesignation,EPhnumber,EEmail,EPassword,ECity,EState,ECountry,EPinCode)VALUES('$Fname','$Lname','$DOB','$Gender','$DOJ','$Salary','$Department','$Designation','$Phnumber','$Email','$Password','$City','$State','$Country','$PinCode')";

		if (mysqli_query($conn, $query)) {
			header('Location:TableRegistration.php');
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="icon" href="https://i.pinimg.com/564x/7e/7d/10/7e7d10cf1b213a2dc53afbaa24ea5de3.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style4.css">

    <title>Employee Management</title>

</head>

<body>

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

        <h1 align="center">Registration Form</h1>
        <br><br>
        <form method="post">

            <?php if (!empty($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                <li>
                    <?php echo $error; ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <label for="firstname">First Name</label>
            <input type="text" name="Fname" id="Fname" required><br><br>

            <label for="lastname">Last Name</label>
            <input type="text" name="Lname" id="Lname" required><br><br>

            <label for="email">Email</label>
            <input type="email" name="Email" id="Email" required><br><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required><br><br>


            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>
            </div>

            <label for="phone">Phone Number</label>
            <input type="tel" name="Phnumber" id="Phnumber" required><br><br>

            <label for="dob">Date of Birth</label>
            <input type="date" name="DOB" id="DOB" required><br><br>

            <label for="dob">Date Of Joining</label>
            <input type="date" name="DOJ" id="DOJ" required><br><br>

            <label for="gender">Gender</label>
            <select class="input" name="Gender" required>
                <option vlaue="Male">Male</option>
                <option vlaue="Female" selected>Female</option>
            </select><br><br>

            <label for="department">Department</label>
            <select class="input" name="Designation" id="Designation" required>
                <option>Select Designation</option>
                <option value="Software engineering">Software engineering</option>
                <option value="Technical lead">Technical lead</option>
                <option value="Project Manager">Project Manager</option>
                <option value="System Analyst">System Analyst</option>
                <option value="CEO">CEO</option>
            </select><br><br>

            <label for="Designation">Designation</label>
            <select class="input" name="Department" id="Department" required>
                <option>Select Department</option>
                <option value="Account">Account</option>
                <option value="Hr">Hr</option>
                <option value="It">It</option>
                <option value="Salse">Salse</option>
                <option value="Maketing">Maketing</option>
                <option value="Designing">Designing</option>
            </select><br><br>


            <label for="City">City</label>
            <select id="City" name="City" class="input" required>
                <option value="">Select City</option>
                <option value="Abrama">Abrama</option>
                <option value="Adalaj">Adalaj</option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Ahwa">Ahwa</option>
                <option value="Amod">Amod</option>
                <option value="Amreli">Amreli</option>
                <option value="Amroli">Amroli</option>
                <option value="Bagasra">Bagasra</option>
                <option value="Banas Kantha">Banas Kantha</option>
                <option value="Bantva">Bantva</option>
                <option value="Bardoli">Bardoli</option>
                <option value="Bedi">Bedi</option>
                <option value="Bhachau">Bhachau</option>
                <option value="Bhanvad">Bhanvad</option>
                <option value="Bharuch">Bharuch</option>
                <option value="Bhavnagar">Bhavnagar</option>

            </select><br><br>

            <label for="State">State</label>
            <select id="State" name="State" class="input" required>
                <option value="">Select state</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            </select><br><br>

            <label for="Country">Country</label>
            <select id="Country" name="Country" class="input" required>
                <option>Select Country</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Aland Islands">Aland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
            </select><br><br>


            <label for="salary">Salary</label>
            <input type="number" name="Salary" required><br><br>

            <label for="PinCode">Pin Code</label>
            <input type="number" name="PinCode" required><br><br>

            <input type="submit" name="submit" value="Register">
            <input type="submit" name="Table" value="Show Table">
        </form>

    </body>

</html>