<?php
// login.php

include 'config.php';

session_start();

$errors = [];

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the user exists
    $query = "SELECT * FROM employee WHERE EEmail = '$username'";
    
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
    
        // Check if the password matches
        
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user['EPassword'])) {
        
            // Set session variables and redirect to the dashboard
            
            $_SESSION['EId'] = $user['EId'];
            $_SESSION['EEmail'] = $user['EEmail'];
            
            header('Location: dashboard.php');
            
        } else {

            $errors[] = "Incorrect password.";
            
        }
        
    } else {
        $errors[] = "User not found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="https://i.pinimg.com/564x/7e/7d/10/7e7d10cf1b213a2dc53afbaa24ea5de3.jpg" type="image/x-icon">

    <title>Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <div class="wrapper">

        <div class="title">Login</div>

        <form method="POST">

            <div class="field">

                <input type="text" id="username" placeholder="Email Address" name="username" required>
            </div>

            <div class="field">
                <input type="password" id="password" placeholder="Password" name="password" required>
            </div>

            </br>

            <div class="content">
                <div class="pass-link"><a href="Forgotpwd.php">Forgot password ?</a></div>
            </div>

            <div class="field">
                <input type="submit" name="submit" value="Login">
            </div>

            <div class="signup-link">Not a member?
                <a href="EmployeeRegistrationForm.php"> Register here !</a>
            </div>
          
        </form>
        
    </div>
            <?php if (!empty($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
            </ul>
            <?php endif; ?>
</body>

</html>