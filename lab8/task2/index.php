<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Книги</title>
</head>

<body>
    <?php
    require 'models/Author.php';
    require 'models/Book.php';
    require 'controllers/BookController.php';

    try {
        $db = new PDO('mysql:host=localhost;dbname=db_web_lab8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bookModel = new Book($db);
        $controller = new BookController($bookModel);

        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $controller->index($search);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>

</html>