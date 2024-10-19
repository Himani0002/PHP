
<?php
include 'session.php';
include 'config.php';

$errors = [];

if (isset($_POST['submit'])) {
	$SId = mysqli_real_escape_string($conn, $_POST['SId']);
	$CompanyName = mysqli_real_escape_string($conn, $_POST['CompanyName']);
	$CompanyRol = mysqli_real_escape_string($conn, $_POST['Role']);
	$StartDate = mysqli_real_escape_string($conn, $_POST['StartDate']);
	$EndDate = mysqli_real_escape_string($conn, $_POST['EndDate']);

	// Validate Company

	// if (empty($CompanyName)) {
	// 	$errors[] = "Companyname is required.";
	// } elseif (strlen($CompanyName) < 3 || strlen($CompanyName) > 255) {
	// 	$errors[] = "Companyname must be between 3 and 255 characters.";
	// } elseif (!preg_match("/^[a-zA-z]*$/", $CompanyName)) {
	// 	$errors[] = "Only alphabets and whitespace are allowed.";
	// }

	if (empty($errors)) {
		$query = "INSERT INTO Experience(SId,ECompanyName ,ECompanyRol ,EStartDate ,EEndDate)VALUES($SId,'$CompanyName','$CompanyRol','$StartDate','$EndDate')";

		if (mysqli_query($conn, $query)) {
			header('Location: TableExperience.php');
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

			header('Location: TableExperience.php');
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
	<link rel="icon" href="https://i.pinimg.com/564x/7e/7d/10/7e7d10cf1b213a2dc53afbaa24ea5de3.jpg" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />



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

	<font color="7e3010">
		<?php if (!empty($errors)) : ?>
			<ul>
				<?php foreach ($errors as $error) : ?>
					<li><?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</font>

	<div class="wrapper">

		<div class="title">Employees Experience</div>
		<form method="post">



			<div id="work-experience">

				<div class="field">
					<input type="text" name="SId" placeholder="Staff ID" required>
				</div>

				<div class="field">
					<input type="text" placeholder="Company Name" name="CompanyName">
				</div>

				<div class="field">
					<input type="text" placeholder="Company Rol" name="Role">
				</div>

				<div class="field">
					<input type="date" placeholder="Start Date" name="StartDate">
				</div>

				<div class="field">
					<input type="date" placeholder="End Date" name="EndDate">
				</div>

				<div class="field">
					<input type="submit" name="submit" value="submit">
				</div>

				<div class="field1">
					<input type="submit" name="Table" value="Show Table" for="submit">
				</div>

		</form>
	</div>
	</div>


</body>

</html>