<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "pai";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 15;

$sql = "SELECT username, mail, role, registre_date FROM users WHERE role != 'user' ORDER BY registre_date DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $date = date("F Y", strtotime($row['registre_date']));
    $imgSrc = 'image.php?mail=' . urlencode($row['mail']);

    echo '<div class="profile">';
    echo '<img src="' . $imgSrc . '" alt="Profile image">';
    echo '<p class="user-label">' . htmlspecialchars($row['username']) . '</p>';
    echo '<p class="role">' . htmlspecialchars($row['role']) . '</p>';
    echo '<p class="since">Member Since:<br>' . $date . '</p>';
    echo '<button class="load-button" onclick="window.location.href=\'profile.php?user=' . urlencode($row['mail']) . '\'">See Profile</button>';
    echo '</div>';
}

$conn->close();
?>