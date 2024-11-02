<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Сайт рыболовного магазина" />
    <link href="forAutent.css" rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title><?php echo $title; ?></title>
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
                    <a href="autentification.php">Назад</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<?php
session_start();
include("db.php");  // Подключение к базе данных

$title = "Регистрация";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($mysql, $_POST['username']);
    $password = mysqli_real_escape_string($mysql, $_POST['password']);
    $email = mysqli_real_escape_string($mysql, $_POST['email']);

    // Проверка, существует ли уже такой пользователь
    $checkQuery = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$email'";
    $checkResult = mysqli_query($mysql, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        // Регистрация пользователя
        $query = "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email')";
        if (mysqli_query($mysql, $query)) {
            $message = "Вы успешно зарегистрировались!";
        } else {
            $message = "Ошибка при регистрации. Попробуйте еще раз.";
        }
    } else {
        $message = "Пользователь с таким именем или email уже существует!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title><?php echo $title; ?></title>
</head>
<body>
    <h2>Регистрация</h2>
    <form action="register.php" method="post">
        <label for="username">Имя пользователя:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <input type="submit" value="Зарегистрироваться" class="btn">
    </form>

    <?php if ($message): ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>

</body>
<?php include('footer.php'); ?>
</html>
