<?php
$mysqli = new mysqli("localhost", "root", "", "pai");

$result = $mysqli->query("
    SELECT t.id, t.title, t.user AS author_email, u.username,
           COUNT(p.id) AS post_count
    FROM thread t
    JOIN users u ON t.user = u.mail
    LEFT JOIN posts p ON p.thread_id = t.id
    GROUP BY t.id
    ORDER BY post_count DESC
    LIMIT 5
");
?>

<div class="most-discussed">
    <div class="container-title">
        <p>Most Discussed</p> 
    </div>

    <?php while ($row = $result->fetch_assoc()): ?>
    <div class="small-post" onclick="window.location.href='thread.php?id=<?= $row['id'] ?>'">
        <img src="image.php?mail=<?= urlencode($row['author_email']) ?>" alt="Profile Image">
        <h3 class="small-post-label"><?= htmlspecialchars($row['title']) ?></h3>
    </div>
    <?php endwhile; ?>
</div>