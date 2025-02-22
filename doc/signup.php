<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/doc_direct_main/connection.php');
session_start();

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    // Sanitize and validate input
    $fullname = mysqli_real_escape_string($connection, trim($_POST['fullname']));
    $contact = mysqli_real_escape_string($connection, trim($_POST['contact']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $address = mysqli_real_escape_string($connection, trim($_POST['address']));
    $username = mysqli_real_escape_string($connection, trim($_POST['username']));
    $password = mysqli_real_escape_string($connection, trim($_POST['password']));
    $confirm_password = mysqli_real_escape_string($connection, trim($_POST['confirm_password']));
    $category_name = mysqli_real_escape_string($connection, trim($_POST['category']));

    // Basic validations
    if (empty($fullname) || empty($contact) || empty($email) || empty($address) || empty($username) || empty($password) || empty($confirm_password) || empty($category)) {
        $errors[] = 'All fields are required.';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    // If no errors, insert into database
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Securely hash the password

        $query = "INSERT INTO doctor (fullname, contact, email, address, username, password, category) VALUES ('$fullname', '$contact', '$email', '$address', '$username', '$hashed_password', '$category_name')";

        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Registration Successful! Redirecting to login page.'); window.location.href='login.php';</script>";
            exit();
        } else {
            $errors[] = 'Database Insertion Failed: ' . mysqli_error($connection);
        }
    }
}

$category_query = "SELECT category_id, category_name FROM category";
$category_result = mysqli_query($connection, $category_query);

if (!$category_result) {
    die('Query Failed: ' . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="shortcut icon" href="/doc_direct_main/pat/DOCTOR PAL.png" type="image/x-icon">
    <link rel="stylesheet" href="singup.css">
</head>
<body>
    <div class="container">
        <div class="login-signup-container">
            <form method="post" action="signup.php" id="signup-form">
                <div class="form-title">Sign Up</div>
                <?php if (!empty($errors)) {
                    echo '<p class="Error">' . implode('<br>', $errors) . '</p>';
                } ?>
                <div class="input_wrapper">
                    <input type="text" name="fullname" class="input_field" required>
                    <label class="label">Full Name</label>
                </div>
                <div class="input_wrapper">
                    <input type="text" name="contact" class="input_field" required>
                    <label class="label">Contact Number</label>
                </div>
                <div class="input_wrapper">
                    <input type="email" name="email" class="input_field" required>
                    <label class="label">Email</label>
                </div>
                <div class="input_wrapper">
                    <input type="text" name="address" class="input_field" required>
                    <label class="label">Home Address</label>
                </div>
                <div class="input_wrapper">
                    <input type="text" name="username" class="input_field" required>
                    <label class="label">Username</label>
                </div>
                <div class="input_wrapper">
                    <input type="password" name="password" class="input_field" required>
                    <label class="label">Password</label>
                </div>
                <div class="input_wrapper">
                    <input type="password" name="confirm_password" class="input_field" required>
                    <label class="label">Confirm Password</label>
                </div>
                <div class="input_wrapper">
                    <label for="category">Category</label>
                    <select name="category" required>
                        <option value="">Select Category</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($category_result)) {
                            echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="input_wrapper">
                    <input type="submit" class="input-submit" value="Sign Up">
                </div>
                <div class="switch-form">
                    Already have an account? <a href="login.php" id="show-login">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($connection); ?>
