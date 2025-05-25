<html>
    <head>
        <link rel="stylesheet" href="threads_search.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>

        <div class = 'main-container'>
            <div class="left-column">
                <?php require 'categories_container.php'; ?>
                <?php
                $limit = 20;
                require 'post_container.php'; ?>

            </div>
            <div class="pagination">
                <button class="prev" onclick="">Previous</button>
                <div class="page-number">1</div>
                <div class="page-number">2</div>
                <div class="page-number">3</div>
                <div class="page-number">4</div>
                <div class="page-number">5</div>
                <div class="page-number">...</div>
                <button class="next" onclick="">Next</button>
            </div>
        </div>
                <?php require 'footer.php'; ?>      

    </body>
    
</html>