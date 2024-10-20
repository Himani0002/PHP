<?php
// forgot_password.php

include 'config.php';

$message = '';

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  // Check if email exists

  $query = "SELECT * FROM employee WHERE EEmail = '$email'";

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {

    // Generate a new random password

    $new_password = bin2hex(random_bytes(4)); // Generate an 8-character random string

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the user's password in the database

    $query = "UPDATE employee SET EPassword = '$hashed_password' WHERE EEmail = '$email'";

    if (mysqli_query($conn, $query)) {

      $message = "Your new password is: " . $new_password;
    } else {
      $message = "Error updating password: " . mysqli_error($conn);
    }
  } else {
    $message = "Email not found.";
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">
    <div class="title">Forgot Password</div>
    <form action="Forgotpwd.php" method="POST">
      
      <div class="field">
        <input type="email" id="email" name="email" placeholder="Email Address" required>
      </div>
      
    </br>
    <div class="field">
      <input type="submit" name="submit" value="Reset Password">
    </div>
    <div class="signup-link">
      <a href="login.php">Back to Login</a>
    </div>
    
  </form>
</div>
<br>
<p><?php echo $message; ?></p>
</body>

</html>