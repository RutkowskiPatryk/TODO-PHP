<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"> 
    <title>Add new task</title>
  </head>
  <body>
    
    <nav>
        <div class="nav_logo">
            Todo App
        </div>
        <div class="nav_menu">
            <a href="add-task.html">Add task</a>
            <a href="#">Done</a>
        </div>
    </nav>

    <div class="container">
        <div class="add-task">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="form-group">
                    <button type="submit" name="add">Add task</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="footer">
            <p>Copyright Patryk Rutkowski</p>
        </div>
    </footer>

  </body>
</html>