<head>
    <link rel="stylesheet" href="share_container.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<div class="share">
    <div class="container-title">
        <p>Share this page</p> 
    </div>
    <div class="share-container">
        <div class="share-icons">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(currentPageURL()) ?>" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>

            <a href="https://twitter.com/intent/tweet?url=<?= urlencode(currentPageURL()) ?>" target="_blank">
                <i class="fab fa-x-twitter"></i>
            </a>

            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(currentPageURL()) ?>" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>

            <a href="https://reddit.com/submit?url=<?= urlencode(currentPageURL()) ?>&title=<?= urlencode(pageTitle()) ?>" target="_blank">
                <i class="fab fa-reddit-alien"></i>
            </a>

            <a href="mailto:?subject=Check%20this%20page&body=<?= urlencode(currentPageURL()) ?>">
                <i class="fas fa-envelope"></i>
            </a>

            <a href="#" onclick="copyToClipboard('<?= currentPageURL() ?>')">
                <i class="fas fa-link"></i>
            </a>
        </div>
    </div>
</div>

<?php
function currentPageURL() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function pageTitle() {
    return "NovelNook";
}
?>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Link copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy:', err);
    });
    return false;
}
</script>
