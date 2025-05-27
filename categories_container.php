
<?php
$currentCategory = $_GET['category'] ?? 'all';
$categories = [
    'Misc',
    'Novel',
    'Fan art',
    'Character',
    'Fan fiction',
    'News',
    'Author',
    'Adaptation',
];
?>

<head>
    <link rel="stylesheet" href="categories_container.css">
</head>
<div class="categories">
    <div class="container-title">
        <p>Categories</p> 
    </div>
    <div class="categories-container">
        <?php foreach ($categories as $value): ?>
            <div 
                class="category <?= $currentCategory === $value ? 'active' : '' ?>" 
                onclick="window.location.href = 'threads_search.php?category=<?= 
                    ($currentCategory === $value) ? 'all' : urlencode($value) 
                ?>'"
            >
                <?= htmlspecialchars($value) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>