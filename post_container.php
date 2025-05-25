
<?php
$mysqli = $mysqli ?? new mysqli("localhost", "root", "", "pai");

$limit = $limit ?? 20;
$offset = $offset ?? 0;
$whereClause = $whereClause ?? "1";
$orderClause = $orderClause ?? "t.created_at DESC";

$threads = $mysqli->query("
    SELECT t.id, t.title, t.user AS author_email, u.username AS author_name
    FROM thread t
    JOIN users u ON u.mail = t.user
    WHERE $whereClause
    ORDER BY $orderClause
    LIMIT $limit OFFSET $offset
");
?>
<head>
    <link rel="stylesheet" href="post_container.css">
</head>
<div class="post-container">
    <div class="container-title">
        <p>Latest Posts</p> 
    </div>

    <?php while ($thread = $threads->fetch_assoc()): ?>
        <?php
        // Count replies
        $replies = $mysqli->query("SELECT COUNT(*) AS reply_count FROM posts WHERE thread_id = {$thread['id']}")->fetch_assoc()['reply_count'];

        // Last reply user
        $lastReply = $mysqli->query("
            SELECT p.user, u.username 
            FROM posts p 
            JOIN users u ON p.user = u.mail 
            WHERE p.thread_id = {$thread['id']} 
            ORDER BY p.created_at DESC 
            LIMIT 1
        ")->fetch_assoc();
        ?>

        <div class="post">
            <div class="post-left">
                <img src="image.php?mail=<?= urlencode($thread['author_email']) ?>" alt="Profile Image" class="profile-image">
                <div class="post-info">
                    <h3 class="post-title">
                        <a href="thread.php?id=<?= $thread['id'] ?>">
                            <?= htmlspecialchars($thread['title']) ?>
                        </a>
                    </h3>
                    <p class="user-label"><?= htmlspecialchars($thread['author_name']) ?></p>
                </div>
            </div>
            <div class="post-center">
                <p class="post-label"><?= $replies ?> Replies</p>
            </div>
            <div class="post-right">
                <?php if ($lastReply): ?>
                    <div class="post-info">
                        <h3 class="post-label">Last Reply:</h3>
                        <p class="user-label"><?= htmlspecialchars($lastReply['username']) ?></p>
                    </div>
                    <img src="image.php?mail=<?= urlencode($lastReply['user']) ?>" alt="Profile Image" class="replier-image">
                <?php else: ?>
                    <div class="post-info">
                        <h3 class="post-label">No replies yet</h3>
                    </div>
                    <img src="images/profile.png" alt="Profile Image" class="replier-image">
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>