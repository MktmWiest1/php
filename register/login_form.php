<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f8fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border: 1px solid #e1e4e8;
            border-radius: 6px;
        }

        h2 {
            text-align: center;
            color: #24292e;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #24292e;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #e1e4e8;
            border-radius: 6px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #0366d6;
        }

        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #2ea44f;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #22863a;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            color: #0366d6;
            font-size: 14px;
        }

        .register-link a {
            color: #0366d6;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>User Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Login">
    </form>

    <div class="register-link">
        <a href="../register/register_form.php">Don't have an account? Register</a>
    </div>
</div>
</body>
</html>
