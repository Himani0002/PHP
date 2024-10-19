<?php
// change_password.php
include 'config.php';
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['EId'])) {
    header("Location: login.php");
    exit;
}

$message = '';

if (isset($_POST['submit'])) {
    $current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_new_password = mysqli_real_escape_string($conn, $_POST['confirm_new_password']);

    // Check if the current password matches the user's password
    
    $user_id = $_SESSION['EId'];
    $query = "SELECT * FROM employee WHERE EId = '$user_id'";
    
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (password_verify($current_password, $user['EPassword'])) {
        // Check if the new passwords match
        
        if ($new_password === $confirm_new_password) {
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the user's password
            $query = "UPDATE employee SET EPassword = '$hashed_new_password' WHERE EId = '$user_id'";
            
            if (mysqli_query($conn, $query)) {
                $message = "Password changed successfully.";
            } else {
                $message = "Error updating password: " . mysqli_error($conn);
            }
        } else {
            $message = "New passwords do not match.";
        }
    } else {
        $message = "Incorrect current password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
  
</head>

<body>
    <div class="wrapper">
      <div class="title">Change Password</div>

    <form action="Chagepwd.php" method="POST">
        
        <div class="field">
            <input type="password" id="current_password" name="current_password" placeholder="Current Password" required>
        </div>
        
        <div class="field">
            <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
        </div>
     
        
        <div class="field">
            <input type="password" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm Password" required>
        </div>

    </br>  

        <div class="field">
          <input type="submit" name="submit" value="Change Password"">
        </div>
        
        <div class="signup-link">
           <a href="dashboard.php">Back to Dashboard</a>
        </div>
    </form>
</div>

<br>
<br>

<p><?php echo $message; ?></p>
  </body>
</html>
