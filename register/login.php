<?php
      session_start();
      $dbname = "postgres";
      $username = "postgres";
      $password = "postgres";
      
      
      try {
            $db = new PDO("pgsql:host=localhost;port=5436;dbname=$dbname", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
            echo "Ошибка подключения: " . $e->getMessage();
            exit();
      }
      
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $query = "SELECT * FROM users WHERE username = :username";
      $stmt = $db->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      
      // Проверка пароля
      if ($user && password_verify($password, $user['password'])) {
            echo "Добро пожаловать, " . $user['username'] . "!";
            header("Location: ../index.php");
            
            
      } else {
            echo "Неверное имя пользователя или пароль!";
      }
?>


