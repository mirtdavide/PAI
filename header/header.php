
<head>
    <link rel="stylesheet" href="header/header.css">
</head>
<header> 
    <div class = "nav">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">s
        </div>
        <a href = "../threads_search/threads_search.php" class = "nav_button">Threads</a>
        <a href = "../members/members.php" class = "nav_button">Members</a>
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
        <a href = "../profile/profile.php" class = "nav_button">My profile</a>
        <a href = "../thread_form/thread_form.php" class = "nav_button">New thread</a>
        <a href = "../index.php" >Home</a>
        <button class = "nav-button" onclick = "window.location.href = '../login/login.php'" >Login</button>
        <button class = "nav-button" onclick = "window.location.href = '../signup/signup.php'" >Signup</button>
    </div>
</header>