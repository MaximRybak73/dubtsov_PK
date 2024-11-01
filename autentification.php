<?php
session_start();
$title = "RybolovClub73";
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Сайт рыболовного магазина" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title><?php echo $title; ?></title>
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

<?php
include "db.php";  // Подключение к базе данных

$title = "RybolovClub73";
$current_page = 'login';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($mysql, $_POST['user_name']);
    $password = mysqli_real_escape_string($mysql, $_POST['password']);

    // Запрос для получения user_id и пароля пользователя
    $query = "SELECT id, password FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);


        if ($password == $user['password']) { 
            // Устанавливаем сессионные переменные
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];

            // Перенаправление на главную страницу
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
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <link href="forAutent.css" rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title><?php echo $title?></title>
</head>
<body>
    <form action="autentification.php" method="post">
        <label for="user_name">Введите логин:</label>
        <input type="text" name="user_name" placeholder="login" maxlength="15" id="user_name" required><br><br>

        <label for="password">Введите пароль:</label>
        <input type="password" name="password" placeholder="password" required><br><br>

        <label for="checkbox">Запомнить меня:</label>
        <input type="checkbox" name="remember"><br><br>

        <input type="submit" value="Войти">
    </form>

    <?php if ($message): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>
    
    <?php include "footer.php"; ?>
</body>
</html>
