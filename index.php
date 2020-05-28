<?php
    include_once('connect.php');

    if(isset($_GET['done'])) {
        $statement = $dbh->prepare("DELETE FROM task WHERE id = :id");
        $statement->bindParam('id', $_GET['done'], PDO::PARAM_INT);
        $statement->execute();

        header("Location: index.php");
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
    <title>Hello, world!</title>
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
            <h2>List to do</h2>
        </div>
        <div class="main_table">
            <table>
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = 'SELECT id,title,description FROM task';
                        foreach ($dbh->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td><a href="index.php?done=' . $row['id'] . '" class="done">Done</a></td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

  </body>
</html>