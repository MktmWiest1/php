<?php
      session_start(); // Начинаем сессию
      
      // Проверяем, был ли пользователь аутентифицирован
      if (isset($_SESSION['user_id'])) {
            // Если пользователь был аутентифицирован, удаляем все данные сессии
            session_unset(); // Очищаем все переменные сессии
            session_destroy(); // Удаляем сессию
      }
      
      header("Location: login.php");
      exit(); // Завершаем выполнение скрипта
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- Пример кнопки для выхода из системы -->
<a href="logout.php">Logout</a>

</body>
</html>
