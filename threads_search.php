<html>
<head>
     <link rel="stylesheet" href="threads_search.css">
</head>
<?php
require 'header.php';
$mysqli = new mysqli("localhost", "root", "", "pai");

// Setup
$limit = 20;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Category filtering
$category = $_GET['category'] ?? 'all';
if ($category === 'all' || trim($category) === '') {
    $whereClause = "1"; // No filter
} else {
    $safeCategory = $mysqli->real_escape_string($category);
    $whereClause = "t.category = '$safeCategory'";
}
echo $whereClause;
// Get correct total thread count based on filtering
$countQuery = $mysqli->query("SELECT COUNT(*) AS total FROM thread t WHERE $whereClause");

$totalThreads = $countQuery->fetch_assoc()['total'];
$totalPages = ceil($totalThreads / $limit);

// Post ordering
$orderClause = "t.created_at DESC";
?>

<div class="main-container">
    <div class="left-column">
        <?php require 'categories_container.php'; ?>
        <?php require 'post_container.php'; ?>
    </div>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a class="next" href="?page=<?= $page - 1 ?>&category=<?= urlencode($category) ?>">Previous</a>
        <?php endif; ?>

        <?php
        $maxPagesToShow = 5;
        $startPage = max(1, $page - 2);
        $endPage = min($totalPages, $startPage + $maxPagesToShow - 1);
        for ($i = $startPage; $i <= $endPage; $i++): ?>
            <a class="page-number <?= $i === $page ? 'active' : '' ?>" href="?page=<?= $i ?>&category=<?= urlencode($category) ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($endPage < $totalPages): ?>
            <span class="page-number">...</span>
            <a class="page-number" href="?page=<?= $totalPages ?>&category=<?= urlencode($category) ?>"><?= $totalPages ?></a>
        <?php endif; ?>

        <?php if ($page < $totalPages): ?>
            <a class="page-number" href="?page=<?= $page + 1 ?>&category=<?= urlencode($category) ?>">Next</a>
        <?php endif; ?>
    </div>
</div>

<?php require 'footer.php'; ?>
</body>
</html>
