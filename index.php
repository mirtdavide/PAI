<html>
    <head>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header/header.php'; ?>
        <div class = 'main-container'>
            <div class="left-column">
                <?php require 'post/post_container.php'; ?>
                <?php require 'categories/categories_container.php'; ?>
            	</div>
            <div class = right-column>
                <?php require 'most_discussed/most_discussed_container.php'; ?>
                <?php require 'rules/rules_container.php'; ?>
                <?php require 'share/share_container.php'; ?>
                </div>
            </div>
        </div>
        <?php require 'footer/footer.php'; ?>      
    </body>
</html>