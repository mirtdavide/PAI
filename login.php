<html>
    <head>
        <link rel="stylesheet" href="signup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>
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