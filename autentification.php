<?php
session_start();
include "db.php";  // Подключение к базе данных

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($mysql, $_POST['user_name']);
    $password = mysqli_real_escape_string($mysql, $_POST['password']);

    // Запрос для получения user_id и пароля пользователя
    $query = "SELECT id, username,  password FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);


        if ($password == $user['password']) {
            // Устанавливаем сессионные переменные
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            if ($user['username'] == 'admin') {
                $_SESSION['isadmin'] = true;
            } else {
                $_SESSION['isadmin'] = false;
            }
            header("Location: index.php");
            exit();
        } else {
            $message = "Неправильный логин или пароль!";
            $_SESSION['logged_in'] = false;
        }
    } else {
        $message = "Неправильный логин или пароль!";
        $_SESSION['logged_in'] = false;
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Сайт рыболовного магазина" />
    <link href="forAutent.css" rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title>
        RybolovClub73
    </title>
    <style>
        .btn {
            display: inline-block;
            padding: 4px 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            margin-left: 15px;
            margin-right: auto;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<header>
    <div class="container">
        <nav class="nav">
            <div class="text">RybolovClub73</div>
            <ul>
                <li>
                    <a href="index.php">Назад</a>
                </li>
            </ul>
        </nav>
    </div>
</header>



<body>
    <h2 style="text-align: center; margin-bottom: 15px;">Войти</h2>
    <form action="autentification.php" method="post">
        <label for="user_name">Введите логин:</label>
        <input type="text" name="user_name" placeholder="login" maxlength="15" id="user_name" required><br><br>

        <label for="password">Введите пароль:</label>
        <input type="password" name="password" placeholder="password" required><br><br>
        <input type="submit" value="Войти">
    </form>

    <p style="text-align: center; margin-top: 15px;">Нет аккаунта? <a href="register.php"
            class="btn">Зарегистрируйтесь</a></p>

    <?php if ($message): ?>
        <p style="color: red; text-align:center;">
            <?php echo $message; ?>
        </p>
    <?php endif; ?><br><br><br><br><br><br><br><br><br>

    <?php include "footer.php"; ?>
</body>

</html>