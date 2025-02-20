<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/doc_direct_main/connection.php');
session_start();
// Start session

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    // Validate username and password
    if (empty(trim($_POST['username']))) {
        $errors[] = 'Username is missing or invalid';
    }
    if (empty(trim($_POST['password']))) {
        $errors[] = 'Password is missing or invalid';
    }

    // If no errors, process login
    if (empty($errors)) {
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        // Query to check login credentials
        $query = "SELECT * FROM doctor WHERE username = '{$username}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);

        if ($result_set) {
            if (mysqli_num_rows($result_set) == 1) {
                $user = mysqli_fetch_assoc($result_set);

                // If passwords are hashed, use password_verify()
                if ($password === $user['password']) {  // **Use password_verify() if hashed**
                    $_SESSION['username'] = $username; // Store username in session
                    header('Location: /doc_direct_main/doc/test.html');
                    exit();
                } else {
                    $errors[] = 'Invalid Username / Password';
                }
            } else {
                $errors[] = 'Invalid Username / Password';
            }
        } else {
            $errors[] = 'Database Query Failed: ' . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="/doc_direct_main/pat/DOCTOR PAL.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-signup-container">
            <!-- Login Form -->
            <form action="login.php" method="post" id="login-form">
                <div class="form-title">Login</div>
                <?php
                    if (!empty($errors)) {
                        echo '<p class="Error">' . implode('<br>', $errors) . '</p>';
                    }
                ?>
                <div class="input_wrapper">
                    <input type="text" class="input_field" name="username" required>
                    <label class="label">Username</label>
                </div>
                <div class="input_wrapper">
                    <input type="password" class="input_field" name="password" required>
                    <label class="label">Password</label>
                </div>
                <div class="input_wrapper">
                    <input type="submit" class="input-submit" value="Login" name="submit">
                </div>
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    <div class="forgot">
                        <a href="#">Forgot Password?</a>
                    </div>
                </div>
            
                <div class="switch-form">
                    Don't have an account? <a href="signup.php" id="show-signup">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($connection); ?>
