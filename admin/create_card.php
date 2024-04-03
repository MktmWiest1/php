<?php
$DB_HOST = "localhost";
$DB_PORT = "5432";
$DB_USER = "postgres";
$DB_PASSWORD = "postgres";
$database = "postgres";

try {
    $pdo = new PDO("pgsql:host=$DB_HOST;port=$DB_PORT;dbname=$database;user=$DB_USER;password=$DB_PASSWORD");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
        $title = $_POST['title_value'];
        $content = $_POST['content_value'];
        $img = $_POST['img_value'];

        $stmt = $pdo->prepare("INSERT INTO cards (title, content, img) VALUES (:title, :content, :img)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':img', $img);
        $stmt->execute();

        header("Location: admin_info.php");
        exit;
    }
} catch (PDOException $e) {
    die("Ошибка при добавлении записи: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f8fa;
        }

        .create-form {
            margin-top: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .create-form h2 {
            margin-bottom: 10px;
            font-size: 24px;
            color: #24292e;
        }

        .create-form form {
            background-color: #fff;
            border: 1px solid #e1e4e8;
            border-radius: 6px;
            padding: 20px;
        }

        .create-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #24292e;
        }

        .create-form input[type="text"],
        .create-form textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #e1e4e8;
            border-radius: 6px;
            margin-bottom: 15px;
            transition: border-color 0.3s;
        }

        .create-form input[type="text"]:focus,
        .create-form textarea:focus {
            border-color: #0366d6;
        }

        .create-form button[type="submit"],
        .create-form button[type="reset"] {
            padding: 10px 20px;
            background-color: #2ea44f;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .create-form button[type="reset"] {
            background-color: #ccc;
            color: #000;
            margin-left: 10px;
        }

        .create-form button[type="submit"]:hover,
        .create-form button[type="reset"]:hover {
            background-color: #22863a;
        }

        .create-form a {
            display: inline-block;
            padding: 10px 15px;
            border: 1px solid white;
            background-color: #2ea44f;
            text-decoration: none;
            color: white;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .create-form a:hover {
            background-color: #22863a;
        }
    </style>
</head>
<body>
<div class="create-form">
    <h2>Добавить новую карточку</h2>
    <form method="POST">
        <input type="hidden" name="add">
        <label for="title_value">Введите название языка программирования:</label>
        <input type="text" name="title_value" id="title_value" placeholder="Название языка программирования">
        <label for="content_value">Введите описание:</label>
        <textarea name="content_value" id="content_value" cols="30" rows="10" placeholder="Описание"></textarea>
        <label for="img_value">Введите URL изображения:</label>
        <input type="text" name="img_value" id="img_value" placeholder="URL изображения">
        <button type="submit">Добавить</button>
        <button type="reset">Очистить</button>
        <a href="./admin_info.php">вернуться назад</a>
    </form>
</div>
</body>
</html>
