
<html>
    <head>
        <link rel="stylesheet" href="members.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>
        <div class = "main-container">    
            <div class = "members">
                <div class="container-title">
                    <p>Members</p> 
                </div>
                <div class="card-container">
                   
                </div>
            </div>
            <button class="load-more-button">Load More</button>
        </div>
        <?php require 'footer.php'; ?>
        <script>
            let offset = 0;
            const limit = 15;

            function loadUsers() {
                fetch(`load_members.php?offset=${offset}&limit=${limit}`)
                    .then(res => res.text())
                    .then(data => {
                        if (!data.trim()) {
                            document.querySelector(".load-more-button").style.display = 'none';
                            return;
                        }
                        document.querySelector(".card-container").innerHTML += data;
                        offset += limit;
                        if (document.getElementById('end-of-list')) {
                            document.querySelector(".load-more-button").style.display = 'none';
                        }
                    });
            }
            loadUsers(); // Only once         
            </script>
    </body>    
</html>
   
