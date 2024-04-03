<?php
      $DB_HOST = "localhost";
      $DB_PORT = "5432";
      $DB_USER = "postgres";
      $DB_PASSWORD = "postgres";
      $database = "postgres";
      
      $connect = pg_connect("host=$DB_HOST port=$DB_PORT dbname=$database user=$DB_USER password=$DB_PASSWORD");
      if (!$connect) {
            die("Ошибка соединения с базой данных.");
      }
      
//     update
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $cardId = $_POST['card_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $img = $_POST['img'];
            
            $query = "UPDATE cards SET title='$title', content='$content', img='$img' WHERE id=$cardId";
            $result = pg_query($connect, $query);
            
            if ($result) {
                  header("Location: admin_info.php");
                  exit;
            } else {
                  echo "Ошибка при обновлении записи.";
            }
      }
      
//      delete
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
            $cardId = $_POST['card_id'];
            
            $query = "DELETE FROM cards WHERE id=$cardId";
            $result = pg_query($connect, $query);
            
            if ($result) {
                  header("Location: admin_info.php");
                  exit;
            } else {
                  echo "Ошибка при удалении записи.";
            }
      }
      
      $cardId = $_GET['id'];
      $query = "SELECT * FROM cards WHERE id = $cardId";
      $result = pg_query($connect, $query);
      
      if (!$result) {
            die("Ошибка выполнения запроса.");
      }
      $row = pg_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3, p {
            margin: 0 0 10px 0;
        }

        .card-details {
            margin-bottom: 20px;
        }

        .card-details form {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #f9f9f9;
        }


        .card-details form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .card-details form button[type="submit"] {
            margin-right: 10px;
        }

        .card-details form button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .return-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .return-btn:hover {
            background-color: #0056b3;
        }

        .card-details form input[type="text"],
        .card-details form textarea {
            width: 90% !important;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card-details">
          <?php
                if ($row) {
                      echo "<h1> Details</h1>";
                      echo "<form method='POST'>";
                      echo "<input type='hidden' name='card_id' value='{$row['id']}'>";
                      echo "<p><strong>ID:</strong> " . $row['id'] . "</p>";
                      echo "<p><strong>Название:</strong> <input type='text' name='title' value='{$row['title']}'></p>";
                      echo "<p><strong>Описание:</strong> <textarea name='content'>{$row['content']}</textarea></p>";
                      echo "<p><img src='{$row['img']}' style='width: 80%' alt='asd'></p>";
                      
                      
                      echo "<p><strong>Изображение:</strong> <input type='text' name='img' value='{$row['img']}'></p>";
                      echo "<button type='submit' name='update'>Обновить</button>";
                      echo "<button type='submit' name='delete' style='background-color: red'>Удалить</button>";
                      echo "</form>";
                      echo "<a href=\"admin_info.php\" class=\"return-btn\">Вернуться к списку карточек</a>";
                } else {
                      echo "<p>Карточка с указанным ID не найдена.</p>";
                }
          ?>
    </div>

   

</div>
</body>
</html>
