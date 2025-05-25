<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<head>
    <link rel="stylesheet" href="header.css">
</head>
<header> 
    <div class = "nav">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <a href = "threads_search.php" class = "nav_button">Threads</a>
        <a href = "members.php" class = "nav_button">Members</a>
        <form action="threads_search.php" method="GET">
        <div class = "search-container">
            
            <input 
            type="text" 
            name="search" 
            class="search" 
            placeholder="Looking for a particular thread?"
            >
            <div class="select-wrapper"></div>
                <select name="category" class="categori" required>
                <option value="all">All</option>
                <option value="Novel">Novel</option>
                <option value="Fan art">Fan art</option>
                <option value="Character">Character</option>
                <option value="Fan fiction">Fan fiction</option>
                <option value="NewsAdaptations">News</option>
                <option value="NewsAdaptations">Adaptations</option>
                <option value="Author">Author</option>
        </select>
             </div>
        </form>
        
        <?php if (isset($_SESSION['email'])): ?>
            <a href="profile.php?user=<?= urlencode($_SESSION['email']) ?>" class="nav_button">My profile</a>
        <?php else: ?>
            <a href="login.php" class="nav_button">Login</a>
        <?php endif; ?>
        <a href = "thread_form.php" class = "nav_button">New thread</a>
        <a href = "index.php" >Home</a>
        <?php if (isset($_SESSION['email'])): ?>
            <button onclick="window.location.href = 'logout.php'" class="nav-button">Logout</button>
        <?php else: ?>
            <button onclick="window.location.href = 'login.php'" class="nav-button">Login</button>
            <button onclick="window.location.href = 'signup.php'" class="nav-button">Signup</button>
        <?php endif; ?>
        </div>
    </div>
</header>