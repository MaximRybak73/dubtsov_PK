<?php
$title = "RybolovClub73";
$current_page = 'home';
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

<body>
    <figure class="Image">
        <?php
        $s = date("s");
        $photo = ($s % 2 == 0) ? "shop1" : "shop2";
        echo '<img src="images/' . $photo . '.webp" alt="Фото рыболовного магазина">';
        ?>
    </figure>

    <br>
    <p>Добро пожаловать на сайт рыболовного магазина RybolovClub73!</p>
    <p>На нашем сайте вы можете приобрести рыболовные снасти, приманки и товары для кемпинга.</p>
    <table>
        <caption>На что ловить в зависимости от реки:</caption>
        <tr>
            <th>Река</th>
            <th>Вид удилища</th>
        </tr>
        <tr>
            <td>Волга</td>
            <td>Фидер, спиннинг</td>
        </tr>
        <tr>
            <td>Свияга</td>
            <td>Телескопическая удочка, донка</td>
        </tr>
        <tr>
            <td>Сельд</td>
            <td>Фидер, телескопическая удочка</td>
        </tr>
        <tr>
            <td>Барыш</td>
            <td>Маховое удилище, спиннинг</td>
        </tr>
    </table>


    <?php include "footer.php"; ?>
</body>

</html>