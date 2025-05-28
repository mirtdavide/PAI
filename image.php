<?php
$mysqli = new mysqli("localhost", "root", "", "pai");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$mail = $_GET['mail'] ?? '';
$stmt = $mysqli->prepare("SELECT profile_image FROM users WHERE mail = ?");
$stmt->bind_param("s", $mail);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($image);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
    if (!empty($image)) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->buffer($image);

        if (!$mime) {
            $mime = "image/png";
        }

        header("Content-Type: " . $mime);
        echo $image;
        exit;
    }
}

header("Location: images/profile.png");
exit;
?>
