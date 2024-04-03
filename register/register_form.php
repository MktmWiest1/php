<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f8fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #e1e4e8;
            border-radius: 6px;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #24292e;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #e1e4e8;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #2ea44f;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #22863a;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #0366d6;
            font-size: 14px;
        }

        .login-link a {
            color: #0366d6;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>User Registration</h2>
    <form action="register.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="type">User Type</label>
        <select id="type" name="type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <input type="submit" value="Register">
    </form>

    <div class="login-link">
        <a href="../register/login_form.php">войти</a>
    </div>
</div>
</body>

</html>
