<?php
$title = "RybolovClub73";
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Сайт рыболовного магазина" />
    <link href="style.css " rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title>
        <?php echo $title; ?>
    </title>
</head>

<header>
    <div class="container">
        <nav class="nav">
            <div class="text">RybolovClub73</div>
            <ul>
                <li>
                    <a href="index2.php">Главная</a>
                </li>

                <li>
                    <a href="autentification2.php">Войти</a>
                </li>

                <li>
                    <a href="products2.php">Магазин</a>
                </li>

                <li>
                    <a href="infoFish2.php">Факты о рыбе</a>
                </li>

                <li>
                    <a href="basket2.php">Моя корзина</a>
                </li>

                <li>
                    <a href="feedback.php">Обратная связь</a>
                </li>

                <li>
                    <a href="index.php">Выход</a>
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

    // Запрос на поиск пользователя с введенными данными
    $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) == 1) {
        header("Location: index2.php");  // Перенаправление на страницу с товарами после входа
        exit();
    } else {
        $message = "Неправильный логин или пароль!";
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
