<html>
    <head>
        <link rel="stylesheet" href="signup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <div class = "header">
            <div class = "nav">
                <div class="logo">
                    <img src="images/logo.png" alt="Logo">
                    <p>Placeholder</p>
                </div>
                <a href = "threads_search.php" class = "nav_button">Threads</a>
                <a href = "members.php" class = "nav_button">Members</a>
                <div class = "search-container">
                    <input type = "text" class = "search" placeholder = "Looking for a particular thread?">
                    <div class="select-wrapper"></div>
                        <select class="categori" required>
                            <option value="option1">Misc</option>
                            <option value="option2">Novel</option>
                            <option value="option3">Fan art</option>
                            <option value="option4">Character</option>
                            <option value="option5">Fan fiction</option>
                            <option value="option6">News</option>
                            <option value="option7">Adaptations</option>
                            <option value="option8">Author</option>
                        </select> 
                     </div>
                <a href = "profile.php" class = "nav_button">My profile</a>
                <a href = "thread_form.php" class = "nav_button">New thread</a>
                <a href = "index.php" >Home</a>
                <button class = "nav-button" onclick = "window.location.href = 'login.php'" >Login</button>
                <button class = "nav-button" onclick = "window.location.href = 'signup.php'" >Signup</button>
            </div>
        </div>
        <div>
        <div class="titel">
            <img src="images/logo_purple.png" alt="Logo">
        </div class="main-container">
            <div class="signup-wrapper">
                <div class="signup-image">
                    <img src="images/Bookshelf-Wallpaper-About-Murals.jpg" alt="Signup Image">
                </div>
                <div class="signup-container">
                    <h2>Login</h2>
                    <form>
                        <input type="text" class="input-field" placeholder="Username" required>
                        <input type="password" class="input-field" placeholder="Password" required>
                        <button type="submit" class="submit-button">Login</button>
                    </form>
                    <p>Dont have an account?<br/> 
                    <a href="signup.php">Click here</a> to register.</p>
                </div>
            </div>
        </div>
                <?php require 'footer.php'; ?>      
    </body>    
</html>