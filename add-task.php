<?php
    if(isset($_POST['add'])) {
        include_once('connect.php');
        $title = strip_tags(trim($_POST['title']));
        $desc = strip_tags(trim($_POST['description']));

        if(empty($title)) {
            $error_title = '<p class="error">Title can not be empty</p>';
        }
        if(empty($desc)) {
            $error_desc = '<p class="error">Description can not be empty</p>';
        }

        if(!empty($title) && !empty($desc)) {
            $statement = $dbh->prepare('INSERT INTO task (title,description) VALUES (:title,:description)');
            $statement->bindParam(':title', $title, PDO::PARAM_STR);
            $statement->bindParam(':description', $desc, PDO::PARAM_STR);
            $statement->execute();

            header("Location: add-task.php?success");
        }
    }

    if(isset($_GET['success'])) {
        $success = '<p class="success">New task has been added</p>';
    }
?>
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
            <a href="index.php">Todo App</a>
        </div>
        <div class="nav_menu">
            <a href="index.php">List to do</a>
            <a href="add-task.php">Add task</a>
        </div>
    </nav>

    <div class="container">
        <div class="main_header">
            <h2>Add new task</h2>
        </div>
        <div class="add-task">
            <?php if(isset($success)) {echo $success; unset($success);} ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <p>Title</p>
                    <?php if(isset($error_title)) { echo $error_title; unset($error_title);} ?>
                    <input type="text" name="title" id="title" value=<?php if(isset($_POST['title'])) echo $_POST['title']; ?>>
                </div>
                <div class="form-group">
                    <p>Description</p>
                    <?php if(isset($error_desc)) { echo $error_desc; unset($error_desc);} ?>
                    <input type="text" name="description" id="description" value=<?php if(isset($_POST['description'])) echo $_POST['description']; ?>>
                </div>
                <div class="form-group">
                    <button type="submit" name="add">Add task</button>
                </div>
            </form>
        </div>
    </div>

  </body>
</html>