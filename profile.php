<html>
    <head>
        <link rel="stylesheet" href="profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        
    </head>
    
    <body>

                <?php require 'header.php'; ?>


        <div class="main-container">

            <div class = "top-container">
                <div class="container-title">
                    <p>Member-info</p> 
                </div>
                <div class="profile">
                    <img src="images\profile.png" alt="Profile image">
                    <div class = "profile-info">
                        <span class = "username-label">Checco Zalone II</span>
                        <div class = "label-list">
                            <span class="label moderator">Forum Moderator</span>
                            <span class="label developer">Developer</span>
                        </div>
                        <span class = "role-country">Administrator - From: 🇮🇹</span>
                        <span class = "joined-label">Joined: March 2025</span>

                        <div class="stats-container">
                            <div class="stat">
                              <span class="stat-label">Posts</span>
                              <span class="value">11,145</span>
                            </div>
                            <div class="stat">
                                <span class="stat-label">Replies</span>
                                <span class="value">6,044</span>
                              </div>
                              <div class="stat">
                                <span class="stat-label">Total</span>
                                <span class="value">83</span>
                            </div>
                        </div>

                    <button class = "load-more-button" onclick = "window.location.href = 'update_profile.php'" >Update Profile</button>       
                    </div>
                </div>
            </div>
            <div class = "bottom-container">
                <div class="container-title">
                    <p>Member-Posts</p> 
                </div>
                <div class="post">
                    <div class = "post-left">
                        <img src="images/profile.png" alt="Profile Image" class="profile-image">
                        <div class="post-info">
                            <h3 class="post-title">Post Title 1</h3>
                            <p class="user-label">Author Name</p>
                        </div>
                    </div>
                    <div class ="post-center">
                        <p class = "post-label">Replies</p>
                    </div>
                    <div class = "post-right">
                        <div clas = "post-info">
                            <h3 class="post-label">Last Reply:</h3>
                            <p class="user-label">Replier Name</p>
                        </div>
                        <img src="images/profile.png" alt="Profile Image" class="replier-image">
                    </div>
                </div>
                <div class="post">
                    <div class = "post-left">
                        <img src="images/profile.png" alt="Profile Image" class="profile-image">
                        <div class="post-info">
                            <h3 class="post-title">Post Title 1</h3>
                            <p class="user-label">Author Name</p>
                        </div>
                    </div>
                    <div class ="post-center">
                        <p class = "post-label">Replies</p>
                    </div>
                    <div class = "post-right">
                        <div clas = "post-info">
                            <h3 class="post-label">Last Reply:</h3>
                            <p class="user-label">Replier Name</p>
                        </div>
                        <img src="images/profile.png" alt="Profile Image" class="replier-image">
                    </div>
                </div>
                <div class="post">
                    <div class = "post-left">
                        <img src="images/profile.png" alt="Profile Image" class="profile-image">
                        <div class="post-info">
                            <h3 class="post-title">Post Title 1</h3>
                            <p class="user-label">Author Name</p>
                        </div>
                    </div>
                    <div class ="post-center">
                        <p class = "post-label">Replies</p>
                    </div>
                    <div class = "post-right">
                        <div clas = "post-info">
                            <h3 class="post-label">Last Reply:</h3>
                            <p class="user-label">Replier Name</p>
                        </div>
                        <img src="images/profile.png" alt="Profile Image" class="replier-image">
                    </div>
                </div>
                <div class="post">
                    <div class = "post-left">
                        <img src="images/profile.png" alt="Profile Image" class="profile-image">
                        <div class="post-info">
                            <h3 class="post-title">Post Title 1</h3>
                            <p class="user-label">Author Name</p>
                        </div>
                    </div>
                    <div class ="post-center">
                        <p class = "post-label">Replies</p>
                    </div>
                    <div class = "post-right">
                        <div clas = "post-info">
                            <h3 class="post-label">Last Reply:</h3>
                            <p class="user-label">Replier Name</p>
                        </div>
                        <img src="images/profile.png" alt="Profile Image" class="replier-image">
                    </div>
                </div>
            </div>
        </div>
        <?php require 'footer.php'; ?>         
    </body>    
</html>