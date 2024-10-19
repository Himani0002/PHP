<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Management Dashboard</title>
	<link href="style1.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="loggedin">

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


	<main>
		<section class="summary">

			<div class="content">
				<center>
					<h2>Welcome, <?php echo $_SESSION['EEmail']; ?> !</h2>
				</center>
				<br>
				<br>
				<div class="summary-cards">
					<div class="card">
						<font color="#C123CA">
							<i class="fas fas fa-users" style="font-size:25px"></i>
						</font>
						<br>
						<h3>Total Employees</h3>
						<p>100</p>
					</div>
					<div class="card">
						<font color="#C123CA">
							<i class="fas fa-user-alt" style="font-size:25px"></i>
						</font>
						<h3>Active Employees</h3>
						<p>80</p>
					</div>
					<div class="card">
						<font color="#C123CA">
							<i class="fas fa-user-alt-slash" style="font-size:25px"></i>
						</font>
						<h3>Inactive Employees</h3>
						<p>20</p>
					</div>
				</div>
		</section>
		<section class="recent-activity">
			<h2>Recent Activity</h2>
			
			<table>
				<thead>
					<tr>
						<th>Date</th>
						<th>Employee</th>
						<th>Activity</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>04/23/2023</td>
						<td>John Smith</td>
						<td>Updated contact information</td>
					</tr>
					<tr>
						<td>04/22/2023</td>
						<td>Jane Doe</td>
						<td>Submitted a time off request</td>
					</tr>
					<tr>
						<td>04/21/2023</td>
						<td>Mark Johnson</td>
						<td>Completed a performance review</td>
					</tr>
				</tbody>

			</table>
		</section>
	</main>
	<footer>
		<p>&copy; 2023 Employee Management System</p>
	</footer>


</body>

</html>
</body>

</html>