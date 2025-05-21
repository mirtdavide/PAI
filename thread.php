<html>
    <head>
        <link rel="stylesheet" href="thread.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>

        <div class="main-container">
            <div class="thread-container">

                <div class="container-title">
                    <p>
                    <span class = "category">Fan Fiction :</span>
                    <span class = "title">Amon Wins the fight</span>
                    </p>
                    <div class = "last-info">

                        <i class="fas fa-user"></i> <span class="last-reply">Il Giorgione</span> 
                        <i class="fas fa-clock"></i> <span class="last-reply">5 July 2014</span>
                    </div>
                    
                    
                </div>
                
                <div class="comments-section">

                    <div class="post">
                        <div class = "post-left">
                            <img src="images/profile.png" alt="Profile Image" class="profile-image">
                            <p class="post-content">Author Name</p>
                        </div>
                        <div class ="post-right">
                            <div class="post-data">
                                <p>Date</p>
                                <p>post nr</p>
                            </div>

                            <div class="post-bubble">
                                <textarea class="autoResize" disabled>This is  asdfasdfasdfas fasdjnkfha;dlsgbjhl .hjngfa ghjdasl;.fhg;osdifgh;oa hijg;ijerdf ;gvihnraf; iusgrfevhb text cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccinside the textarea.</textarea>
                            </div>
                                
                        </div>
                    </div>

                    <div class="post">
                        <div class = "post-left">
                            <img src="images/profile.png" alt="Profile Image" class="profile-image">
                            <p class="post-content">Author Name</p>
                        </div>
                        <div class ="post-right">
                            <div class="post-data">
                                <p>Date</p>
                                <p>post nr</p>
                            </div>

                            <div class="post-bubble">
                                <textarea class="autoResize" disabled>This is  asdfasdfasdfas fasdjnkfha;dlsgbjhl .hjngfa ghjdasl;.fhg;osdifgh;oa hijg;ijerdf ;gvihnraf; iusgrfevhb text cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccinside the textarea.</textarea>
                            </div>
                                
                        </div>
                    </div>

                    <div class="post">
                        <div class = "post-left">
                            <img src="images/profile.png" alt="Profile Image" class="profile-image">
                            <p class="post-content">Author Name</p>
                        </div>
                        <div class ="post-right">
                            <div class="post-data">
                                <p>Date</p>
                                <p>post nr</p>
                            </div>

                            <div class="post-bubble">
                                <textarea class="autoResize" disabled>This is  asdfasdfasdfas fasdjnkfha;dlsgbjhl .hjngfa ghjdasl;.fhg;osdifgh;oa hijg;ijerdf ;gvihnraf; iusgrfevhb text cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccinside the textarea.</textarea>
                            </div>
                                
                        </div>
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
                    <div class = "comment-area">
                        <div class="container-title-comment">
                            <p>Post a Comment</p> 
                        </div>
                        <div class="comment">
                            <div class = "comment-left">
                                <img src="images/profile.png" alt="Profile Image" class="profile-image">
                                
                            </div>
                            <div class ="comment-right">
                                <div class="post-bubble">
                                    <form class="comment-form">
                                        <textarea placeholder="Write a comment..." required></textarea>
                                        <button type="submit" class="submit-button">Post</button>
                                    </form>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php require 'footer.php'; ?>      
    </body>    
</html>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const textareas = document.querySelectorAll(".autoResize");

    textareas.forEach(textarea => {
        // Set initial height based on content
        textarea.style.height = "auto";
        textarea.style.height = textarea.scrollHeight + "px";
    });
});
</script>