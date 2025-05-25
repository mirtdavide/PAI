
<?php
$currentCategory = $_GET['category'] ?? 'all';
$categories = [
    'Misc' => 'Misc',
    'Novel' => 'Novel',
    'Fan art' => 'Fan art',
    'Character' => 'Character',
    'Fan fiction' => 'Fan fiction',
    'News' => 'News',
    'Author' => 'Author',
    'Adaptation' => 'Adaptation',
    
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
        <?php foreach ($categories as $value => $label): ?>
            <div 
                class="category <?= $currentCategory === $value ? 'active' : '' ?>" 
                onclick="window.location.href = 'threads_search.php?category=<?= urlencode($value) ?>'"
            >
                <?= htmlspecialchars($label) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>