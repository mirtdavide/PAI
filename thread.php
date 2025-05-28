<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$mysqli = new mysqli("localhost", "root", "", "pai");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$threadId = $_GET['id'] ?? null;
if (!$threadId) {
    die("No thread ID provided.");
}
$stmt = $mysqli->prepare("SELECT * FROM thread WHERE id = ?");
$stmt->bind_param("i", $threadId);
$stmt->execute();
$threadResult = $stmt->get_result();
$thread = $threadResult->fetch_assoc();
$stmt->close();
if (!$thread) {
    die("Thread not found.");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    $comment = trim($_POST['comment']);
    $userEmail = $_SESSION['email'];

    if (!empty($comment)) {
        $stmt = $mysqli->prepare("INSERT INTO posts (body, user, thread_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $comment, $userEmail, $threadId);
        if ($stmt->execute()) {
            header("Location: thread.php?id=" . $threadId);
            exit;
        }
        $stmt->close();
    }
}
$stmt = $mysqli->prepare("SELECT * FROM posts WHERE thread_id = ? ORDER BY created_at ASC");
$stmt->bind_param("i", $threadId);
$stmt->execute();
$postsResult = $stmt->get_result();
$originalDate = $thread['created_at'];
$formattedDate = date("M j, Y", strtotime($originalDate));

?>
<html>
    <head>
        <link rel="stylesheet" href="thread.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>

        <div class="main-container">
            <div class="thread-container">

                <div class="container-title">
                    <p>
                    <span class = "category"><?= htmlspecialchars($thread['category']) ?> :</span>
                    <span class = "title"><?= htmlspecialchars($thread['title']) ?></span>
                    </p>
                    <div class = "last-info">

                        <i class="fas fa-user"></i> <span class="last-reply"><?= htmlspecialchars($thread['user']) ?></span> 
                        <i class="fas fa-clock"></i> <span class="last-reply"><?= htmlspecialchars($formattedDate) ?></span>
                    </div>
                    
                    
                </div>
                
                <div class="comments-section">
                    <?php $Number = 1; while ($post = $postsResult->fetch_assoc()): ?>
                        <div class="post">
                            <div class="post-left">
                                <a href="profile.php?user=<?= urlencode($post['user']) ?>">
                                    <img src="image.php?mail=<?= urlencode($post['user']) ?>" alt="Profile Image" class="profile-image">
                                </a>
                                <p class="post-content"><?= htmlspecialchars($post['user']) ?></p>
                            </div>
                            <div class="post-right">
                                <div class="post-data">
                                    <p><?php
                                    $date = new DateTime($post['created_at']);
                                    echo $date->format('F j, Y \a\t H:i');
                                    ?></p>
                                    <p>#<?= htmlspecialchars($Number) ?></p>
                                </div>
                                <div class="post-bubble">
                                    <textarea class="autoResize" disabled><?= htmlspecialchars($post['body']) ?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php  $Number++; endwhile; ?>
                    <?php if (isset($_SESSION['email'])): ?>
                    <div class = "comment-area">
                        <div class="container-title-comment">
                            <p>Post a Comment</p> 
                        </div>
                        <div class="comment">
                            <div class = "comment-left">
                                <img src="image.php?mail=<?= urlencode($_SESSION['email']) ?>" alt="Profile Image" class="profile-image">
                            </div>
                            <div class ="comment-right">
                                <div class="post-bubble">
                                    <form class="comment-form" name="Post" method="POST" onsubmit="return validateForm()">
                                        <textarea name="comment"placeholder="Write a comment..." required></textarea>
                                        <button type="submit" class="submit-button">Post</button>
                                    <?php endif; ?>
                                    </form>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php require 'footer.php'; ?>      
    </body>    
</html>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const textareas = document.querySelectorAll(".autoResize");

    textareas.forEach(textarea => {
        textarea.style.height = "auto";
        textarea.style.height = textarea.scrollHeight + "px";
    });
});
function validateForm() {
    const form = document.forms["Post"];
    const comment = form["comment"].value;
    const errorElement = document.getElementById("error-message");

    if (comment.length < 10) {
        errorElement.textContent = "Comment must be at least 10 characters long.";
        return false;
    }

    errorElement.textContent = ""; 
    return true;
}

</script>