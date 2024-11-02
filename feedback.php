<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Сайт рыболовного магазина" />
    <link href="styleForDB.css " rel="stylesheet" type="text/css" />
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
                    <a href="index.php">Назад</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<?php
$title = "RybolovClub73";
$current_page = 'feedback';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link href="forFeedback.css " rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title><?php echo $title ?></title>
</head>

<body>
    <form action="feedback.php" method="post">
        <label for="FIO">Введите ФИО:</label>
        <input type="text" placeholder="ФИО" id="FIO"><br><br>

        <label for="Email">Введите Email:</label>
        <input type="text" placeholder="Email" id="Email"><br>

        <label>Откуда узнали о нас?</label>
        <label><input type="radio" name="state">Социальные сети</label>
        <label><input type="radio" name="state">От друзей</label>
        <label><input type="radio" name="state">Реклама</label>
        <br>

        <label>Выберите тип обращения:</label>
        <select>
            <option>---</option>
            <option>Жалоба</option>
            <option>Предложение</option>
        </select><br><br>

        <textarea placeholder="Введите текст сообщения:" style="margin-left: 15px;"></textarea><br><br>

        <input type="file"><br><br>

        <label for="checkbox">Даю согласие на обработку персональных данных:</label>
        <input type="checkbox"><br><br>
        <input type="submit" value="Отправить">
    </form>
    <?php include('footer.php');?>
</body>
</html>