<?php
$mysqli = new mysqli("localhost", "root", "", "pai");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);
    $userEmail = $_SESSION['email'];
    if (strlen($description) < 30) {
    die("Description must be at least 30 characters long.");
    }

    $stmt = $mysqli->prepare("INSERT INTO thread (title, category, user) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $category, $userEmail);

    if ($stmt->execute()) {
        $threadId = $stmt->insert_id; 
        $stmt->close();
        $stmt = $mysqli->prepare("INSERT INTO posts (body, user, thread_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $description, $userEmail, $threadId);
        $stmt->execute();
        $stmt->close();
        header("Location: thread.php?id=" . $threadId);
        exit;
    } else {
        echo "Error creating thread: " . $stmt->error;
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="thread_form.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>

        <div class="main-container">
            <div class="thread-container">
                <h2>Thread</h2>
                <form name="Thread" method="POST" onsubmit="return validateForm()">
                    <p id="error-message" class="error-message" style=" text-align: center; color: red; font-weight: bold;" ></p>
                    <input type="text" name="title" class="input-field" placeholder="Title" required>
                    <select  name="category" class="form-categori" required>
                        <option value="Author">Author</option>
                        <option value="Novel">Novel</option>
                        <option value="Fan art">Fan art</option>
                        <option value="Character">Character</option>
                        <option value="Fan fiction">Fan fiction</option>
                        <option value="News">News</option>
                        <option value="Adaptations">Adaptations</option>
                        <option value="Misc">Misc</option>
                    </select> 
                    <textarea name="description" class="description" rows="4" cols="50" placeholder="Description"></textarea>             
                    <button type="submit" class="submit-button">Create</button>
                </form>
            </div>
        </div>
                <?php require 'footer.php'; ?>
    </body>    
</html>
<script>
function validateForm() {
    const form = document.forms["Thread"];
    const title = form["title"].value;
    const description = form["description"].value;
    const errorElement = document.getElementById("error-message");

    if (title.length < 5) {
        errorElement.textContent = "Title must be at least 5 characters long.";
        return false;
    }
    if (description.length < 30) {
        errorElement.textContent = "Description must be at least 30 characters long.";
        return false;
    }

    errorElement.textContent = ""; 
    return true;
}
</script>