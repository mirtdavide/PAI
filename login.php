<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$mysqli = new mysqli("localhost", "root", "", "pai");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = trim($_POST['mail'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $mysqli->prepare("SELECT username, mail, password FROM users WHERE mail = ?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['mail'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="signup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>
        <div class="titel">
            <img src="images/logo_purple.png" alt="Logo">
        </div class="main-container">
            <div class="signup-wrapper">
                <div class="signup-image">
                    <img src="images/Bookshelf-Wallpaper-About-Murals.jpg" alt="Signup Image">
                </div>
                <div class="signup-container">
                    <h2>Login</h2>
                    <form action="login.php" method="POST">
                        <p id="error-message" class="error-message" style="color: red; font-weight: bold;" ></p>
                        <input type="text" name="mail" class="input-field" placeholder="Mail" required>
                        <input type="password" name="password" class="input-field" placeholder="Password" required>
                        <button type="submit" class="submit-button">Login</button>
                    </form>
                    <p>Dont have an account?<br/> 
                    <a href="signup.php">Click here</a> to register.</p>
                </div>
            </div>
        </div>
        <?php require 'footer.php'; ?>      
    </body>    
</html>
<?php if (!empty($error)): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("error-message").textContent = <?= json_encode($error) ?>;
    });
</script>
<?php endif; ?>