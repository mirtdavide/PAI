<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$mysqli = new mysqli("localhost", "root", "", "pai");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['user'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';
    if ($password !== $confirm) {
        die("Passwords do not match.");
    }
    $stmt = $mysqli->prepare("SELECT mail FROM users WHERE mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    if ($stmt->get_result()->fetch_assoc()) {
        die("Email already registered.");
    }
    $stmt->close();

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO users (username, mail, password, register_date, country, role) VALUES (?, ?, ?, NOW(), 'IT', 'user')");
    $stmt->bind_param("sss", $username, $email, $passwordHash);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        header("Location: index.php"); 
        exit;
    } else {
        echo "Signup failed: " . $stmt->error;
    }
    $stmt->close();
}
?>

<html>
    <head>
        <link rel="stylesheet" href="signup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>
        <div>
        <div class="titel">
            <img src="images/logo_purple.png" alt="Logo">
        </div class="main-container">
            <div class="signup-wrapper">
                <div class="signup-image">
                    <img src="images/fantasy-bookshelf.jpg" alt="Signup Image">
                </div>
                <div class="signup-container">
                    <h2>Signup</h2>
                    <form name="Signup" method="POST" onsubmit="return validateForm()">
                        <p id="error-message" class="error-message" style="color: red; font-weight: bold;" ></p>
                        <input type="text" name="user" class="input-field" placeholder="Username" required>
                        <input type="email" name="email" class="input-field" placeholder="Email" required>
                        <input type="password" name="password" class="input-field" placeholder="Password" required>
                        <input type="password" name="confirm" class="input-field" placeholder="Confirm Password" required>
                        <button type="submit" class="submit-button">Submit</button>
                    </form>
                    <p>Have an account?<br/> 
                    <a href="login.php">Click here</a> to Login.</p>
                </div>
            </div>
        </div>
                <?php require 'footer.php'; ?>      
       
    </body>    
</html>
<script>
function validateForm() {
    const form = document.forms["Signup"];
    const password = form["password"].value;
    const confirmPassword = form["confirm"].value;
    const username = form["user"].value;
    const errorElement = document.getElementById("error-message");

    const minLength = 8;
    const hasNumber = /\d/;
    const hasUpper = /[A-Z]/;
    const hasLower = /[a-z]/;

    if (username.length < 3) {
        errorElement.textContent = "Username must be at least 3 characters long.";
        return false;
    }

    if (password !== confirmPassword) {
        errorElement.textContent = "Passwords don't match.";
        return false;
    }

    if (password.length < minLength) {
        errorElement.textContent = "Password must be at least 8 characters long.";
        return false;
    }

    if (!hasNumber.test(password)) {
        errorElement.textContent = "Password must contain at least one number.";
        return false;
    }

    if (!hasUpper.test(password)) {
        errorElement.textContent = "Password must contain at least one uppercase letter.";
        return false;
    }

    if (!hasLower.test(password)) {
        errorElement.textContent = "Password must contain at least one lowercase letter.";
        return false;
    }

    errorElement.textContent = ""; 
    return true;
}
</script>