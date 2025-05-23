<html>
    <head>
        <link rel="stylesheet" href="thread_form.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <?php require 'header.php'; ?>

        <div class="main-container">
            <div class="thread-container">
                <h2>Thread</h2>
                <form>
                    <input type="text" class="input-field" placeholder="Title" required>
                    <select class="form-categori" required>
                        <option value="option1">Author</option>
                        <option value="option2">Novel</option>
                        <option value="option3">Fan art</option>
                        <option value="option4">Character</option>
                        <option value="option5">Fan fiction</option>
                        <option value="option6">News</option>
                        <option value="option7">Adaptations</option>
                        <option value="option8">Misc</option>
                    </select> 
                    <textarea class="description" rows="4" cols="50" placeholder="Description"></textarea>             
                    <button type="submit" class="submit-button">Create</button>
                </form>
            </div>
        </div>
                <?php require 'footer.php'; ?>
    </body>    
</html>