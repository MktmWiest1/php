<?php
      // Проверяем, является ли пользователь администратором
      $user_type = 'admin'; // Предположим, что пользователь является администратором
      
      // Подключаемся к базе данных
      $host = "localhost";
      $dbname = "postgres";
      $username = "postgres";
      $password = "postgres";
      $port = '5432';
      
      try {
            $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
            echo "Ошибка подключения: " . $e->getMessage();
            exit();
      }
      
      // Проверяем, была ли форма отправлена
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user_type = $_POST['type'];
            
            
            // Хешируем пароль
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            
            // Подготовка и выполнение SQL-запроса на добавление пользователя в базу данных
            $query = "INSERT INTO users (username, email, password, type) VALUES (:username, :email, :password , :type)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $passwordHash);
            $stmt->bindParam(':type', $user_type);
            
            
            try {
                  $stmt->execute();
                  echo "Пользователь успешно зарегистрирован!";
                  
                  if ($user_type === 'admin') {
                        // Перенаправляем администратора на страницу для администратора
                        header("Location: ../admin/admin_info.php");
                  } else {
                        // Перенаправляем обычного пользователя на страницу для обычного пользователя
                        header("Location: ../pages/user_info.php");
                  }
                  exit;
            } catch (PDOException $e) {
                  echo "Ошибка регистрации: " . $e->getMessage();
            }
            
      }
      
      // Проверяем тип пользователя и подключаем соответствующий файл с информацией
    
