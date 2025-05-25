<head>
    <link rel="stylesheet" href="share_container.css">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<div class="share">
    <div class="container-title">
        <p>Share this page</p> 
    </div>
    <div class="share-container">
        <div class="share-icons">
            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(currentPageURL()) ?>" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>

            <!-- Twitter/X -->
            <a href="https://twitter.com/intent/tweet?url=<?= urlencode(currentPageURL()) ?>" target="_blank">
                <i class="fab fa-x-twitter"></i>
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(currentPageURL()) ?>" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>

            <!-- Reddit -->
            <a href="https://reddit.com/submit?url=<?= urlencode(currentPageURL()) ?>&title=<?= urlencode(pageTitle()) ?>" target="_blank">
                <i class="fab fa-reddit-alien"></i>
            </a>

            <!-- Email -->
            <a href="mailto:?subject=Check%20this%20page&body=<?= urlencode(currentPageURL()) ?>">
                <i class="fas fa-envelope"></i>
            </a>

            <!-- Copy Link -->
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
    return "Your Page Title"; // Replace with dynamic title if available
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

<style>
.share-icons {
    display: flex;
    gap: 15px;
    padding: 15px;
}

.share-icons a {
    color: var(--light-gray);
    font-size: 24px;
    transition: color 0.3s ease;
    text-decoration: none;
}

.share-icons a:hover {
    color: var(--purple);
}

/* Platform-specific hover colors */
.share-icons a[href*="facebook.com"]:hover { color: #1877f2; }
.share-icons a[href*="twitter.com"]:hover { color: #000000; }
.share-icons a[href*="linkedin.com"]:hover { color: #0a66c2; }
.share-icons a[href*="reddit.com"]:hover { color: #ff4500; }
.share-icons a[href^="mailto"]:hover { color: #ea4335; }
.share-icons a[href="#"]:hover { color: var(--purple); }
</style>