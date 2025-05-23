<html>
    <head>
        <link rel="stylesheet" href="signup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>
        <div>
        <div class="titel">
            <img src="images/logo_purple.png" alt="Logo">
        </div class="main-container">
            <div class="signup-wrapper">
                <div class="signup-image">
                    <img src="images/fantasy-bookshelf.jpg" alt="Signup Image">
                </div>
                <div class="signup-container">
                    <h2>Signup</h2>
                    <form name="Signup" onsubmit="return validateForm()">
                        <input type="text" class="input-field" placeholder="Username" required>
                        <input type="email" class="input-field" placeholder="Email" required>
                        <input type="password" name="password" class="input-field" placeholder="Password" required>
                        <input type="password" name="confirm" class="input-field" placeholder="Confirm Password" required>
                        <button type="submit" class="submit-button">Submit</button>
                    </form>
                    <p>Have an account?<br/> 
                    <a href="login.php">Click here</a> to Login.</p>
                </div>
            </div>
        </div>
                <?php require 'footer.php'; ?>      
       
    </body>    
</html>
<script>
function validateForm() {
    event.preventDefault();
    let password = document.forms["Signup"]["password"].value;
    let confirmPassword = document.forms["Signup"]["confirm"].value;
    const errorElement = document.getElementById("error-message");

    if (password !== confirmPassword) {
        alert("Password don't match");
    
        return false;
    }

    event.target.submit();
    return true;
}
</script>